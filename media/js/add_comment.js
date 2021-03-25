'use strict';

const form  = document.querySelector('#add_comment_form'),
      error = document.querySelector('.error'),
      content = document.querySelector('#content');

form.addEventListener('submit', evt => {

  evt.preventDefault();

  const request = fetch('../core/add_comment.php', {
    method: 'POST',
    body: new FormData(form)
  });

  request
    .then(resp => resp.text())
    .then(text => {
      update();
      content.value = null;
      error.textContent = text;
    });



});
