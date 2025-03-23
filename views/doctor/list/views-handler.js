document.addEventListener("DOMContentLoaded", function() {
    const contentDiv = document.getElementById("dynamic-content");

    if (!contentDiv) {
        console.error("Error: No se encontró el elemento #dynamic-content.");
        return;
    }

    function loadView(view) {
        fetch(view)
            .then(response => response.ok ? response.text() : Promise.reject("Error al cargar la vista"))
            .then(html => contentDiv.innerHTML = html)
            .catch(error => {
                console.error(error);
                contentDiv.innerHTML = "<p style='color: red;'>Error al cargar la vista.</p>";
            });
    }

    document.getElementById("listar-btn").addEventListener("click", () => loadView("/medicLife/views/doctor/list/list-doctors.view.php"));
    document.getElementById("crear-btn").addEventListener("click", () => loadView("/medicLife/views/doctor/register/register-doctor.view.php"));

    // Cargar la vista predeterminada al iniciar
    loadView("/medicLife/views/doctor/list/list-doctors.view.php");
});