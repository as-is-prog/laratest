<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\User;

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
        $tags = $request->input('tags',[]);

        $project = Project::create([
            'userid' => Auth::User()->id,
            'name' => $name,
            'outline' => $outline
        ]);

        foreach($tags as $tagId){
            $project->tags()->attach($tagId);
        }

        return view('resultmessage', ['message' => $request->input('name')."プロジェクトを作成しました。", 'link' => 'home']);
    }

    public function join($id){
        $project = Project::where('id','=',$id)->firstOrFail();

        if(Auth::check() == false){
            return view('resultmessage', ['message' => 'ログインしていないためプロジェクトに参加できません', 'link' => 'project/'.$id]);
        }

        if($project->createdUser->id == Auth::user()->id || $project->joinedUsers()->where('id',Auth::user()->id)->exists()){
            return view('resultmessage', ['message' => "あなたは既に".$project->name."プロジェクトに参加しています。", 'link' => 'project/'.$id]);
        }

        $project->joinedUsers()->attach(Auth::user()->id);

        return view('resultmessage', ['message' => $project->name."プロジェクトに参加しました。", 'link' => 'home']);
    }

    public function terminate($id){
        $project = Project::where('id','=',$id)->firstOrFail();

        if(Auth::check() == false || $project->createdUser->id != Auth::user()->id){
            return view('resultmessage', ['message' => 'ERROR:あなたはこのプロジェクトを終了する権限がありません。', 'link' => 'project/'.$id]);
        }

        $project->terminated = true;
        $project->save();

        return view('resultmessage', ['message' => $project->name."プロジェクトを終了しました。<br>ぜひメンバーの評価をお願いいたします。", 'link' => 'project/'.$id ]);
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
        $project = Project::where('id','=',$id)->firstOrFail();
        return view('project',['project' => $project]);
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
        $tags = $request->input('tags',[]);

        $projects = null;

        if(!empty($tags)) {
            $projects = Project::WhereHas('tags', function ($query) use ($tags) {
                $query->WhereIn('id', $tags);
            });
        }

        $projects = ($projects == null ? Project::where('outline', 'like', "%{$word}%") : $projects->where('outline', 'like', "%{$word}%"));

        return view('searchproject', ['projects' => $projects->orderby('updated_at','desc')->get(),'tags' => \App\Tag::all(), 's_tags' => collect($tags), 's_word' => $word]);
    }
}
