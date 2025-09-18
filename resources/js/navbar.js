import {animate} from "animejs";
//desktop
document.addEventListener("DOMContentLoaded", () => {
    const path = window.location.pathname;

    function setActive(pathMatch, pathId){
        const pathName = document.getElementById(pathId);

        if(!pathName){
            return ;
        }
        if(pathMatch === "/" && path === "/"){
            pathName.classList.add('active-a');
        }
        else if(pathMatch !== "/" && path.startsWith(pathMatch)){

        pathName.classList.add('active-a');}
    }

    setActive('/', 'home');
    setActive('/categories', 'categories');
    setActive('/contact', 'contact');
})

document.addEventListener("DOMContentLoaded",function(){

    const profile = document.getElementById('profile-div');
    const profileBtn = document.getElementById('profile-btn');

    profileBtn.addEventListener('click',() => {

        profile.classList.toggle('hidden');
    })

});

document.addEventListener("DOMContentLoaded", () => {
    const cartBtn = document.getElementById("cart-btn");
    const cartSidebar = document.getElementById("cart-sidebar");
    const closeCart = document.getElementById("close-cart");
    const overlay = document.getElementById("cart-overlay");

    function openCart() {
        cartSidebar.classList.remove("translate-x-full");
        overlay.classList.remove("hidden");
    }

    function closeCartSidebar() {
        cartSidebar.classList.add("translate-x-full");
        overlay.classList.add("hidden");
    }

    cartBtn.addEventListener("click", openCart);
    closeCart.addEventListener("click", closeCartSidebar);
    overlay.addEventListener("click", closeCartSidebar);
});

//mobile!

document.addEventListener("DOMContentLoaded",()=> {
   const dropbtn = document.getElementById("dropdown-btn");
   const droplist = document.getElementById("droplist");
   const arrow = document.getElementById("arrow");

   dropbtn.addEventListener("click",() => {
       if(droplist.classList.contains("hidden")){
           droplist.classList.remove("hidden");
           animate(droplist, {
               translateY: {from: '-100', to: 0,},
               opacity:{from:0, to: 1},
               duration: 500,
               ease: 'inOutQuad'
           } );

           animate(arrow, {
              rotate: {from:0, to: 180},
           });
       }

       else{
           animate(droplist, {
               translateY: {from: 0, to: '-100',},
               opacity:{from:1, to: 0},
               duration: 500,
               ease: 'inOutQuad',
               onComplete: () => droplist.classList.add("hidden"),
           } );

           animate(arrow, {
               rotate: {from:180, to: 0},
           });
       }

   })
});
document.addEventListener("DOMContentLoaded",()=>{
   const cartBtn = document.getElementById('mobile-cart-btn');
    const mobileCart = document.getElementById("mobile-cart");
    const closeCartBtn = document.getElementById("close-mobile-cart");
    const overlay = document.getElementById("mobile-cart-overlay");

    function openCart(){
        mobileCart.classList.remove("translate-x-full");
        overlay.classList.remove("hidden");
    }

    function closeCart(){
        mobileCart.classList.add("translate-x-full");
        overlay.classList.add("hidden");
    }
    cartBtn.addEventListener("click", openCart);
    closeCartBtn.addEventListener("click", closeCart);

});

document.addEventListener("DOMContentLoaded", () => {
    const userBar = document.getElementById('userBar');
    const mobileProfileBtn = document.getElementById('mobile-profile-btn');

    mobileProfileBtn.addEventListener('click',function (){
        if(userBar.classList.contains('-translate-x-full')){
            animate(userBar, {
                translateX:{to:0},
                opacity:{from:0, to:1},
                duration:300,
                ease:'inOut'
            })
            userBar.classList.remove('-translate-x-full');
        }
        else{
            animate(userBar, {
                translateX:{to:'-100%'},
                opacity:{from:1, to:0},
                duration:300,
                ease:'inOut'
            })
            userBar.classList.add('-translate-x-full');
        }
    });
})
//scroll checks

