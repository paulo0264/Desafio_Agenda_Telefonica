@extends('layouts.main')

@section('title', 'Lista de contatos')

@section('content')

<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="container mt-5">
            <a href="" class="btn btn-primary btn-md mb-3" data-bs-toggle="modal" data-bs-target="#cadastroModal">Novo
                Contato</a>
            @if(session()->has('delete'))
            <div class="alert alert-danger">
                <p>{{session('delete')}}</p>
            </div>
            @endif
            @if(session()->has('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
            @endif
            @if(session()->has('edit'))
            <div class="alert alert-success">
                <p>{{session('edit')}}</p>
            </div>
            @endif

            <table class="table table-striped table-hover table-bordered">

                <thead class="table-dark">
                    <th>ID</th>
                    <th>NOME</th>
                    <th>SOBRE NOME</th>
                    <th>CELULAR</th>
                    <th>E-MAIL</th>
                    <th></th>
                    <th>AÇÕES</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($pessoas as $pessoa)
                    <tr>
                        <td>{{ $pessoa->id }}</td>
                        <td>{{ $pessoa->nome }}</td>
                        <td>{{ $pessoa->sobrenome }}</td>
                        <td>{{ $pessoa->celular }}</td>
                        <td>{{ $pessoa->email }}</td>
                        <td>
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <a title="Ver Contato" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#verModal" role="button"><i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <a href="" title="Editar Contato" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal"><i
                                            class="bi bi-pencil-square"></i></a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <a title="Excluir Acomodação" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#excluirModal"><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                                        <!-- Modal Excluir Contato -->
                    <div class="modal fade" id="excluirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que Deseja Excluir esse Contato?
                                </div>
                                <div class="modal-footer">
                                        <a href="{{ url()->previous() }}" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</a>
                                        <a href="" class="btn btn-danger">Deletar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if (count($pessoas) == 0)
                        <h3>Não há Contatos Cadastrados</h3>
                    @endif
                </tbody>

            </table>
        </div>
    </div>
    {{ $pessoas->links('vendor.pagination.custom') }}
</main>



<!-- Modal Cadastrar -->
<div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Cadastrar Novo Contato</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <form action="/pessoas/create" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Nome" required>
                        </div>

                        <div class="form-group">
                            <label>Sobrenome</label>
                            <input type="text" name="sobrenome" class="form-control" placeholder="Sobrenome" required>
                        </div>

                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" name="celular" class="form-control" placeholder="celular" required>
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control" placeholder="E-mail" required>
                        </div>

                            <a href="{{ url()->previous() }}" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</a>
                            <input class="btn btn-primary mt-3" type="submit" value="Cadastrar">

                    <form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal Editar -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Editar Contato</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <form action="" method="">
                        @csrf
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" name="name" />
                        </div>

                        <div class="form-group">
                            <label>Sobrenome</label>
                            <input class="form-control" name="sobrenome" />
                        </div>

                        <div class="form-group">
                            <label>Celular</label>
                            <input class="form-control" name="celular" />
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="email" />
                        </div>
                    <form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ url()->previous() }}" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</a>
                <input class="btn btn-primary mt-3" type="submit" value="Cadastrar">
            </div>
        </div>
    </div>
</div>

 <!-- Modal Ver contato -->
 <div class="modal fade" id="verModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Dados do Contato</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <ul class="list-group">

                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ url()->previous() }}" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</a>
            </div>
        </div>
    </div>
</div>

@endsection
