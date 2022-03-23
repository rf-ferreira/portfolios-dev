const randomBtn = document.getElementById('randomBtn');
const nav = document.getElementsByTagName('nav')[0];
const intro = document.getElementById('intro'); 
const projects = document.getElementById('projects');
const about = document.getElementById('about-me');
const contact = document.getElementById('contact');
randomBtn.onclick = () => {
    const colors = {
        nav: "#" + Math.floor(Math.random()*16777215).toString(16),
        intro: "#" + Math.floor(Math.random()*16777215).toString(16),
        projects: "#" + Math.floor(Math.random()*16777215).toString(16),
        about: "#" + Math.floor(Math.random()*16777215).toString(16),
        contact: "#" + Math.floor(Math.random()*16777215).toString(16)
    };

    nav.style.background = colors.nav
    intro.style.background = colors.intro
    projects.style.background = colors.projects
    about.style.background = colors.about
    contact.style.background = colors.contact

    saveStyles(JSON.stringify(colors));
}