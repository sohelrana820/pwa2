<?php

namespace App\Http\Controllers;

use App\Forms\ProjectForm;
use App\Models\Projects;
use App\Models\ProjectsMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
    public function index()
    {
        $projects = Projects::where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(25);
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
     * @param  \Illuminate\Http\Request  $request
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
            if($key != '_token') {
                $data = is_array($option) ? json_encode($option) :  $option;
                $dataType = is_array($option) ? 'json' :  'string';

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

        $projectMeta = ProjectsMeta::insert($projectsMeta);
        if($projectMeta) {
            $successResponse = [
                'success' => true,
                'message' => 'Projekts ir veiksmīgi izveidots',
            ];
            return response()->json($successResponse, 200);
        }


        $errorResponse = [
            'success' => true,
            'message' => 'Diemžēl projektu nevarēja izveidot',
        ];
        return response()->json($errorResponse, 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectMetas = Projects::find($id)->projectMeta;
        $metaData = [];
        foreach ($projectMetas as $key => $meta) {
            $metaData[$meta->meta_key] = $meta->data_type == 'json' ? json_decode($meta->meta_value, true) : $meta->meta_value;
        }

        return view('pages.projects.show', ['project' => $metaData, 'projectId' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectMetas = Projects::find($id)->projectMeta;
        $metaData = [];
        foreach ($projectMetas as $key => $meta) {
            $metaData[$meta->meta_key] = $meta->data_type == 'json' ? json_decode($meta->meta_value, true) : $meta->meta_value;
        }

        if(!array_key_exists('bojajumi', $metaData)) {
            $metaData['bojajumi'] = [];
        }

        if(!array_key_exists('konstatetie_bojajumi', $metaData)) {
            $metaData['konstatetie_bojajumi'] = [];
        }

        if(!array_key_exists('aprikojums', $metaData)) {
            $metaData['aprikojums'] = [];
        }

        return view('pages.projects.edit', ['project' => $metaData, 'projectId' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projectsMeta = [];
        $requestOptions = $request->all();
        foreach ($requestOptions as $key => $option) {
            if($key != '_token') {
                $data = is_array($option) ? json_encode($option) :  $option;
                $dataType = is_array($option) ? 'json' :  'string';

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

        ProjectsMeta::where('project_id', $id)->delete();
        $projectMeta = ProjectsMeta::insert($projectsMeta);
        if($projectMeta) {
            $successResponse = [
                'success' => true,
                'message' => 'Projekts ir veiksmīgi atjaunināts',
            ];
            return response()->json($successResponse, 200);
        }


        $errorResponse = [
            'success' => true,
            'message' => 'Diemžēl projektu nevarēja atjaunināt',
        ];
        return response()->json($errorResponse, 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $projectDeleted = Projects::deleteProject($id);
            if ($projectDeleted == true) {
                Session::flash('success', 'Projekts ir veiksmīgi izdzēsts.');
            } else {
                Session::flash('error', 'Diemžēl projektu nevarēja izdzēst');
            }

            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Session::flash('error', 'Kaut kas nogāja greizi. Mēģiniet vēlāk vēlreiz.');
            return redirect()->back();
        }
    }
}
