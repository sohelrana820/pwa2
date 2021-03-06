<?php

namespace App\Http\Controllers;

use App\Forms\ProjectForm;
use App\Models\Projects;
use App\Models\ProjectsImages;
use App\Models\ProjectsMeta;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use File;
use ZipArchive;

/**
 * Class ProjectController
 * @package  App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = null;
        if (isset($request->q)) {
            $query = $request->q;
        }
        $projects = Projects::search($query)
            ->orderBy('id', 'desc')
            ->with(['projectMeta', 'ProjectImages']);

        /**
         * If the logged in user is not admin
         */
        $authUser = auth()->user();
        if ($authUser->userRole->role->role_slug != Role::SUPER_ADMIN) {
            $projects = $projects->where('user_id', Auth::user()->id);
        }

        $projects = $projects->paginate(25);
        return view('pages.projects.list', [
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.projects.create', []);
    }

    /**
     * Create project.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Projects::create([
            'user_id' => Auth::user()->id
        ]);

        $projectsMeta = [];
        $requestOptions = $request->all();

        app(ProjectForm::class)->validate($requestOptions);
        foreach ($requestOptions as $key => $option) {
            if ($key != '_token') {
                $data = is_array($option) ? json_encode($option) : $option;
                $dataType = is_array($option) ? 'json' : 'string';

                $projectsMeta[] = [
                    'project_id' => $project->id,
                    'meta_key' => $key,
                    'meta_value' => $data,
                    'data_type' => $dataType,
                    'created_at' => date('Y-m-d H:j:s'),
                    'updated_at' => date('Y-m-d H:j:s')
                ];
            }
        }

        /**
         * Uploading project images.
         */
        if ($request->has('files')) {
            $fileRequest = $request->get('files');
            $files = $fileRequest['files'];
            $uniqueId = $fileRequest['unique_id'];

            $projectsImages = [];
            foreach ($files as $file) {
                $copyFrom = sprintf('%s/%s', $uniqueId, $file);
                $copyTo = sprintf('projects_images/%s/%s', $project->id, $file);
                $exist = Storage::disk('public')->exists($copyFrom);
                if($exist) {
                    Storage::disk('public-upload-images')->put($copyTo, Storage::disk('public')->get($copyFrom));
                    $url = Storage::disk('public-upload-images')->url($copyTo);
                    $url = strstr($url, '/projects_images');
                    $projectsImages[] = [
                        'project_id' => $project->id,
                        'url_path' => $url,
                        'created_at' => date('Y-m-d H:j:s'),
                        'updated_at' => date('Y-m-d H:j:s')
                    ];
                }
            }
            Storage::disk('public')->deleteDirectory($uniqueId);
            ProjectsImages::insert($projectsImages);
        }

        $projectMeta = ProjectsMeta::insert($projectsMeta);
        if ($projectMeta) {
            $successResponse = [
                'success' => true,
                'message' => 'Projekts ir veiksm??gi izveidots',
            ];
            return response()->json($successResponse, 200);
        }


        $errorResponse = [
            'success' => true,
            'message' => 'Diem????l projektu nevar??ja izveidot',
        ];
        return response()->json($errorResponse, 500);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metaData = [];
        $metas = ProjectsMeta::where('project_id', $id)->get()->toArray();
        foreach ($metas as $key => $meta) {
            $metaData[$meta['meta_key']] = $meta['data_type'] == 'json' ? json_decode($meta['meta_value'], true) : $meta['meta_value'];
        }

        $htmlContent = view('pages.projects.show', ['projectMetas' => $metaData, 'projectId' => $id]);
        //return $htmlContent = view('pages.projects.show', ['projectMetas' => $metaData, 'projectId' => $id]);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($htmlContent);
        $name = sprintf('Lietas_nr_%s.pdf', $metaData['lietas_nr']);
        return $pdf->download($name);
    }

    /**
     * Generating ZIP and download.
     *
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function zip(int $id)
    {
        $metaData = [];
        $metas = ProjectsMeta::where('project_id', $id)->get()->toArray();
        foreach ($metas as $key => $meta) {
            $metaData[$meta['meta_key']] = $meta['data_type'] == 'json' ? json_decode($meta['meta_value'], true) : $meta['meta_value'];
        }

        /**
         * Generate PDF into archive directory
         */
        $archivePath = 'zip/' . $metaData['lietas_nr'];
        $pdfName = sprintf('Lietas_nr_%s.pdf', $metaData['lietas_nr']);
        $pdfPath = sprintf('%s/%s', $archivePath, $pdfName);
        $htmlContent = view('pages.projects.show', ['projectMetas' => $metaData, 'projectId' => $id]);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($htmlContent)->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        Storage::disk('public')->delete($pdfPath);
        Storage::disk('public-upload-images')->put($pdfPath, $pdf->stream($pdfName));

        /**
         * Copying images to archive directory.
         */
        $projectImages = ProjectsImages::where('project_id', $id)->get()->toArray();
        foreach ($projectImages as $image) {
            $copyFrom = $image['url_path'];
            $imageDetails = str_replace($id.'/', '', strstr($image['url_path'], $id.'/'));
            list($name, $ext) = explode('.', $imageDetails, 2);

            $copyTo = sprintf('%s/%s.%s', $archivePath, uniqid(), $ext);
            Storage::disk('public-upload-images')->put($copyTo, Storage::disk('public-upload-images')->get($copyFrom));

            $compresed = true;
            $tempImagePath = public_path() . '/' . $copyTo;
            if($ext == 'jpeg' || $ext == 'jpg') {
                $imageTmp = imagecreatefromjpeg($tempImagePath);
            } else if($ext == 'gif') {
                $imageTmp = imagecreatefromgif($tempImagePath);
            } else if($ext == 'png') {
                $imageTmp = imagecreatefrompng($tempImagePath);
            }else {
                $compresed = false;
                $copyTo = sprintf('%s/%s.%s', $archivePath, $name, 'jpg');
                Storage::disk('public-upload-images')->put($copyTo, Storage::disk('public-upload-images')->get($copyFrom));
            }

            if($compresed) {
                $outputImage = public_path('/') . $archivePath . '/' . $name .'.jpg';
                imagejpeg($imageTmp, $outputImage, 60);
                imagedestroy($imageTmp);
            }
            unlink($tempImagePath);
        }

        /**
         * Generate ZIP and download
         */
        $zip = new ZipArchive;
        $zipPath = sprintf('zip/Lietas_nr_%s.zip', $metaData['lietas_nr']);
        if ($zip->open(public_path($zipPath), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path($archivePath));
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        }

        File::deleteDirectory(public_path($archivePath));
        return response()->download(public_path($zipPath))->deleteFileAfterSend();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metas = ProjectsMeta::where('project_id', $id)->get()->toArray();
        foreach ($metas as $key => $meta) {
            $metaData[$meta['meta_key']] = $meta['data_type'] == 'json' ? json_decode($meta['meta_value'], true) : $meta['meta_value'];
        }

        if (!array_key_exists('bojajumi', $metaData)) {
            $metaData['bojajumi'] = [];
        }

        if (!array_key_exists('konstatetie_bojajumi', $metaData)) {
            $metaData['konstatetie_bojajumi'] = [];
        }

        if (!array_key_exists('aprikojums', $metaData)) {
            $metaData['aprikojums'] = [];
        }

        if (!array_key_exists('other_aprikojums', $metaData)) {
            $metaData['other_aprikojums'] = [];
        }

        $projectImages = ProjectsImages::where('project_id', $id)->get()->toArray();
        $imagesName = [];
        $imagesList = [];
        foreach ($projectImages as $image) {
            $name = str_replace($id.'/', '', strstr($image['url_path'], $id.'/'));
            $imagesName[] = $name;
            $imagesList[] = [
                'name' => $name,
                'url' => URL::route('default') . $image['url_path'],
            ];
        }

        return view('pages.projects.edit', ['project' => $metaData, 'projectId' => $id, 'image_list' => $imagesList, 'image_name' => $imagesName]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projectsMeta = [];
        $requestOptions = $request->all();
        foreach ($requestOptions as $key => $option) {
            if ($key != '_token') {
                $data = is_array($option) ? json_encode($option) : $option;
                $dataType = is_array($option) ? 'json' : 'string';

                $projectsMeta[] = [
                    'project_id' => $id,
                    'meta_key' => $key,
                    'meta_value' => $data,
                    'data_type' => $dataType,
                    'created_at' => date('Y-m-d H:j:s'),
                    'updated_at' => date('Y-m-d H:j:s')
                ];
            }
        }


        /**
         * Uploading project images.
         */
        if ($request->has('files')) {
            $fileRequest = $request->get('files');

            if($fileRequest['changed']) {
                $files = $fileRequest['files'];
                $uniqueId = $fileRequest['unique_id'];

                $projectsImages = [];
                foreach ($files as $file) {
                    $copyFrom = sprintf('%s/%s', $uniqueId, $file);
                    $copyTo = sprintf('projects_images/%s/%s', $id, $file);
                    $exist = Storage::disk('public')->exists($copyFrom);
                    if($exist) {
                        Storage::disk('public-upload-images')->put($copyTo, Storage::disk('public')->get($copyFrom));
                    }
                }
                Storage::disk('public')->deleteDirectory($uniqueId);


                foreach ($files as $file) {
                    $copyTo = sprintf('projects_images/%s/%s', $id, $file);
                    $url = Storage::disk('public-upload-images')->url($copyTo);
                    $url = strstr($url, '/projects_images');
                    $projectsImages[] = [
                        'project_id' => $id,
                        'url_path' => $url,
                        'created_at' => date('Y-m-d H:j:s'),
                        'updated_at' => date('Y-m-d H:j:s')
                    ];
                }
                ProjectsImages::where('project_id', $id)->delete();
                ProjectsImages::insert($projectsImages);
            }
        }

        ProjectsMeta::where('project_id', $id)->delete();
        $projectMeta = ProjectsMeta::insert($projectsMeta);
        if ($projectMeta) {
            $successResponse = [
                'success' => true,
                'message' => 'Projekts ir veiksm??gi atjaunin??ts',
            ];
            return response()->json($successResponse, 200);
        }


        $errorResponse = [
            'success' => true,
            'message' => 'Diem????l projektu nevar??ja atjaunin??t',
        ];
        return response()->json($errorResponse, 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $projectDeleted = Projects::deleteProject($id);
            if ($projectDeleted == true) {
                Session::flash('success', 'Projekts ir veiksm??gi izdz??sts.');
            } else {
                Session::flash('error', 'Diem????l projektu nevar??ja izdz??st');
            }

            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Session::flash('error', 'Kaut kas nog??ja greizi. M????iniet v??l??k v??lreiz.');
            return redirect()->back();
        }
    }
}
