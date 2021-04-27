<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use Illuminate\Support\Facades\Auth;

class LivroController extends Controller
{
    public function index() {
        $livros = Livro::orderby('id', 'desc')->where('id_user', '=', Auth::id())->paginate();

        return view('library.index', ["livros" => $livros]);
    }

    public function createView() {
        return view('library.create');
    }

    public function create(Request $request) {
        $this->validate(request(), [
            'titulo' => 'required',
            'autor' => 'required|email',
            'status' => 'required|in:Lendo,Lido,Em espera'
        ]);

        $livro = new Livro();
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->status = $request->status;
        $livro->id_user = Auth::id();;
        $livro->save();

        return redirect()->route('livros');
    }

    public function editView(Livro $livro, request $request) {
        return view('library.edit', ['livro' => $livro]);
    }

    public function edit(Request $request, Livro $livro) {
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->status = $request->status;
        $livro->save();

        return redirect()->route('livros');
    }

    public function deleteView(Livro $livro, request $request){
        return view('library.delete', ['livro' => $livro]);
    }

    public function delete(Livro $livro) {
        $livro->delete();
        return redirect()->route('livros');
    }
}
