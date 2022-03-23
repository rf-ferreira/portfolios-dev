function deleteProject(e) {
    const projects = e.parentNode.parentNode.parentNode;
    const deletedId = e.parentNode.parentNode.children[1].value;
    const deletedProject = document.createElement('input');

    e.parentNode.parentNode.remove();
    deletedProject.name = "deleted-projects[]";
    deletedProject.value = deletedId;
    deletedProject.hidden = true;
    projects.appendChild(deletedProject);
}