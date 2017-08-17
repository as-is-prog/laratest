<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $name = $request->input('name');
      $outline = $request->input('outline');

      $project = new Project;
      $project->createuserid = 0;
      $project->imgurl = '';
      $project->maintagid = 0;
      $project->name = $name;
      $project->outline = $outline;

      try{
        $project->save();
      }
      catch(\Exception $e){
         // do task when error
         return $e->getMessage();   // insert query
      }
      return view('resultmessage', ['message' => $request->input('name')."プロジェクトを作成しました。", 'link' => 'home']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function search(Request $request){
        $word = $request->input('word');
        $projects = Project::where('outline', 'like', "%{$word}%")->get();
        return view('searchprojectresult', ['projects' => $projects]);
    }
}
