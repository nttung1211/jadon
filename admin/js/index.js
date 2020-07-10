import { 
  postMultipleFiles,
  getData, 
  alterData
} from '../../lib/js/functions.async.js';


const imageContainer = document.querySelector('#image-container');
const uploadInput = document.querySelector('#upload');

/* INITIAL RENDERING */
updateSlideshowImages();

/* UPLOAD IMAGES */
uploadInput.addEventListener("input", async () => {
  await postMultipleFiles('upload-home-slideshow-images.php', uploadInput.files, 'upload[]');
  await updateSlideshowImages();
});

/* DELETE IMAGES IN DATABASE AND FOLDER */
imageContainer.addEventListener('click', async (e) => {
  if (e.target.matches('.fa-trash-alt')) {
    $(e.target).tooltip('hide');

    document.querySelector('#confirmDelete .btn-danger').addEventListener('click', async () => {
      await alterData('../lib/delete-file.php', { fileName: e.target.dataset.imgUrl })
      await alterData('delete-home-slideshow-images.php', { id: `${e.target.id}` });
      await updateSlideshowImages();
    }, { once: true });
  }
});

/* FUNCTIONS */
async function updateSlideshowImages() {
  imageContainer.innerHTML = '';
  const images = await getData('../get-home-slideshow-images.php');

  if (images) {
    images.forEach(img => {
      const html = `
        <div class="col-lg-4 col-sm-6 p-1">
          <div class="hover hover-2 text-white">
            <img class="shadow-sm" src="${img['img_url']}" alt="picture">
            <div class="hover-overlay"></div>
            <div class="hover-content">
              <span class="d-inline-block" data-toggle="tooltip" title="Delete"><i id="${img['id']}" data-img-url="${img['img_url']}" class="fas fa-trash-alt" data-toggle="modal" data-target="#confirmDelete"></i></span>
            </div>
          </div>
        </div>
      `;

      imageContainer.innerHTML += html;
    });
  }
}
