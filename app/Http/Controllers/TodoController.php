<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();

        return view('welcome', compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isFormFieldsValid = ['todo' => 'required|min:5|max:100'];
        $request->validate($isFormFieldsValid);

        $saveTodos = new Todo;
        $saveTodos->todo = $request->input('todo');

        if ($request->isMethod('post')) {
            // Todo::create($isFormFieldsValid);
            $saveTodos->save();
        }

        return \redirect(route('index'));
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
    public function destroy(Request $request, $id)
    {
        $isTodoChecked = $request->input('todoCheckfield');
        ($isTodoChecked == 'on') ? Todo::findOrFail($id)->delete() : null;

        return redirect(route('index'));
    }
}
