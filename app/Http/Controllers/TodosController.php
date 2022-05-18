<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /*
        index para mostrar toos los elementos
        store para guardar
        update para acutalizar
        destroy para eliminar
        edit para mostrar el formulario de edición
    */

    public function store(Request $request) {        
        $request -> validate([
            'title' => 'required|min:3' //Validado a minimo de tres caracteres
        ]);
        
        $todo = new Todo;        
        $todo->title = $request->title;
        $todo->save();                    
        
        return redirect()->route('todos')->with('success', 'Se guardó el todo');                
    }

    public function index(){
        $todos = Todo::all();

        return view('todos.index', ['todos'=> $todos]);
    }

    public function show($id){
        $todo = Todo::find($id);

        return view('todos.show', ['todo' => $todo]);
    }

    public function update(Request $request, $id){
        $todo = Todo::find($id);

        $todo->title = $request->title;

        dd($todo);
        
        return 'Se debio actualizar';
    }

    public function destroy(){
        
    }
}
