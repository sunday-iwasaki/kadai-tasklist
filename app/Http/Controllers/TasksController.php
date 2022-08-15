<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    // getでtasks/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks'=>$tasks]);
    }

    // getでtasks/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $task = new Task;
        return view('tasks.create', ['task'=>$task]);
    }

    // postでtasks/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $request->validate(['content'=>'required']);
        $request->validate(['status'=>'required|max:10']);
        
        $task = new Task;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();
        return redirect('/');
    }

    // getでtasks/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', ['task' => $task]);
        
    }

    // getでtasks/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit',['task'=>$task] );
    }

    // putまたはpatchでtasks/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();
        return redirect('/');
        
    }

    // deleteでtasks/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/');
    }
}
