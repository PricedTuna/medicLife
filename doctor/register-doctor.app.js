const fileInput = document.getElementById('photo');
  const fileNameDisplay = document.getElementById('file-name');

  fileInput.addEventListener('change', (event) => {
    const fileName = event.target.files.length > 0 ? event.target.files[0].name : 'Ningún archivo seleccionado';
    fileNameDisplay.textContent = fileName;
  });
