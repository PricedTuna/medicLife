let currentStep = 1;

function showStep(step) {
    document.querySelectorAll('.form-step').forEach((formStep) => {
        formStep.style.display = 'none';
    });
    document.getElementById(`step-${step}`).style.display = 'block';

    document.querySelectorAll('.step').forEach((stepElement) => {
        stepElement.classList.remove('step-active');
    });
    document.querySelector(`.step[data-step='${step}']`).classList.add('step-active');
}

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

    if (step === 3) {
        let fileInput = document.getElementById('photo');
        if (!fileInput.files.length) {
            valid = false;
            fileInput.style.border = '2px solid red';
        } else {
            fileInput.style.border = '2px solid var(--line-clr)';
        }
    }

    return valid;
}

document.addEventListener('DOMContentLoaded', () => {
    showStep(currentStep);

    document.getElementById('doctor-form').addEventListener('submit', (event) => {
        if (!validateStep(currentStep)) {
            event.preventDefault();
            alert('Por favor, completa todos los campos antes de enviar.');
        } else {
            alert('Registro exitoso');
        }
    });
});