import {animate} from "animejs";
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname.startsWith('/admin')) {
        const productsBtn = document.getElementById('products-btn');
        const productDrop = document.getElementById('product-dropdown');
        const icon = document.getElementById('drop-i-admin');

        productsBtn.addEventListener('click', () => {
            if (productDrop.style.maxHeight && productDrop.style.maxHeight !== '0px') {
                // collapse
                productDrop.style.maxHeight = '0px';
                animate(icon, {
                    rotate:{from:180,to:0},
                    duration:300
                })
            } else {
                // expand
                productDrop.style.maxHeight = productDrop.scrollHeight + 'px';
                animate(icon, {
                    rotate:{from:0, to:180},
                    duration:300
                })
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    if(window.location.pathname.startsWith('/admin')){
        const ItemSwiper = new Swiper('.swiper-OrderItems',{
            loop: false,
            allowTouchMove: true,
            slidesPerView:2,


        })
    }
});
