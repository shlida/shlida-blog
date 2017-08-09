<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<title>Show Post</title>
	</head>
	<body>
		<div class="container">
			<div class="py-2">
				<a href="{{ route('blog.list', ['id' => 'all']) }}" class="btn btn-info">All List</a>
			</div>
			<div class="row">
				<div class="col-12 py-2">
					<div class="card" >
						<div class="card-header">
							{{ $data->user->username }}
						</div>
						<img class="card-img-top img-fluid" src="http://lorempixel.com/720/480" alt="Card image cap">
						<div class="card-block">
							<div class="pb-2">
								<h4 class="card-title">{{ $data->title }}</h4>
								<p class="card-text">{{ $data->description }}</p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</body>
</html>
