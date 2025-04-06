// scripts.js
function updateFileName(input) {
    const fileNameSpan = document.getElementById('file-name');
    if (input.files && input.files[0]) {
        fileNameSpan.textContent = input.files[0].name; // Mostrar el nombre del archivo seleccionado
    } else {
        fileNameSpan.textContent = "Ningún archivo seleccionado";
    }
}
