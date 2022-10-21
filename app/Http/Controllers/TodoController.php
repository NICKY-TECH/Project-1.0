<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo=Todo::all();
        return view('home',['todo'=> $todo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Task'=>'required'
        ]);
      Todo::create([
        'Task'=>$request->input('Task'),
        'Status'=>'To-do'

      ]);
     return redirect('/todo');
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
        if($request->input('Tasks')){
            $todo = Todo::find($id);
            $todo->Task = $request->input('Tasks');
            $todo->save();
               return redirect('/todo');

        }else{
           $edit= Todo::find($id);
            if($edit->Status=='To-do'){
                Todo::where('id',$id)->update([
                    'Status'=>'Task-Completed'
                   ]);
                return redirect('/todo');
            }else if($edit->Status=='Task-Completed'){
                Todo::where('id',$id)->update([
                    'Status'=>'To-do'
                   ]);
                return redirect('/todo');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($todo)
    {
        Todo::find($todo)->delete();
       return redirect('/todo');
    }
}
