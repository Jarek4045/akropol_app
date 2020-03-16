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
			<div class="panel-heading">
				<span>Panel właściciela</span>
				<div class="btn-group pull-right">
				</div>
			</div>
			<div class="panel-body">

				<div class="col-sm-6 col-md-4 publication-block">
					<div class="thumbnail category-item">
						<a href="{{ url('owner/userslist') }}">
							<div class="image-container popupiframe">
								<div style="background-image:url({{ url('css/img/options.png') }})" class="portal-content-image" /></div>
								<div class="play-sign showonhover animated fadeIn"></div>
							</div>

							<div class="caption">
								<h3>Lista użytkowników</h3>
							</div>
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


@endsection