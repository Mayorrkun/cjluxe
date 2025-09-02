import {animate, stagger, createTimeline, text} from "animejs";
//show passwords
document.addEventListener('DOMContentLoaded', () => {
    if(window.location.pathname === '/login-page') {
        const showPassword = document.getElementById('ShowPassword');
        const inner = showPassword.querySelector('span');
        const eye = document.getElementById('eye');
        showPassword.addEventListener('click', function () {
            const passwordInput = document.getElementById('passwordInput');
            if(passwordInput.type === 'password'){
                passwordInput.type = 'text';
                inner.innerText = "Hide Password";
                eye.classList.remove('fa-eye');
                eye.classList.add('fa-eye-slash');

            }
            else{
                passwordInput.type = 'password';
                inner.innerText = "Show Password";
                eye.classList.add('fa-eye');
                eye.classList.remove('fa-eye-slash');

            }
        })

    }

})



//logo animation
document.addEventListener('DOMContentLoaded', () => {
    animate('.fade-in', {
        opacity: {from:0 , to: 1 },       // fade in
        translateY: { from: 100, to: 0 },
        duration: 600,
        delay:500,
        ease: 'inOut',

    });

});

document.addEventListener('DOMContentLoaded', () => {
    const {chars} = text.split('.logo',{chars:true, words:false});

    animate(chars, {
        translateY:[
            {from:0, to:'-10px', duration:300},{to: 0, from: '-10px', duration:300}],
        delay:stagger(200),
        direction: 'alternate',
        loop:true,
        loopDelay:2000,
        ease: 'easeInOut',
        speed: 10000,

    })
});
