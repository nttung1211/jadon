import {
  getData,
  alterData
} from '../../lib/js/functions.async.js';


window.addEventListener('load', async () => {
  await renderImages();
  // $('#slideshowTable').DataTable();
  $('#slideshowTable').DataTable({
    "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]] //* just one time
  });
})
// https://datatables.net/examples/advanced_init/length_menu.html

const imageContainer = document.querySelector('#image-container');

imageContainer.addEventListener('click', (e) => {
  if (e.target.matches('#deleteBtn')) {
    document.querySelector('#confirmDelete .btn-danger').addEventListener('click', async () => {
      await alterData('../lib/delete-file.php', { fileName: e.target.dataset.imgUrl })
      await alterData('home.slideshow.delete.php', { id: `${e.target.dataset.id}` });
      e.target.parentNode.parentNode.remove();
    }, { once: true });
  }
})

async function renderImages() {
  imageContainer.innerHTML = '';
  const images = await getData('../home.slideshow.get.php');

  if (images) {
    images.forEach(img => {
      const shortTitle = img.title.length > 20 ? img.title.slice(0, 18) + "..." : img.title;
      const shortCaption = img.caption.length > 20 ? img.caption.slice(0, 18) + "..." : img.caption;
      const html = `
        <tr>
          <td>
            <img src="${img.img_url}" alt="Image">
          </td>
          <td>${shortTitle}</td>
          <td>${shortCaption}</td>
          <td>${img.img_order}</td>
          <td>
            <a class="btn btn-primary" href="home.slideshow.edit.php?id=${img.id}">Edit</a>
            <a id="deleteBtn" class="btn btn-danger text-white" data-id="${img.id}" data-img-url="${img.img_url}" data-toggle="modal" data-target="#confirmDelete">Delete</a>
          </td>
        </tr>
      `;

      imageContainer.innerHTML += html;
    });
  }
}



/* INITIAL RENDERING */
// updateSlideshowImages();

/* UPLOAD IMAGES */
// uploadInput.addEventListener("input", async () => {
//   await postMultipleFiles('home.slideshow.upload.php', uploadInput.files, 'upload[]');
//   await updateSlideshowImages();
// });

/* DELETE IMAGES IN DATABASE AND FOLDER */
// imageContainer.addEventListener('click', async (e) => {
//   if (e.target.matches('.fa-trash-alt')) {
//     $(e.target).tooltip('hide');

//     document.querySelector('#confirmDelete .btn-danger').addEventListener('click', async () => {
//       await alterData('../lib/delete-file.php', { fileName: e.target.dataset.imgUrl })
//       await alterData('home.slideshow.delete.php', { id: `${e.target.id}` });
//       await updateSlideshowImages();
//     }, { once: true });
//   }
// });

/* FUNCTIONS */
// async function updateSlideshowImages() {
//   imageContainer.innerHTML = '';
//   const images = await getData('../get-home-slideshow-images.php');

//   if (images) {
//     images.forEach(img => {
//       const html = `
//         <div class="col-lg-4 col-sm-6 p-1">
//           <div class="hover hover-2 text-white">
//             <img class="shadow-sm" src="${img['img_url']}" alt="picture">
//             <div class="hover-overlay"></div>
//             <div class="hover-content">
//               <span class="d-inline-block" data-toggle="tooltip" title="Delete"><i id="${img['id']}" data-img-url="${img['img_url']}" class="fas fa-trash-alt" data-toggle="modal" data-target="#confirmDelete"></i></span>
//             </div>
//           </div>
//         </div>
//       `;

//       imageContainer.innerHTML += html;
//     });
//   }
// }
