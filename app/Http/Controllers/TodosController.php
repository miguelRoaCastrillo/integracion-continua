<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

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
            'title' => 'required|min:3', //Validado a minimo de tres caracteres            
            'category_id' => 'required'
        ]);
        
        $todo = new Todo;        
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();                    
        
        return redirect()->route('todos')->with('success', 'Se guardó el todo');                
    }

    public function index(){
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', ['todos'=> $todos, 'categories' => $categories]);
    }

    public function show($id){
        $todo = Todo::find($id);

        return view('todos.show', ['todo' => $todo]);
    }

    public function update(Request $request, $id){

        //dd($request); para mostrar informacion de la variable ingresada en pantalla

        $todo = Todo::find($id);

        $todo->title = $request->title;

        $todo->update();
        
        return redirect()->route('todos')->with('success', 'Tarea actualizada');                
    }

    public function destroy($id){
        $todo = Todo::find($id)->delete();        

        return redirect()->route('todos')->with('success', 'Tarea eliminada con éxito');
    }
}
