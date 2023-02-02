//Animacion del navbar con scroll 
const nav = document.querySelector(".nav");
window.addEventListener("scroll", function(){
    nav.classList.toggle("active", window.scrollY > 0 );
})
//Animacion del navbar lateral con scroll tamaño celulares
const container = document.querySelector(".menu-lateral");
window.addEventListener("scroll", function(){
    container.classList.toggle("activo", window.scrollY > 0 );
})
//Dinamismo en el navbar
let menu = document.querySelector(".menu");
btn.addEventListener("click",function(){
    menu.classList.toggle("activar");
})