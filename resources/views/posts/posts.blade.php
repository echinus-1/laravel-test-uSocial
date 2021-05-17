<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<style>
				body {
						font-family: arial, sans-serif;
						text-align: center;
				}

				.err {
					color: red;
				}

				label {
					display: block;
				}

				div.content {
					max-width: 1024px;
					margin: auto;
				}

				div.new-post {
						border: 3px solid black;
						padding: 8px;
				}
				.new-post textarea, .new-post input {
						margin-bottom: 12px;
				}
				.new-post textarea {
					width: 100%;
				}
				.new-post input {
					width: 90%;
				}

				div.posts > div {
						margin-top: 32px;
						border: 2px solid gray;
						padding: 8px;
				}

				div.posts > div > div:nth-child(2)  {
						text-align: left;
						font-size: 70%;
				}
				div.posts > div > div:nth-child(3)  {
						text-align: left;
				}

				div.post-header {
						display: flex;
						justify-content: space-between;
						flex-direction: row;
						font-weight: bold;
				}

		</style>
</head>
<body>

<!-- CONTENT -->
<div class="content">

<!-- ADD NEW POST -->
<div class="new-post">
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
		<label>Title:</br>
    <input type="text" name="title" placeholder="title [required]">
		@error('title')
				<div class="err">{{ $message }}</div>
		@endif
		</label>
		<label>Content:</br>
    <textarea type="text" name="content" placeholder="what's new?"></textarea>
		@error('content')
				<div class="err">{{ $message }}</div>
		@endif
		</label>
		<input type="hidden" name="user_id" value="{{ $user_id }}">
    <input type="submit" value="Post it!">

		@if($errors->all())
				<div class="err">The new post could not be created. Check errors above.</div>
		@endif

</form>
</div>

<!-- POSTS FEED -->
<div class="posts">
        @foreach($posts as $post)
            <div>
								<div class="post-header">
										<div>{{$post->user->name}}</div>
										<div>{{$post->title}}</div>
										<div>
										<form action="{{ route('posts.destroy',['post' => $post]) }}" method="POST">
												@csrf
												{{ method_field('DELETE') }}
												<button type="submit">Delete</button>
										</form>
										</div>
								</div>
                <div>{{$post->created_at}}</div>
                <div>{{$post->content}}</div>
            </div>
        @endforeach
</div>

</div>

</body>

</html>
