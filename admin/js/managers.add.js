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

const passwordInput = document.querySelector('#password');
const confirmPasswordInput = document.querySelector('#confirmPassword');

[passwordInput, confirmPasswordInput].forEach(inp => {
  inp.addEventListener('input', () => {
    console.log('tung');
    const errorBox = document.querySelector(`#${confirmPasswordInput.id}-error`);
  
    if (confirmPasswordInput.value !== passwordInput.value) {
      errorBox.innerHTML = `<div class='alert alert-danger' role='alert'><strong>Confirm password does not match</strong></div>`;
      confirmPasswordInput.classList.add('border-danger');
      confirmPasswordInput.classList.remove('border-success');
    } else {
      errorBox.innerHTML = '';
      confirmPasswordInput.classList.add('border-success');
      confirmPasswordInput.classList.remove('border-danger');
    }
  })
})
