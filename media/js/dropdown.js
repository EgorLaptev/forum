'use strict';

const dropdown = document.querySelector('#dropdown-menu');

if(dropdown) {

  dropdown.addEventListener('input', function(evt) {
    window.location = this.value
  });

}
