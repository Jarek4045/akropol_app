@extends('layouts.app')

@section('content')
<ul>
    @foreach($errors->all() as $error)
        <div class="bs-example col-md-10 col-md-offset-1">
            <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Uwaga!</strong> {{ $error }}
            </div>
        </div>
    @endforeach
</ul>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading panel-big">
                <span>Typy głosowania</span>
                <div class="btn-group pull-right">
                    <button class="btn btn-success add-new-type-of-voting-window" data-toggle="modal" data-target="#add-new-type-of-voting-window">Dodaj nowy typ głosowania</button>
                </div>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nazwa</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($typesOfVoting as $key => $typeOfVoting)

                        <tr>
                            <td>{!! $key + 1 !!}</td>
                            <td>{{ $typeOfVoting->name }}</td>

                            <td>

                                <button class="btn btn-primary edit-type-of-voting" data-toggle="modal" data-target="#edit-type-of-voting-window" 
                                            type_of_voting_id="{{ $typeOfVoting->id }}"
                                            name="{{ $typeOfVoting->name }}"
                                            >
                                            Edytuj
                                </button>

                                <button class="btn btn-danger delete-type-of-voting" data-toggle="modal" data-target="#delete-type-of-voting-window" 
                                                    type_of_voting_id="{{ $typeOfVoting->id }}">
                                                    Usuń
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-new-type-of-voting-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dodaj nowy typ głosowania</h4>
            </div>

            {!! Form::open(array('class' => 'form', 'method' => 'post')) !!}
            <div class="modal-body">

                    <div class="form-group">
                        {!! Form::label('name', 'Nazwa', array('class' => 'control-label')) !!}
                        {!! Form::text('name', null, 
                            array('required', 
                                  'class'=>'form-control', 
                                  'placeholder'=>'Nazwa')) !!}
                    </div>

            </div>
            <div class="modal-footer">
                {!! Form::submit('Ok', array('class'=>'btn btn-primary')) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="edit-type-of-voting-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edytuj typ głosowania</h4>
            </div>

            {!! Form::open(array('class' => 'form', 'method' => 'put')) !!}
            {!! Form::hidden('type_of_voting_id', null) !!}

            <div class="modal-body">

                    <div class="form-group">
                        {!! Form::label('name', 'Nazwa', array('class' => 'control-label')) !!}
                        {!! Form::text('name', null, 
                            array('required', 
                                  'class'=>'form-control', 
                                  'placeholder'=>'Nazwa')) !!}
                    </div>

            </div>
            <div class="modal-footer">
                {!! Form::submit('Ok', array('class'=>'btn btn-primary')) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="delete-type-of-voting-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Usuwanie typu głosowania</h4>
            </div>

            <div class="modal-body">
            Czy na pewno chcesz usunąć typ głosowania?
            </div>
            {!! Form::open(array('class' => 'form', 'method' => 'delete')) !!}
            {!! Form::hidden('type_of_voting_id', null) !!}
            <div class="modal-footer">
                {!! Form::submit('Ok', array('class'=>'btn btn-primary')) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script src="{{ asset('/js/types_of_voting_list.js') }}"></script>

@endsection