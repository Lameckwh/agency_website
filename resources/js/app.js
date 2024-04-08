import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';
import {
    Carousel,
    initTE,
  } from "tw-elements";
  
  initTE({ Carousel });

window.Alpine = Alpine;

Alpine.start();
