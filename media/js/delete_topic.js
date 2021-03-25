'use strict';

const deleteTopic = document.querySelector('#delete_topic');

if(deleteTopic)
  deleteTopic.addEventListener('click', evt => {

      let data = new FormData();
      data.set('id', deleteTopic.dataset.id);

      const request = fetch('http://forum/core/delete_topic.php', {
        method: 'POST',
        body: data
      });

      request
        .then(resp => resp.text())
        .then(text => {
          deleteTopic.parentNode.remove();
        });

  });
