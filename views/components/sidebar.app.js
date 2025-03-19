const toggleButton = document.getElementById('toggle-btn')
const sidebar = document.getElementById('sidebar')

function toggleSidebar() {
    sidebar.classList.toggle('close')
    toggleButton.classList.toggle('rotate')

}
document.addEventListener("DOMContentLoaded", function() {
    const currentLocation = window.location.pathname.split("/").pop(); // Obtiene el nombre del archivo actual
    const menuItems = document.querySelectorAll("#sidebar ul li a"); // Selecciona todos los enlaces del sidebar

    menuItems.forEach((item) => {
        const itemPath = item.getAttribute("href").split("/").pop(); // Obtiene solo el nombre del archivo del enlace

        if (itemPath === currentLocation) {
            item.parentElement.classList.add("active"); // Agrega la clase active al <li>
        } else {
            item.parentElement.classList.remove("active"); // Elimina la clase si no coincide
        }
    });
});