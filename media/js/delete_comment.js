'use strict';

const deleteComment = document.querySelector('#delete_comment');

if(deleteComment)
  deleteComment.addEventListener('click', evt => {

      let data = new FormData();
      data.set('id', deleteComment.dataset.id);

      const request = fetch('http://forum/core/delete_comment.php', {
        method: 'POST',
        body: data
      });

      request
        .then(resp => resp.text())
        .then(text => {
          deleteComment.parentNode.remove();
        });

  });
