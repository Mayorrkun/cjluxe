import PaystackPop from '@paystack/inline-js';

document.addEventListener('DOMContentLoaded', ()=> {
   if(window.location.pathname === '/checkout-page'){
       let state = document.getElementById('state');
       let fees  = document.getElementById('fees');
       let location = document.getElementById('location');

       const feesByState = {
           "Lagos":5000 ,
           "Ogun":5000,
           "Oyo":5000,
       }

       const delDiv = document.getElementById('del-fees');
       state.addEventListener('change', function (){
           console.log(state.value);
          const chosen = state.options[state.selectedIndex].text;
           if(chosen && chosen !== 'State'){
               delDiv.classList.remove('hidden');
               location.innerText = chosen;
               fees.innerText = feesByState[chosen];
           }
           else{
               delDiv.classList.add('hidden');
           }


       })

   }
});

document.addEventListener('DOMContentLoaded', (e) => {
    if(window.location.pathname === 'checkout/page'){

    }
    const popup = new PaystackPop();
    popup.resumeTransaction(access_code);
})
