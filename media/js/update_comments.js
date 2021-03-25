'use strict';

let comments = document.querySelector('.comments-list'),
    id       = document.querySelector("input[name='id']");

if(id) id = id.value;

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

        comment.append(author, content, date);
        comments.append(comment);

      });
    })
}
