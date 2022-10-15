<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;
use App\Http\Requests\todoRequest;
use App\Models\user;
use App\Models\tag;

class todoController extends Controller
{
    public function index() {
    $indexs = todo::all();
    return view('index',['indexs' => $indexs]);
    }

    public function create(todoRequest $request)
    {
        $form = $request->all();
        todo::create($form);
        return redirect('/');
    }

    public function update(todoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        todo::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $id = todo::find($request->id);
        $id -> delete();
        return redirect('/');
    }

    public function search(Request $request)
    {
         return view('search', [
         $searchs = 'searchs'
        ]);
    }

      public function find(Request $request)
    {
       $searchs = $request->input('task_name','user_id','tag_id'); 

        $searchs = Todo::where('task_name', 'LIKE', '%'.$task_name.'%')->
                         where('user_id', 'LIKE', '%'.$user_id.'%')-> 
                         where('tag_id', 'LIKE', '%'.$tag_id.'%');

        return view('search', [
         $searchs = 'searchs'
        ]);
}
 }