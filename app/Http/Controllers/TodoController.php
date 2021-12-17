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
            /*'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,*/
        ];
        DB::insert('insert into todo (content) values (:content)', $param);
        return redirect('/');
    }
    /*追加*/

    public function update(Request $request)
    {
        /*$param = ['id' => $request->id];*/
        $param = [
            'content' => $request->content,
        ];
        /*DB::select('select * from todo where id = :id', $param);*/
        DB::update('update  todo set content=:content', $param);
        return redirect('/');
    }
}
