<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <title>@auth {{ $user->name }}'s Portfolio @else Portfolio @endauth</title>
</head>
<body>
    <nav>
        <a href="#projects">Projects</a>
        <a href="#about-me">About me</a>
        <a href="#contact">Contact</a>
    </nav>
    <form action="{{ route('portfolio.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <section id="intro">
            <div class="user-pic">
                <img src="{{ $user->avatar }}" alt="My profile picture">
                <input type="hidden" name="user-pic" value="{{ $user->avatar }}">
            </div>
            <div class="profile">
                <input type="text" class="input-edit" name="user-name" value="{{ $user->name }}" placeholder="User name">
                <input type="text" class="input-edit" name="user-desc" value="{{ $user->bio }}" placeholder="User description">
                <input type="text" class="input-edit" name="user-social" value="{{ $user->social }}" placeholder="Social media">
            </div>
            <button id="save-btn">Save</button>
        </section>
        <section id="projects">
            <h2 class="title">Projects</h2>
            <div class="projects">
                @foreach ($userRepos as $repo)
                    <div class="project">
                        <input type="hidden" name="project-ids[]" value="{{ $repo->id }}">
                        <input type="hidden" name="project-langs[]" value="{{ $repo->language }}">
                        <input type="hidden" name="project-urls[]" value="{{ $repo->html_url }}">
                        <input type="text" name="project-names[]" value="{{ ucfirst(str_replace(["-", "_"], " ", $repo->name)) }}">
                        <textarea rows="2" class="input-edit" name="project-descs[]" placeholder="Project description">{{ $repo->description ? $repo->description : ""}}</textarea>
                    </div>
                @endforeach
            </div>
            <button id="save-btn">Save</button>
        </section>
        <section id="about-me">
            <h2 class="title">About Me</h2>
            <textarea rows="30" class="input-edit" name="about-me-desc" placeholder="Project description">My name is {{ $user->name }}, I'm a software developer.</textarea>
            <button id="save-btn">Save</button>
        </section>
    </form>
    <section id="contact">
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
            <div id="send-btn">Send</div>
        </form>
    </section>
    {{-- <footer>
        <div class="links">
            <a class="user-social" href="https://github.com/"><i class="fa-brands fa-github"></i> github.com</a>
            <a class="user-social" href="https://linkedin.com/"><i class="fa-brands fa-linkedin"></i> linkedin.com</a>
        </div>
    </footer> --}}
</body>
</html>