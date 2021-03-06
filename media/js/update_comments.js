'use strict';

let comments = document.querySelector('.comments-list'),
    id       = document.querySelector("input[name='id']").value,
    login    = document.querySelector("input[name='login']").value;

update();

setInterval(update, 5000); // update comments every 5 seconds

function update() {

  let data = new FormData();
  data.set('id', id);

  const request = fetch(`../core/get_comments.php`, {
    method: 'POST',
    body: data
  });

  request
    .then(resp => resp.json())
    .then(json => {
      comments.innerHTML = '';

      json.forEach(comm => {

        let comment = document.createElement('li');
        comment.classList.add('comment');

        let author = document.createElement('span');
        author.classList.add('comment-author');
        author.textContent = comm['author'];

        let content = document.createElement('p');
        content.classList.add('comment-content');
        content.textContent = comm['content'];

        let date = document.createElement('time');
        date.classList.add('comment-date');
        date.setAttribute('datetime', comm['date'])
        date.textContent = comm['date'];

        let buttonDelete = document.createElement('a');

        if(login == comm['author'] || login == 'admin') {
          buttonDelete.classList.add('comment-delete');
          buttonDelete.id = 'delete_comment';
          buttonDelete.setAttribute('href', `../core/delete_comment.php?id=${comm['id']}`);
          buttonDelete.textContent = 'Delete';
        }

        comment.append(author, content, date, buttonDelete);

        comments.append(comment);

      });
    })
}
