let currentStep = 1;

function showStep(step) {
    document.querySelectorAll('.form-step').forEach((formStep) => {
        formStep.style.display = 'none';
    });

    let activeStep = document.getElementById(`step-${step}`);
    if (activeStep) {
        activeStep.style.display = 'block';
    }

    document.querySelectorAll('.step').forEach((stepElement) => {
        stepElement.classList.remove('step-active');
    });

    let currentStepElement = document.querySelector(`.step[data-step='${step}']`);
    if (currentStepElement) {
        currentStepElement.classList.add('step-active');
    }

    console.log(`Mostrando paso: ${step}`); // Debugging
}
// const toggleButton = document.getElementById('toggle-btn')
// const sidebar = document.getElementById('sidebar')

// function toggleSidebar() {
//     sidebar.classList.toggle('close')
//     sidebarToggleButton.classList.toggle('rotate')

//     closeAllSubMenus()
// }


function nextStep(step) {
    if (validateStep(currentStep)) {
        currentStep = step;
        showStep(currentStep);
    } else {
        alert('Por favor, completa todos los campos obligatorios antes de continuar.');
    }
}

function prevStep(step) {
    currentStep = step;
    showStep(currentStep);
}

function validateStep(step) {
    let valid = true;
    document.querySelectorAll(`#step-${step} input[required], #step-${step} select[required]`).forEach((input) => {
        if (!input.value.trim()) {
            valid = false;
            input.style.border = '2px solid red';
        } else {
            input.style.border = '2px solid var(--line-clr)';
        }
    });



    return valid;
}

document.getElementById('curp').addEventListener('input', function() {
    this.value = this.value.toUpperCase();
});
document.addEventListener("DOMContentLoaded", function() {
    let sidebar = document.getElementById("sidebar");
    let currentPage = window.location.pathname.split("/").pop();

    let formPages = ["registro_paciente.html"]; // Agrega aquí los nombres de las páginas donde quieres ocultarlo

    if (formPages.includes(currentPage)) {
        sidebar.classList.add("hidden-sidebar");
    }
});

// Función para alternar manualmente el sidebar
function toggleSidebar() {
    let sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("hidden-sidebar");
}


document.addEventListener('DOMContentLoaded', () => {
    showStep(currentStep);

    document.getElementById('patient-form').addEventListener('submit', (event) => {
        if (!validateStep(currentStep)) {
            event.preventDefault();
            alert('Por favor, completa todos los campos antes de enviar.');
        } else {
            alert('Registro exitoso');
        }
    });
});