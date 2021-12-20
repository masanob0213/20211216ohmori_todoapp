<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $items = Todo::all();
        return view('index', ['items' => $items]);
    }
    /*トップページ*/
    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/')->with('flash_message', '・タスクを更新しました。');
    }
    /*public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'content' => $request->content,
            'updated_at' => $request->updated_at,
        ];
        DB::update('update todos set content = :content,updated_at = :updated_at where id =:id', $param);
        return redirect('/');
    }*/

    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/')->with('flash_message', '・タスクを削除しました。');
    }
    /*public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from todos where id =:id', $param);
        return redirect('/');
    }
    */
}
