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
                <span>Politycy</span>
                <div class="btn-group pull-right">
                    <button class="btn btn-success add-new-politician-to-partie-window" data-toggle="modal" data-target="#add-new-politician-to-partie-window">Dodaj polityka do partii</button>
                </div>
            </div>
            <div class="panel-body">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Polityk</th>
                            <th>Partia</th>
                            <th>Rozpoczęcie kadencji</th>
                            <th>Zakończenie kadencji</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($politiciansToParties as $key => $politicianToPartie)

                        <tr>
                            <td>{!! $key + 1 !!}</td>
                            <td>{{ $politicianToPartie->politician_name }}</td>
                            <td>{{ $politicianToPartie->partie_name }}</td>
                            <td>{{ $politicianToPartie->start_date }}</td>
                            <td>{{ $politicianToPartie->expiration_date }}</td>

                            <td>

                                <button class="btn btn-primary edit-politician-to-partie" data-toggle="modal" data-target="#edit-politician-to-partie-window" 
                                            politician_to_partie_id="{{ $politicianToPartie->id }}"
                                            politician_id="{{ $politicianToPartie->politician_id }}"
                                            partie_id="{{ $politicianToPartie->partie_id }}"
                                            start_date="{{ $politicianToPartie->start_date }}"
                                            expiration_date="{{ $politicianToPartie->expiration_date }}"
                                            >
                                            Edytuj
                                </button>

                                <button class="btn btn-danger delete-politician-to-partie" data-toggle="modal" data-target="#delete-politician-to-partie-window" 
                                                    politician_to_partie_id="{{ $politicianToPartie->id }}">
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

<div class="modal fade" id="add-new-politician-to-partie-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dodaj polityka do partii</h4>
            </div>

            {!! Form::open(array('class' => 'form', 'method' => 'post')) !!}
            <div class="modal-body">

                    <div class="form-group">
                        {!! Form::label('Polityk') !!}
                        {!! Form::select('politician_id', $politiciansArray, null, array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Partia') !!}
                        {!! Form::select('partie_id', $partiesArray, null, array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('start_date','Rozpoczęcie kadencji') !!}
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
                                  'placeholder'=>'Zakończenie kadencji')) !!}
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

<div class="modal fade" id="edit-politician-to-partie-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edytuj polityka w partii</h4>
            </div>

            {!! Form::open(array('class' => 'form', 'method' => 'put')) !!}
            {!! Form::hidden('politician_to_partie_id', null) !!}

            <div class="modal-body">

                    <div class="form-group">
                        {!! Form::label('Polityk') !!}
                        {!! Form::select('politician_id', $politiciansArray, null, array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Partia') !!}
                        {!! Form::select('partie_id', $partiesArray, null, array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('start_date','Rozpoczęcie kadencji') !!}
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
                                  'placeholder'=>'Zakończenie kadencji')) !!}
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

<div class="modal fade" id="delete-politician-to-partie-window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Usuwanie polityka z partii</h4>
            </div>

            <div class="modal-body">
            Czy na pewno chcesz usunąć polityka z partii?
            </div>
            {!! Form::open(array('class' => 'form', 'method' => 'delete')) !!}
            {!! Form::hidden('politician_to_partie_id', null) !!}
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
<script src="{{ asset('/js/politicians_to_parties_list.js') }}"></script>

@endsection