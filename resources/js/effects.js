import {animate, stagger, text} from "animejs";
//show passwords
document.addEventListener('DOMContentLoaded', () => {
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

    const logo_chars = text.split('.logo', {words:false, chars:true});

    animate(logo_chars,{
        // Property keyframes
        y: [
            { to: '-10px', ease: 'outExpo', duration: 600 },
            { to: 0, ease: 'outBounce', duration: 800, delay: 100 }
        ],
        delay: stagger(50),
        ease: 'inOutCirc',
        loopDelay: 1000,
        loop: true

    });

})
