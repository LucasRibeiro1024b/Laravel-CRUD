@extends('layouts.index')
@section('title', 'Deletar')
@section('content')

    <div class="conteiner">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <h5>Deseja realmente excluir este registro?</h5>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <a href="{{route('livros')}}" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
            </div>
            <div class="col-md-auto">
                <form method="POST" action="{{route('livros.delete', $livro->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>


@endsection
