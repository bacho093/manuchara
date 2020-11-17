const navList = document.querySelector('.nav-list');
const burger = document.querySelector('.burger');
const socMedia = document.querySelector('.social-media');
const Uarea = document.querySelector('.user-area');
const closebtn = document.getElementById('closeuarea');

burger.addEventListener('click', function() {
    this.classList.toggle('toggle');
    navList.classList.toggle('active');
})

Uarea.addEventListener('click', function() {
    socMedia.classList.add('active');
});
closebtn.addEventListener('click', function() {
    socMedia.classList.remove('active');
});