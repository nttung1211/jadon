import { postMultipleFiles, getData, alterData } from '../../lib/js/functions.async.js';


const imageContainer = document.querySelector('.image-container');
const uploadInput = document.querySelector('#upload');

window.addEventListener('load', () => {
  updateSlideshowImages();
});

uploadInput.addEventListener("input", async () => {
  await postMultipleFiles('upload-home-slideshow-images.php', uploadInput.files, 'upload[]');
  await updateSlideshowImages();
});

imageContainer.addEventListener('click', async (e) => {
  if (e.target.matches('.fa-trash-alt')) {
    console.log(e.target.id);
    await alterData('delete-home-slideshow-images.php', { id: `${e.target.id}` });
    await updateSlideshowImages();
  }
})

async function updateSlideshowImages() {
  imageContainer.innerHTML = '';
  const images = await getData('../get-home-slideshow-images.php');

  if (images !== '0') {
    images.forEach(img => {
      const html = `
        <div class='col-lg-4 col-md-6 image-wrapper'>
          <img src=${img['img_url']} class='img-fluid'>   
          <div class='image-overlay'><i id=${img['id']} class='fas fa-trash-alt'></i></div>      
        </div>
      `;
      imageContainer.insertAdjacentHTML('beforeend', html);
    });
  } else {
    console.log('no image found')
  }
}



