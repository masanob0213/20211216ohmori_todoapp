<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $items = DB::select('select * from todo');
        return view('index', ['items' => $items]);
    }
    /*トップページ*/

    public function create(Request $request)
    {
        $param = [
            'content' => $request->content,
            /*'created_at' => $request->created_at,*/
        ];
        DB::insert('insert into todo (content) values (:content)', $param);
        return redirect('/');
    }
    /*追加*/

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'content' => $request->content,
            'updated_at' => $request->updated_at,
        ];
        DB::update('update todo set content = :content,updated_at = :updated_at where id =:id', $param);
        return redirect('/');
    }
    /*更新*/
    public function delete(Request $request)
    {
        $param = ['id' => $request->id];
        DB::delete('delete from todo where id =:id', $param);
        return redirect('/');
    }
    /*削除*/
}
