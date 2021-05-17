<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit post</title>
		<style>
				table {
						font-family: arial, sans-serif;
						border-collapse: collapse;
						width: 100%;
				}

				td, th {
						border: 1px solid #dddddd;
						text-align: left;
						padding: 8px;
				}

				tr:nth-child(even) {
						background-color: #dddddd;
				}
		</style>
</head>
<body>

<h2>Edit post</h2>

@if($errors->all())
    {{ var_dump($errors->all()) }}
@endif

<form method="POST" action="{{ route('posts.update',['post'=>$post]) }}">
    @csrf
		@method('PATCH')
		<label>Title:</br>
    <input type="text" name="title" placeholder="post title [required]" value="{{$post->title}}">
		</label>
		<label>Content:</br>
    <textarea type="text" name="title" placeholder="post content">
		{{$post->content}}
		</textarea>
		</label>
    <input type="submit" value="Submit">
</form>

</body>
</html>

