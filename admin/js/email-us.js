import { fetchData } from '../../lib/js/functions.async.js';


window.addEventListener('load', async () => {
  await renderItems();
  $('#table').DataTable({
    "lengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]]
  });
})

const itemContainer = document.querySelector('#item-container');

itemContainer.addEventListener('click', (e) => {
  if (e.target.matches('#deleteBtn')) {
    document.querySelector('#confirmDelete .btn-danger').addEventListener('click', async () => {
      await fetchData('cms.delete-data.php', { id: e.target.dataset.id, table: 'clients' });
      e.target.parentNode.parentNode.remove();
    }, { once: true });
  }
})

async function renderItems() {
  itemContainer.innerHTML = '';
  const response = await fetchData('cms.get-data.php', { table: 'clients' });
  const items = response.rows;
  
  if (items) {
    items.forEach(item => {
      const shortEventDate = getShortDate(item.event_date);
      const shortSubmitDate = getShortDate(item.submitted_at);
      // const shortTitle = item.title.length > 20 ? item.title.slice(0, 18) + "..." : item.title;

      const html = `
        <tr>
          <td>${item.firstname}</td>
          <td>${item.lastname}</td>
          <td>${item.phone}</td>
          <td>${item.email}</td>
          <td>${item.service_id}</td>
          <td>${shortEventDate}</td>
          <td>${item.event_location}</td>
          <td>${shortSubmitDate}</td>
          <td>
            <a class="btn btn-primary" href="services.edit.php?id=${item.id}">Done</a>
            <a id="deleteBtn" class="btn btn-danger text-white" data-id="${item.id}" data-toggle="modal" data-target="#confirmDelete">Delete</a>
          </td>
        </tr>
      `;

      itemContainer.innerHTML += html;
    });
  }
}


function getShortDate(str) {
  const date = new Date(str);
  const year = date.getFullYear();
  const month = date.getMonth() + 1;
  const day = date.getDate();

  return `${day}-${month}-${year}`;
}


