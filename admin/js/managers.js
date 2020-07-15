import { getData, alterData } from '../../lib/js/functions.async.js';


/* managers.php */
const managerContainer = document.querySelector('#manager-container');

window.addEventListener('load', async () => {
  await renderManagers();
  $('#managersTable').DataTable({
    "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]]
  });
})

managerContainer.addEventListener('click',  (e) => {
  if (e.target.matches('#deleteBtn')) {
    document.querySelector('#confirmDelete .btn-danger').addEventListener('click', async () => {
      await alterData('managers.delete.php', { id: e.target.dataset.id });
      await alterData('../lib/delete-file.php', { fileName: e.target.dataset.imgUrl });
      e.target.parentNode.parentNode.remove();
    }, { once: true });
  }
})

async function renderManagers() {
  managerContainer.innerHTML = '';
  const response = await getData('managers.get.php');
  const managers = response.managers;
  const currentManagerLevel = response.currentManagerLevel;

  if (managers) {
    managers.forEach(man => {
      let btns = `
        <a href="managers.edit.php?id=${man.id}" class="btn btn-primary">Edit</a>
        <button id="deleteBtn" data-id="${man.id}" data-img-url="${man.img_url}" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">Delete</button>
      `;

      switch (currentManagerLevel) {
        case 'super-admin':
          if (man.level === 'super-admin') {
            btns = `
            <a href="managers.edit.php?id=${man.id}" id="editBtn" class="btn btn-primary mr-1 ">Edit</a>
          `;
          }
          break;

        case 'admin':
          if (['super-admin', 'admin'].includes(man.level)) {
            btns = '';
          }
          break;

        case 'manager':
          btns = '';
          break;
      }
      
      const status = Date.now() - Date.parse(man.last_activity_time) > 2 * 60000 ? 'offline' : 'online';
      const shortEmail = man.email.slice(0, man.email.indexOf('@') + 1) + '...';
      const html = `
        <tr>
          <td><img src="${man.img_url ? man.img_url : '../img/svg/default-user.svg'}" alt="Image"></td>
          <td>${man.fullname}</td>
          <td>${man.username}</td>
          <td><a href="mailto:${man.email}" title="${man.email}" data-toggle="tooltip">${shortEmail}</a></td>
          <td class="text-${man.level === 'super-admin' ? 'danger' : man.level === 'admin' ? 'warning' : 'info'}">${man.level}</td>
          <td class="text-${status === 'online' ? 'success' : 'secondary'}">${status}</td>
          <td>${btns}</td>
        </tr>
      `;

      managerContainer.innerHTML += html;
    });
  }
}


