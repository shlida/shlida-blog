<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<title>Update Post</title>

	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12 py-2">
					<div class="pull-left">
						<h2>Update Post</h2>
					</div>
				</div>
			</div>
			@if (count($errors) > 0)
				<div class="alert alert-danger py-2">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			{!! Form::open(['route' => ['blog.update', $data->id] ,'method'=>'PUT']) !!}
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<strong>Title:</strong>
						{!! Form::text('title', $data->title, ['placeholder' => 'Title','class' => 'form-control']) !!}
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<strong>Description:</strong>
						{!! Form::textarea('description', $data->description, ['placeholder' => 'Description','class' => 'form-control','style'=>'height:100px']) !!}
					</div>
				</div>
				<div class="col-12">
						<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
			{!! Form::close() !!}

		</div>
	</body>
</html>
