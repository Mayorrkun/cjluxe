import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import {animate} from "animejs";

document.addEventListener('DOMContentLoaded', () => {
 if(window.location.pathname === '/'){

     const swiper = new Swiper('.swiper', {
         direction: 'horizontal',
         loop: false,
         slidesPerView: 1,
         speed: 500,

         pagination: {
             el: '.swiper-pagination',
         },

         navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
         },
         on:{
             slideChangeTransitionStart(){
                 const activeSlide = swiper.slides[swiper.activeIndex];

                 activeSlide.querySelectorAll(".fade-in").forEach((el) => {
                     el.style.opacity = 0;
                 });
                 animate(activeSlide.querySelectorAll('.fade-in'), {
                     opacity: {from:0,  to: 1, duration: 700 },       // fade in
                     translateY: { from: 100, to: 0 },
                     duration: 600,
                     delay:500,
                     ease: 'inOut'

                 })
             }
         }
     })

 }
})
