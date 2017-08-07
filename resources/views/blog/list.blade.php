<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <title>All Blog</title>
        <style type="text/css">
            a:hover {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 py-5">
                    @if($isOwner)
                        <a href="{{ route('blog.create') }}" class="btn btn-info">Create new post</a>
                    @else
                        <a href="{{ route('blog.list', ['id' => 1]) }}" class="btn btn-info">My post</a>
                    @endif
                </div>
                @foreach($data as $item)
                    <div class="col col-md-6 col-lg-4 py-2">
                        <div class="card">
                            <div class="card-header">
                                {{ $item->user->name }}
                            </div>
                            <a href="{{ route('blog.show', ['id' => $item->id]) }}"><img class="card-img-top img-fluid" src="http://lorempixel.com/720/480" alt="Card image cap"></a>
                            <div class="card-block">
                                <a href="{{ route('blog.show', ['id' => $item->id]) }}"><div class="pb-2">
                                    <h4 class="card-title">{{ $item->title }}</h4>
                                    <p class="card-text">{{ $item->description }}</p>
                                </a>
                                </div>
                                @if($isOwner)
                                    <div class="pt-2">
                                        <a href="{{ route('blog.edit', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                                        {!! Form::open(['route' => ['blog.destroy', $item->id], 'method' => 'DELETE', 'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
