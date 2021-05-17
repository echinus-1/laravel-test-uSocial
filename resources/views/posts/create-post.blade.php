<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add post</title>
		<style>
		</style>
</head>
<body>

<h2>Add post</h2>

@if($errors->all())
    {{ var_dump($errors->all()) }}
@endif

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
		<label>Title:</br>
    <input type="text" name="title" placeholder="post title [required]">
		</label>
		<label>Content:</br>
    <textarea type="text" name="content" placeholder="post content"></textarea>
		</label>
    <input type="submit" value="Submit">
</form>

</body>
</html>
