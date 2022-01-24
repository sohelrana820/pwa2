<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\ProjectsMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

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
        return view('pages.projects.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.projects.create');
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
        foreach ($requestOptions as $key => $option) {
            if($key != '_token') {
                $projectsMeta[] = [
                    'project_id' => $project->id,
                    'meta_key' => $key,
                    'meta_value' => is_array($option) ? json_encode($option) :  $option,
                    'created_at' => date('Y-m-d H:j:s'),
                    'updated_at' => date('Y-m-d H:j:s')
                ];
            }
        }

        $projectMeta = ProjectsMeta::insert($projectsMeta);
        if($projectMeta) {
            $successResponse = [
                'success' => true,
                'message' => 'Project has been created',
            ];
            return response()->json($successResponse, 200);
        }


        $errorResponse = [
            'success' => true,
            'message' => 'Sorry, project couldn\'t created',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
