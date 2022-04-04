<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Portfolios Dev</title>
    <style>
        main {
            display: flex;
            align-content: center;
            justify-content: center;
            flex-direction: column;
            height: calc(100vh - 50px);
            background-color: rgb(136, 136, 136);
        }
        #search {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        #search input {
            height: 20px;
        }
        #search button {
            cursor: pointer;
        }
        #login {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        #login button {
            border: none;
            border-radius: 2px;
            height: 30px;
            width: fit-content;
            padding: 0 5px;
            font-size: 1rem;
            color: #FFFFFF;
            background-color: #238636;
        }

        #login button:hover {
            cursor: pointer;
            background-color: #2EA043;
        }

        p {
            text-align: center;
            padding-bottom: 5px;
        }

        strong {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav></nav>
    <main>
        @error('userNotFound')
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @enderror
        <form id="search" action="{{ route('searchUser') }}" method="post">
            @csrf
            <input type="text" name="user" placeholder="Search github username">
            <button>Search</button>
        </form>
        <form id="login" action="{{ route('redirectToProvider', 'github') }}">
            @csrf
            <p>Create a <strong>portfolio page</strong> using your github repositories as your projects.</p>
            <button><i class="fa-brands fa-github"></i> Login with GitHub</button>
        </form>
    </main>
</body>
</html>