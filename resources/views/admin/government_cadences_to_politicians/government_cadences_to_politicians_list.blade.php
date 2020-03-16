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
                <span>Politycy w rządzie</span>
                <div class="btn-group pull-right">
                    <button class="btn btn-success add-new-government-cadences-to-politicians-window" data-toggle="modal" data-target="#add-new-government-cadences-to-politicians-window">Dodaj polityka do rządu</button>
                </div>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Polityk</th>
                            <th>Rząd</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($governmentCadences as $key => $governmentCadence)

                        <tr>
                            <td>{!! $key + 1 !!}</td>
                            <td>{{ $governmentCadence->politician_name }}</td>
                            <td>{{ $governmentCadence->government_cadence_name }}</td>

                            <td>

                                <button class="btn btn-primary edit-government-cadences-to-politicians" data-toggle="modal" data-target="#edit-government-cadences-to-politicians-window" 
                                            government_cadence_to_politician_id="{{ $governmentCadence->id }}"
                                            politician_id="{{ $governmentCadence->politician_id }}"
                                            government_cadence_id="{{ $governmentCadence->government_cadence_id }}"
                                            >
                                            Edytuj
                                </button>

                                <button class="btn btn-danger delete-government-cadences-to-politicians" data-toggle="modal" data-target="#delete-government-cadences-to-politicians-window" 
                                                    government_cadence_to_politician_id="{{ $governmentCadence->id }}">
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

<div class="modal fade" id="add-new-government-cadences-to-politicians-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dodaj polityka do rządu</h4>
            </div>

            {!! Form::open(array('class' => 'form', 'method' => 'post')) !!}
            <div class="modal-body">

                    <div class="form-group">
                        {!! Form::label('Polityk') !!}
                        {!! Form::select('politician_id', $politiciansArray, null, array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Rząd') !!}
                        {!! Form::select('government_cadence_id', $governmentCadencesArray, null, array('class' => 'form-control')) !!}
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

<div class="modal fade" id="edit-government-cadences-to-politicians-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edytuj polityka w rządzie</h4>
            </div>

            {!! Form::open(array('class' => 'form', 'method' => 'put')) !!}
            {!! Form::hidden('government_cadence_to_politician_id', null) !!}

            <div class="modal-body">

                    <div class="form-group">
                        {!! Form::label('Polityk') !!}
                        {!! Form::select('politician_id', $politiciansArray, null, array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Rząd') !!}
                        {!! Form::select('government_cadence_id', $governmentCadencesArray, null, array('class' => 'form-control')) !!}
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

<div class="modal fade" id="delete-government-cadences-to-politicians-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Usuwanie polityka z rządu</h4>
            </div>

            <div class="modal-body">
            Czy na pewno chcesz usunąć polityka z rządu?
            </div>
            {!! Form::open(array('class' => 'form', 'method' => 'delete')) !!}
            {!! Form::hidden('government_cadence_to_politician_id', null) !!}
            <div class="modal-footer">
                {!! Form::submit('Ok', array('class'=>'btn btn-primary')) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script src="{{ asset('/js/government_cadences_to_politicians_list.js') }}"></script>

@endsection