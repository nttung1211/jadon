import { getData, alterData } from '../../lib/js/functions.async.js';


/* managers.php */
const managerContainer = document.querySelector('#manager-container');

updateManagers();

managerContainer.addEventListener('click', async (e) => {
  if (e.target.matches('#deleteBtn')) {
    document.querySelector('#confirmDelete .btn-danger').addEventListener('click', async () => {
      await alterData('managers.delete.php', { id: e.target.dataset.id });
      await alterData('../lib/delete-file.php', { fileName: e.target.dataset.imgUrl });
      await updateManagers();
    }, { once: true });
  }
})

async function updateManagers() {
  managerContainer.innerHTML = '';
  const response = await getData('managers.get.php');
  const managers = response.managers;
  const currentManagerLevel = response.currentManagerLevel;

  if (managers) {
    managers.forEach(man => {
      let btns = `
        <a href="managers.edit.php?id=${man['id']}" id="editBtn" class="btn btn-primary mr-1 ">Edit</a>
        <button id="deleteBtn" data-id="${man['id']}" data-img-url="${man['img_url']}" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">Delete</button>
      `;

      switch (currentManagerLevel) {
        case 'super-admin':
          if (man['level'] === 'super-admin') {
            btns = `
            <a href="managers.edit.php?id=${man['id']}" id="editBtn" class="btn btn-primary mr-1 ">Edit</a>
          `;
          }
          break;

        case 'admin':
          if (['super-admin', 'admin'].includes(man['level'])) {
            btns = '';
          }
          break;

        case 'manager':
          btns = '';
          break;
      }
      
      const status = Date.now() - Date.parse(man['last_activity_time']) > 2 * 60000 ? 'offline' : 'online';
      const html = `
        <li class="list-group-item p-4 mb-3 shadow-sm">
          <div class="media flex-column flex-sm-row">
            <div class="media-body order-2 order-sm-1">
              <h5 class="mt-0 mb-2 mt-4 mt-sm-0">${man['fullname']}<span class="badge badge-pill badge-${status === 'online' ? 'success' : 'secondary'} mx-2 font-weight-normal">${status}</span></h5>
              <p class="mb-1"><span class="text-secondary">Username: </span> ${man['username']}</p>
              <p class="mb-1"><span class="text-secondary">Email: </span><a href="mailto:${man['email']}">${man['email']}</a></p>
              <p class="mb-1 text-${man['level'] === 'super-admin' ? 'danger' : man['level'] === 'admin' ? 'warning' : 'info'}"><span class="text-secondary">Level: </span>${man['level']}</p>
              <div class="d-flex align-items-center mt-3">
                ${btns}
              </div>
            </div>
            <img src="${man['img_url'] ? man['img_url'] : '../img/svg/default-user.svg'}" alt="Generic placeholder image" class="ml-lg-5 order-1 order-lg-2">
          </div>
        </li>
      `;

      managerContainer.innerHTML += html;
    });
  }
}


