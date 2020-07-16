import { displayUploadedImages } from '../../lib/js/functions.js';
import { ManagerValidator } from '../../lib/js/validator.class.js';


const uploadBtn = document.querySelector('#upload');
const imgContainer = document.querySelector('.image-area');

uploadBtn.addEventListener('input', () => {
  displayUploadedImages(uploadBtn.files, imgContainer, 'img-fluid rounded shadow-sm mx-auto d-block');
})

const inputs = document.querySelectorAll('.live-validate');
inputs.forEach(inp => {
  inp.addEventListener('input', () => {
    const validator = new ManagerValidator(inp)
    const error = validator.validate();
    const errorBox = document.querySelector(`#${inp.id}-error`);

    if (error) {
      errorBox.innerHTML = `<div class='alert alert-danger' role='alert'><strong>${error}</strong></div>`;
      inp.classList.add('border-danger');
      inp.classList.remove('border-success');
    } else {
      errorBox.innerHTML = '';
      inp.classList.add('border-success');
      inp.classList.remove('border-danger');
    }
  })
})