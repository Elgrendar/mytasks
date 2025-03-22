function confirmDeleteDesktop(desktopName) {
    return confirm(`¿Estás seguro de que deseas eliminar el escritorio ${desktopName}? Esta acción no se puede deshacer.`);
}


// Hacer las funciónes accesible globalmente
window.confirmDeleteDesktop = confirmDeleteDesktop;
