<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pessoa;

class PessoasController extends Controller
{
    //GET
    public function index(Request $request) {

        $search = request('search');

        if ($search) {
            $pessoas = Pessoa::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();

        }else{
            $pessoas = Pessoa::paginate(2);
        }

        return view('/pessoas/index',['pessoas'=>$pessoas, 'search'=>$search]);
    }

    // GET create
    public function create() {

        // Retorna a view de cadastro
        return view('/pessoas/create');
    }

    /*public function show(){
        $pessoas = Pessoa::all();
        //return view('pessoas.show',compact('pessoas'));
        return view('/pessoas/index',['pessoas' => $pessoas]);
    }*/

    // POST /store
    public function store(Request $request) {

        //store new customer
        $store = new Pessoa;

        $store-> name = $request->name;
        $store-> sobrenome = $request->sobrenome;
        $store-> celular = $request->celular;
        $store-> email = $request->email;


        //save new customer
        $store->save();

        return redirect('/')->with('success', "Contato Cadastrado com sucesso!");

    }

    public function edit($id){

        $pessoa = Pessoa::findOrFail($id);

        return view('/{id}pessoas/editar',['pessoa' => $pessoa]);
    }

    // POST /store
    public function update(Request $request, $id) {

        //store new customer
        $pessoa = Pessoa::findOrFail($id);

        $pessoa-> name = $request->name;
        $pessoa-> sobrenome = $request->sobrenome;
        $pessoa-> celular = $request->celular;
        $pessoa-> email = $request->email;

        //save new customer
        $pessoa->update();

        return redirect('/')->with('success', "Contato Atualizado com sucesso!");

    }

   public function destroy($id){

    $pessoa = Pessoa::find($id);
    $pessoa->delete();

        return redirect()->route('pessoas.index')
                        ->with('delete','Contato Deletado com Sucesso!');
    }
}
