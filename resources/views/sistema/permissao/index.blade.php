@extends('layout.padrao')
@section('title', 'Permissão')

@section('title.descricao', 'Lista de Permissão')
@section('breadcrumbs', Breadcrumbs::render('sistema.permissao'))

@section('conteudo')
@include('flash::message')

@include('layout._partials.modal.permissao')
@include('layout._partials.modal.delete')

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Lista de Permissão</h3>
    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-md-12">
                {{--<a href="{{ action('PermissionController@create')}}">--}}
                    {{--<button class="btn btn-blue btn-icon btn-icon-standalone">--}}
                        {{--<i class="fa-plus-circle"></i>--}}
                        {{--<span>Adicionar Permissão</span>--}}
                    {{--</button>--}}
                {{--</a>--}}
                <a href="javascript: void(0);" id="btn-add">
                    <button class="btn btn-blue btn-icon btn-icon-standalone">
                        <i class="fa-plus-circle"></i>
                        <span>Adicionar Permissão</span>
                    </button>
                </a>
            </div>
        </div>

        @if(count($permissao) > 0)

            <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">

                    <table id="example-1" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example-1_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th style="width: 200px;">Nome</th>
                                <th style="width: 200px;">Slug</th>
                                <th style="width: 200px;">Descrição</th>
                                <th class="text-center" style="width: 70px;">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissao as $p)
                            <tr role="row" class="odd">
                                <td>{{$p->name}}</td>
                                <td>{{$p->slug}}</td>
                                <td>{{$p->description}}</td>
                                <td class="text-center">
                                    <a class="glyphicon glyphicon-user" href="{{ action('PermissionController@assign', $p->id) }}"></a>
                                    <a class="fa-pencil" href="javascript: void(0);" onclick="modalEditPermission({{$p->id}})" ></a>
                                    <a href="#" class="fa-trash" data-href="{{ action('PermissionController@delete', $p->id) }}" data-toggle="modal" data-target="#confirm-delete"></a><br>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        @else
            <div class="well well-sm" style="margin-top: 15px;">
                Nenhum registro encontrado.
            </div>
        @endif
    </div>
    
</div>

@stop


