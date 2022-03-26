<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <title>{{ explode(" ", $user->name)[0] }}'s Portfolio</title>
</head>
<body>
    <nav>
        <a href="{{ route('portfolio.index') }}">Portfolio</a>
        <a href="#projects">Projects</a>
        <a href="#about-me">About me</a>
        <a href="#contact">Contact</a>
    </nav>
    <form action="{{ route('portfolio.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <section id="intro">
            @error('error')
                <p class="error">{{ $message }}</p>
            @enderror
            @if($user->avatar)
            <div class="user-pic">
                <img src="{{ $user->avatar }}" alt="My profile picture">
            </div>
            @endif
            <div class="profile">
                <input type="text" class="input-edit" name="user-name" value="{{ $user->name }}" placeholder="User name">
                <input type="text" class="input-edit" name="user-desc" value="{{ $user->bio }}" placeholder="User description">
                <input type="text" class="input-edit fs-09" name="user-social" value="{{ $user->social }}" placeholder="Social media">
                <input type="text" class="input-edit fs-09" name="user-pic" value="{{ $user->avatar }}" placeholder="Image URL">
            </div>
            <button id="save-btn">Save</button>
        </section>
        <section id="projects">
            <h2 class="title">Projects</h2>
            @if($maxRepos)
            <p>You can save a maximum of 8 projects.</p>
            @endif
            <div id="reload-repos">
                <button name="reload-repos">Reload Repositories</button>
            </div>
            <div class="projects">
                @foreach ($userRepos as $repo)
                    <div class="project" @if(isset($repo->image)) style="background-image: url('{{ $repo->image }}')" @endif>
                        <div class="delete-project">
                            <i onclick="deleteProject(this)" class="fa-solid fa-trash-can"></i>
                        </div>
                        <input type="hidden" name="project-ids[]" value="{{ $repo->id }}">
                        <input type="hidden" name="project-langs[]" value="{{ $repo->language }}">
                        <input type="hidden" name="project-urls[]" value="{{ $repo->html_url }}">
                        <input type="text" name="project-images[]" value="{{ $repo->image ?? '' }}" placeholder="Project image">
                        <div class="project-inputs">
                            <input type="text" name="project-names[]" value="{{ ucfirst(str_replace(["-", "_"], " ", $repo->name)) }}">
                            <textarea rows="2" class="input-edit" name="project-descs[]" placeholder="Project description">{{ $repo->description ? $repo->description : ""}}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>
            <button id="save-btn">Save</button>
        </section>
        <section id="about-me">
            <h2 class="title">About Me</h2>
            <textarea rows="30" class="input-edit" name="about-me-desc" placeholder="Project description">{{ $user->about }}</textarea>
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
    <script src="{{ asset('js/edit.js') }}"></script>
    @if($styles)
    <script>
        const nav = document.getElementsByTagName('nav')[0];
        const intro = document.getElementById('intro'); 
        const projects = document.getElementById('projects');
        const about = document.getElementById('about-me');
        const contact = document.getElementById('contact');
        nav.style.background = "{{ $styles->nav }}";
        intro.style.background = "{{ $styles->intro }}";
        projects.style.background = "{{ $styles->projects }}";
        about.style.background = "{{ $styles->about }}";
        contact.style.background = "{{ $styles->contact }}";
    </script>
    @endif
</body>
</html>