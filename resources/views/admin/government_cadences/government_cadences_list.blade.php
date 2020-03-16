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
                <span>Kadencje rządu</span>
                <div class="btn-group pull-right">
                    <button class="btn btn-success add-new-government-cadence-window" data-toggle="modal" data-target="#add-new-government-cadence-window">Dodaj nową kadencję rządu</button>
                </div>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nazwa</th>
                            <th>Opis</th>
                            <th>Rozpoczęcie kadencji rządu</th>
                            <th>Zakończenie kadencji rządu</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($governmentCadences as $key => $governmentCadence)

                        <tr>
                            <td>{!! $key + 1 !!}</td>
                            <td>{{ $governmentCadence->name }}</td>
                            <td>{{ $governmentCadence->description }}</td>
                            <td>{{ $governmentCadence->start_date }}</td>
                            <td>{{ $governmentCadence->expiration_date }}</td>

                            <td>

                                <button class="btn btn-primary edit-government-cadence" data-toggle="modal" data-target="#edit-government-cadence-window" 
                                            government_cadence_id="{{ $governmentCadence->id }}"
                                            name="{{ $governmentCadence->name }}"
                                            description="{{ $governmentCadence->description }}"
                                            start_date="{{ $governmentCadence->start_date }}"
                                            expiration_date="{{ $governmentCadence->expiration_date }}"
                                            >
                                            Edytuj
                                </button>

                                <button class="btn btn-danger delete-government-cadence" data-toggle="modal" data-target="#delete-government-cadence-window" 
                                                    government_cadence_id="{{ $governmentCadence->id }}">
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

<div class="modal fade" id="add-new-government-cadence-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dodaj nową kadencję rządu</h4>
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

                    <div class="form-group">
                        {!! Form::label('description', 'Opis', array('class' => 'control-label')) !!}
                        {!! Form::text('description', null, 
                            array('required', 
                                  'class'=>'form-control', 
                                  'placeholder'=>'Opis')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('start_date','Rozpoczęcie kadencji sejmu') !!}
                        {!! Form::text('start_date', null, 
                            array('required', 
                                  'class'=>'datepicker form-control cadence-start-date', 
                                  'placeholder'=>'Rozpoczęcie kadencji')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('expiration_date','Zakończenie kadencji') !!}
                        {!! Form::text('expiration_date', null, 
                            array('required', 
                                  'class'=>'datepicker form-control cadence-expiration-date', 
                                  'placeholder'=>'Zakończenie kadencji sejmu')) !!}
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

<div class="modal fade" id="edit-government-cadence-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edytuj kadencję rządu</h4>
            </div>

            {!! Form::open(array('class' => 'form', 'method' => 'put')) !!}
            {!! Form::hidden('government_cadence_id', null) !!}

            <div class="modal-body">

                    <div class="form-group">
                        {!! Form::label('name', 'Nazwa', array('class' => 'control-label')) !!}
                        {!! Form::text('name', null, 
                            array('required', 
                                  'class'=>'form-control', 
                                  'placeholder'=>'Nazwa')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Opis', array('class' => 'control-label')) !!}
                        {!! Form::text('description', null, 
                            array('required', 
                                  'class'=>'form-control', 
                                  'placeholder'=>'Opis')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('start_date','Rozpoczęcie kadencji sejmu') !!}
                        {!! Form::text('start_date', null, 
                            array('required', 
                                  'class'=>'datepicker form-control cadence-start-date', 
                                  'placeholder'=>'Rozpoczęcie kadencji')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('expiration_date','Zakończenie kadencji') !!}
                        {!! Form::text('expiration_date', null, 
                            array('required', 
                                  'class'=>'datepicker form-control cadence-expiration-date', 
                                  'placeholder'=>'Zakończenie kadencji sejmu')) !!}
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

<div class="modal fade" id="delete-government-cadence-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Usuwanie kadencji rządu</h4>
            </div>

            <div class="modal-body">
            Czy na pewno chcesz usunąć kadencję rządu?
            </div>
            {!! Form::open(array('class' => 'form', 'method' => 'delete')) !!}
            {!! Form::hidden('government_cadence_id', null) !!}
            <div class="modal-footer">
                {!! Form::submit('Ok', array('class'=>'btn btn-primary')) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<link href="{{ asset('/js/datetimepicker-master/jquery.datetimepicker.css') }}" rel="stylesheet">
<script src="{{ asset('/js/datetimepicker-master/jquery.datetimepicker.js') }}"></script>
<script src="{{ asset('/node_modules/moment/moment.js') }}"></script>
<script src="{{ asset('/js/government_cadences_list.js') }}"></script>

@endsection