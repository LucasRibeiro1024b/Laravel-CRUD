@extends('layouts.index')
@section('title', 'Adicionar Livro')
@section('content')
    <div class="container">
        <form class="mt-4" method="post" action="{{route('livros.create')}}">
            @csrf

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="Titulo">Titulo</label>
                        <input type="text" class="form-control" id="" name="titulo">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" id="" name="autor">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="" name="status">
                            <option>Lendo</option>
                            <option>Lido</option>
                            <option>Em espera</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>
@endsection
