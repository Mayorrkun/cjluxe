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
})
