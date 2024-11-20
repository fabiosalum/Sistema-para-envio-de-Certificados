import './bootstrap';
import Inputmask from 'inputmask';
document.addEventListener("DOMContentLoaded", function(){
    var phoneMask = new Inputmask("(99) 99999-9999")
    phoneMask.mask(document.querySelector(".phone"));
})

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
