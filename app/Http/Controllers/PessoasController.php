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

        // Salvamos o contato no banco de dados
        /*$pessoa = new Pessoa;

            $pessoa->name = $request->name;
            $pessoa->sobrenome = $request->sobrenome;
            $pessoa->celular = $request->celular;
            $pessoa->email = $request->email;

        $pessoa->save();*/





        //store new customer
        $store = new Pessoa;   // valible and model name
        $store-> name = $request->name;
        $store-> sobrenome = $request->sobrenome;
        $store-> celular = $request->celular;
        $store-> email = $request->email;


        //save new customer
        $store->save();

        return redirect('/')->with('success', "Contato Cadastrado com sucesso!");

    }

   /* public function destroy($id){
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();

        return redirect()->route('pessoas.index')
                        ->with('success','Contato Deletado com Sucesso!');
    }*/
}
