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

