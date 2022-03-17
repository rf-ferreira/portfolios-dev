<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@auth {{ $name }} Portfolio @else Portfolio @endauth</title>
</head>
<body>
    <nav>
        <a href="#projects">Projects</a>
        <a href="#about-me">About me</a>
        <a href="#contact">Contact</a>
    </nav>
    <section id="intro">
        <div class="user-pic">
            <img src="" alt="">
        </div>
        <div class="profile">
            <h1 class="user-name">User name</h1>
            <p class="user-desc">This is a description.</p>
            <a class="user-social" href="https://github.com/"><i class="fa-brands fa-github"></i> github.com</a>
        </div>
    </section>
    <section id="projects">
        <h2 class="title">Projects</h2>
        <div class="projects">
            <div class="project">
                <p class="project-desc"><a href="#">This is a project description</a></p>
            </div>
            <div class="project">
                <p class="project-desc"><a href="#">This is a project description</a></p>
            </div>
            <div class="project">
                <p class="project-desc"><a href="#">This is a project description</a></p>
            </div>
            <div class="project">
                <p class="project-desc"><a href="#">This is a project description</a></p>
            </div>
            <div class="project">
                <p class="project-desc"><a href="#">This is a project description</a></p>
            </div>
            <div class="project">
                <p class="project-desc"><a href="#">This is a project description</a></p>
            </div>
        </div>
    </section>
    <section id="about-me">
        <h2 class="title">About Me</h2>
        <p class="about-me-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum natus quasi delectus sit nesciunt animi eum aspernatur fugit. Corrupti dolore ipsum saepe nihil officia unde voluptatum quam totam voluptatibus, minima quis consequatur labore, minus, asperiores ipsam veritatis sit eaque. Incidunt voluptatibus, iste eveniet aperiam, atque, nulla repellat necessitatibus quae possimus rerum itaque fugit quis aspernatur temporibus labore dolorem sapiente vitae exercitationem veniam blanditiis mollitia praesentium provident? Sed dolores repellendus cumque tempore doloremque repudiandae veritatis quis obcaecati illum error id excepturi tenetur blanditiis eius, unde accusamus! Vitae facilis facere aliquid, iure laborum consequuntur sed id, non veniam consectetur exercitationem provident voluptatibus!</p>
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
</body>
</html>