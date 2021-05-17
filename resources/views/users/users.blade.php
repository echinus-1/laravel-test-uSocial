<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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

<!-- HEADER -->
<header class="header"> <!-- Header per contenuto di navigazione -->
    <nav class="header__nav"> <!-- lista di link -->
        <ul>
            <li>Dashboard</li>
            <li><a href="{{ route('users.create') }}">add</a></li>
            <li>Settings</li>
        </ul>
    </nav>
</header>

<!-- CONTENT -->
<div class="content">
    <table id="table">
        <caption>Users</caption>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{ route('users.edit',['user' => $user]) }}"><button>edit</button></a>

                    <form action="{{ route('users.destroy',['user' => $user]) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>

</html>
