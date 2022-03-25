<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    @if(isset($preview))
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @else
    <link rel="stylesheet" href="styles.css">
    @endif
    <title>{{ explode(" ", $user->name)[0] }}'s Portfolio</title>
</head>
<body>
    <nav @if($styles) style="background: {{ $styles->nav }}" @endif>
        <a href="#projects">Projects</a>
        <a href="#about-me">About me</a>
        <a href="#contact">Contact</a>
    </nav>
    <section id="intro" @if($styles) style="background: {{ $styles->intro }}" @endif>
        @if($user->avatar)
        <div class="user-pic">
            <img src="{{ $user->avatar }}" alt="My profile picture">
        </div>
        @endif
        <div class="profile">
            <h1 class="user-name">{{ $user->name }}</h1>
            @if ($user->bio)
                <p class="user-desc">{{ $user->bio }}</p>
            @endif
            <a class="user-social" target="_blank" href="https://{{ $user->social }}"><i class="fa-brands fa-github"></i> {{ $user->social }}</a>
        </div>
    </section>
    <section id="projects" @if($styles) style="background: {{ $styles->projects }}" @endif>
        <h2 class="title">Projects</h2>
        <div class="projects">
            @foreach ($userRepos as $repo)
                <div class="project">
                    <p class="project-desc"><a target="_blank" href="{{ $repo->html_url }}"><strong>{{ ucfirst(str_replace(["-", "_"], " ", $repo->name)) }}</strong>{{ $repo->description ? ": " . $repo->description : ""}}</a></p>
                </div>
            @endforeach
        </div>
    </section>
    <section id="about-me" @if($styles) style="background: {{ $styles->about }}" @endif>
        <h2 class="title">About Me</h2>
        <p class="about-me-desc">{{ $user->about }}</p>
    </section>
    <section id="contact" @if($styles) style="background: {{ $styles->contact }}" @endif>
        <h2 class="title">Contact</h2>
        <form action="">
            <div class="form-group">
                <div>
                    <label for="name">Name</label><br>
                    <input type="text" name="name">
                </div>
                <div>
                    <label for="email">E-mail</label><br>
                    <input type="email" name="email">
                </div>
            </div>
            <label for="subject">Subject</label>
            <input type="text" name="subject">
            <label for="message">Message</label>
            <textarea name="message" rows="10"></textarea>
            <button>Send</button>
        </form>
    </section>
</body>
</html>