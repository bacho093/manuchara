const burger = document.querySelector('.burger');
const pronav = document.querySelector('.profile-navigation');

burger.addEventListener('click', function() {
    burger.classList.toggle("toggle");
    pronav.classList.toggle("toggle");
});