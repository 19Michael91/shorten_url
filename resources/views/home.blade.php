<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>URL Shortener</title>
		<link rel="stylesheet" href="{{ URL::to('css/global.css') }}">
	</head>
	<body>
		<div class="container">
			<h1 class="title">Shorten a URL</h1>

			@if ($errors->has('url'))
				<p>{{ $errors->first('url') }}</p>
			@endif

			@if (Session::has('global'))
				<p>All done! Here is your short URL: <a href="{{route('get', Session::get('global'))}}">{{route('get', Session::get('global'))}}</a></p>
			@endif
			<form action="{{ route('make') }}" method="POST">
				<input type="url" name="url" placeholder="Enter a URL" autocomplete="off" {{ (Request::old('url')) ? ' value="' . Request::old('url') . '"' : '' }}>
				<input type="submit" value="Shorten">
				{{ csrf_field() }}
			</form>
		</div>
	</body>
</html>
