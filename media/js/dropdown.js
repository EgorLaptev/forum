'use strict';

const dropdown = document.querySelector('#dropdown-menu');

dropdown.addEventListener('input', function(evt) {
  window.location = this.value
});
