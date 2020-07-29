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
      if (e.target.dataset.imgUrl && e.target.dataset.imgUrl !== 'null') {
        await fetchData('../lib/delete-file.php', { fileName: e.target.dataset.imgUrl })
      }
      await fetchData('cms.delete-data.php', { id: e.target.dataset.id, table: 'events' });
      e.target.parentNode.parentNode.remove();
    }, { once: true });
  }
})

async function renderItems() {
  itemContainer.innerHTML = '';
  
  const event_response = await fetchData('cms.get-data.php', { table: 'events' });
  
  const items = event_response.rows;
  
  if (items) {
    await Promise.all(items.map(async item => {
      const shortTitle = item.title.length > 20 ? item.title.slice(0, 18) + "..." : item.title;

      const [likes, comments, images] = await Promise.all(['event_likes', 'event_comments', 'event_images'].map(async table => {
        const response = await fetchData('cms.get-data.php', { 
          query: `SELECT COUNT(*) as amount FROM ${table} WHERE event_id =?;`,
          params: JSON.stringify([item.id])
        });

        return response.rows[0].amount;
      }));
      
      const html = `
        <tr>
          <td>
            <img src="${item.img_url ? item.img_url : '../img/svg/default-image.png'}" alt="Image">
          </td>
          <td>${shortTitle}</td>
          <td class='date'>${item.event_date}</td>
          <td class='text-right'>${likes}<a class="btn btn-primary ml-2" href="our-work.likes.php?id=${item.id}">See</a></td>
          <td class='text-right'>${comments}<a class="btn btn-primary ml-2" href="our-work.comments.php?id=${item.id}">See</a></td>
          <td class='text-right'>${images}<a class="btn btn-primary ml-2" href="our-work.images.php?id=${item.id}">See</a></td>
          <td>
            <a class="btn btn-primary" href="our-work.edit.php?id=${item.id}">Edit</a>
            <a id="deleteBtn" class="btn btn-danger text-white" data-id="${item.id}" data-img-url="${item.img_url}" data-toggle="modal" data-target="#confirmDelete">Delete</a>
          </td>
        </tr>
      `;

      itemContainer.innerHTML += html;
    }));
  }
}



