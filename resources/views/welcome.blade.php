<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>Portfolio Generator</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        button {
            border: none;
            border-radius: 2px;
            height: 30px;
            width: fit-content;
            padding: 0 5px;
            font-size: 1rem;
            color: #FFFFFF;
            background-color: #238636;
        }

        button:hover {
            cursor: pointer;
            background-color: #2EA043;
        }
    </style>
</head>
<body>
    <form action="{{ route('redirectToProvider', 'github') }}">
    @csrf
    <button><i class="fa-brands fa-github"></i> Login with GitHub</button>
    </form>
</body>
</html>