@extends('layouts.index')
@section('title', 'Livros')
@section('content')
    <div class="container">

        <a href="{{route('livros.add')}}" type="button" class="mt-4 mb-4 btn btn-primary">Adicionar Livro</a>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($livros as $livro)
                            <tr>
                                <td>{{$livro->titulo}}</td>
                                <td>{{$livro->autor}}</td>
                                <td>{{$livro->status}}</td>
                                <td>
                                    <a href="{{route('livros.edit', $livro)}}"><i class="fas fa-edit text-info"></i></a>
                                    <a href="{{route('livros.delete', $livro)}}"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable').dataTable({
                "ordering": false,
            })
        });
    </script>
@endsection
