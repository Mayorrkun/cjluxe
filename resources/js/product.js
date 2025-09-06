document.addEventListener('DOMContentLoaded', ()=>{

    if(window.location.pathname.startsWith('/product')){
        const add = document.getElementById('add-quan');
        const sub = document.getElementById('sub-quan');

        const quantity = document.getElementById('quan');



        add.addEventListener('click', function () {
            let val = parseInt(quantity.value);
            quantity.value = val + 1 ;
        });
        sub.addEventListener('click', function (){
            let val = parseInt(quantity.value);
            quantity.value = val - 1 ;
        });
    }
})
