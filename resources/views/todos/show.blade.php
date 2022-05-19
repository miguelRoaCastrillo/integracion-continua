@extends('app')

@section('content')

    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('todos-update', ['id'=>$todo->id]) }}" method="POST">
            @csrf 
            @method('PATCH')
            @if (session('success'))
                <h6 class="alert alert-success">
                    {{ session('success') }}
                </h6>                
            @endif

            @error ('title')
                <h6 class="alert alert-danger">
                    {{ $message }}
                </h6>                
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $todo->title }}"/>
            </div>
            <br>    
            <button type="submit" class="btn btn-primary">Actualizar tarea</button>
        </form>        
    </div>

@endsection