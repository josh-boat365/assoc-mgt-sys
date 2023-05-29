import './bootstrap';
import Alpine from 'alpinejs';

import { Datepicker, Input, initTE } from "tw-elements";
initTE({ Datepicker, Input });

const myInput = new Input(document.getElementById("myDatepicker"));
const options = {
  format: "dd-mm-yyyy",
};
const myDatepicker = new Datepicker(
  document.getElementById("myDatepicker"),
  options
);


window.Alpine = Alpine;

Alpine.start();
