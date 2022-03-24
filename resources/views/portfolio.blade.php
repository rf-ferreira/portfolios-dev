<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toolbox.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>{{ explode(" ", $user->name)[0] }}'s Portfolio</title>
</head>
<body>
    <nav>
        <a href="{{ route('portfolio.preview', auth()->user()->login) }}">Preview</a>
        <a href="#" id="tools">Tools</a>
        <a href="{{ route('portfolio.edit') }}">Edit</a>
        <a href="#projects">Projects</a>
        <a href="#about-me">About me</a>
        <a href="#contact">Contact</a>
    </nav>
    <section id="intro">
        <div id="toolbox" style="display: none">
            <div class="t-random-colors">
                <h3>Random colors</h3>
                <ul>
                    <li id="randomBtn">Generate</li>
                    <li id="defaultColors">Default</li>
                </ul>
            </div>
            <div class="t-download">
                <h3>Download</h3>
                <ul>
                    <li><i class="fa-brands fa-html5"></i> <a href="{{ route('portfolio.download') }}">Html</a></li>
                    <li><i class="fa-brands fa-css3-alt"></i> <a href="{{ route('portfolio.css') }}">Css</a></li>
                </ul>
            </div>
        </div>
        <div class="user-pic">
            <img src="{{ $user->avatar }}" alt="My profile picture">
        </div>
        <div class="profile">
            <h1 class="user-name">{{ $user->name }}</h1>
            @if ($user->bio)
                <p class="user-desc">{{ $user->bio }}</p>
            @endif
            <a class="user-social" target="_blank" href="https://{{ $user->social }}"><i class="fa-brands fa-github"></i> {{ $user->social }}</a>
        </div>
    </section>
    <section id="projects">
        <h2 class="title">Projects</h2>
        <div class="projects">
            @foreach ($userRepos as $repo)
                <div class="project">
                    <p class="project-desc"><a target="_blank" href="{{ $repo->html_url }}"><strong>{{ ucfirst(str_replace(["-", "_"], " ", $repo->name)) }}</strong>{{ $repo->description ? ": " . $repo->description : ""}}</a></p>
                </div>
            @endforeach
        </div>
    </section>
    <section id="about-me">
        <h2 class="title">About Me</h2>
        <p class="about-me-desc">{{ $user->about }}</p>
    </section>
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
            <button>Send</button>
        </form>
    </section>
    {{-- <footer>
        <div class="links">
            <a class="user-social" href="https://github.com/"><i class="fa-brands fa-github"></i> github.com</a>
            <a class="user-social" href="https://linkedin.com/"><i class="fa-brands fa-linkedin"></i> linkedin.com</a>
        </div>
    </footer> --}}
<script src="{{ asset('js/randomColors.js') }}"></script>
<script>
    function saveStyles(colors) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('portfolio.saveStyles') }}",
            type: "put",
            data: {colors: colors}
        });
    }
</script>
@if($styles)
<script>
    nav.style.background = "{{ $styles->nav }}";
    intro.style.background = "{{ $styles->intro }}";
    projects.style.background = "{{ $styles->projects }}";
    about.style.background = "{{ $styles->about }}";
    contact.style.background = "{{ $styles->contact }}";
</script>
@endif
<script>
    const tools = document.getElementById('tools');
    const toolbox = document.getElementById('toolbox');
    tools.onclick = () => {
        if(toolbox.style.display === 'none') {
            toolbox.style.display = 'block'; 
        } else {
            toolbox.style.display = 'none'; 
        }
    };
</script>
</body>
</html>