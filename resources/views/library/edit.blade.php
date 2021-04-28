@extends('layouts.index')
@section('title', 'Editar Livro')
@section('content')
    <div class="container">
        <form class="mt-4" method="post" action="{{route('livro.put.edit', $livro)}}">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="Titulo">Titulo</label>
                        <input type="text" class="form-control" id="" name="titulo" value="{{$livro->titulo}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" id="" name="autor"  value="{{$livro->autor}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="" name="status" >
                            <option
                                @if ($livro->status == "Lendo")
                                selected="selected"
                                @endif
                            >Lendo</option>
                            <option
                                @if ($livro->status == "Lido")
                                selected="selected"
                                @endif
                            >Lido</option>
                            <option
                                @if ($livro->status == "Em espera")
                                selected="selected"
                                @endif
                            >Em espera</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
