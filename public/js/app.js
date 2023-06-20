import './bootstrap';
import 'flowbite';

// import Tagify from '@yaireo/tagify';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//dashboard - greetings
let greetings = document.getElementById('greetings');

let timeNow = new Date().getHours();

let greet = timeNow >= 5 && timeNow < 12 ? "Good Morning!"
    : timeNow >= 12 && timeNow < 18 ? "Good Afteroon!"
        : "Good Evening!";

greetings.innerHTML = greet;


// Tagify - Js
var inputElement = document.querySelector('input[name="regions_of_company"]');
new Tagify(inputElement);
