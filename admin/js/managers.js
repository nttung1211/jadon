import { getData, alterData } from '../../lib/js/functions.async.js';


/* managers.php */
const managerContainer = document.querySelector('#manager-container');

updateManagers();

managerContainer.addEventListener('click', async (e) => {
  if (e.target.matches('#deleteBtn')) {
    document.querySelector('#confirmDelete .btn-danger').addEventListener('click', async () => {
      await alterData('delete-manager.php', { id: e.target.dataset.id });
      await alterData('../lib/delete-file.php', { fileName: e.target.dataset.imgUrl });
      await updateManagers();
    }, { once: true });
  }
})

async function updateManagers() {
  managerContainer.innerHTML = '';
  const managers = await getData('get-managers.php');

  if (managers) {
    managers.forEach(man => {
      const html = `
        <li class="list-group-item p-4 mb-3 shadow-sm">
          <div class="media flex-column flex-sm-row">
            <div class="media-body order-2 order-sm-1">
              <h5 class="mt-0 mb-2 mt-4 mt-sm-0">${man['fullname']}<span class="badge badge-pill badge-success mx-2 font-weight-normal">${man['last_activity_time']}</span></h5>
              <p class="mb-1"><span class="text-secondary">Username: </span> ${man['username']}</p>
              <p class="mb-1"><span class="text-secondary">Email: </span><a href="mailto:${man['email']}">${man['email']}</a></p>
              <p class="mb-1 text-danger"><span class="text-secondary">Level: </span>${man['level']}</p>
              <div class="d-flex align-items-center mt-3">
                <button id="editBtn" data-id="${man['id']}" class="btn btn-primary mr-1 ">Edit</button>
                <button id="deleteBtn" data-id="${man['id']}" data-img-url="${man['img_url']}" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">Delete</button>
              </div>
            </div>
            <img src="${man['img_url']}" alt="Generic placeholder image" class="ml-lg-5 order-1 order-lg-2">
          </div>
        </li>
      `;

      managerContainer.innerHTML += html;
    });
  }
}


