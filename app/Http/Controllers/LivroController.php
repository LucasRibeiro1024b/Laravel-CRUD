<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use Illuminate\Support\Facades\Auth;

class LivroController extends Controller
{
    public function index() {
        $livros = Livro::orderby('id', 'desc')->where('id_user', '=', Auth::id())->paginate();

        return view('view/livro/livro-view', ["livros" => $livros]);
    }

    public function createView() {
        return view('new/livro/livro-new');
    }

    public function create(Request $request) {
        $this->validate(request(), [
            'titulo' => 'required',
            'autor' => 'required',
            'status' => 'required|in:Lendo,Lido,Em espera'
        ]);

        $livro = new Livro();
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->status = $request->status;
        $livro->id_user = Auth::id();;
        $livro->save();

        return redirect()->route('livro.get.view');
    }

    public function editView(Livro $livro, request $request) {
        return view('edit/livro/livro-edit', ['livro' => $livro]);
    }

    public function edit(Request $request, Livro $livro) {
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->status = $request->status;
        $livro->save();

        return redirect()->route('livro.get.view');
    }

    public function deleteView(Livro $livro, request $request){
        return view('delete/livro/livro-delete', ['livro' => $livro]);
    }

    public function delete(Livro $livro) {
        $livro->delete();
        return redirect()->route('livro.get.view');
    }
}
