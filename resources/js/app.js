import './bootstrap';
import 'flowbite';

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
