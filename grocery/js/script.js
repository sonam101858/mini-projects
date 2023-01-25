let searchform = document.querySelector('.search-form');
document.querySelector('#search-btn').onclick = () =>
{
    searchform.classList.toggle('active');
    search_cart.classList.remove('active');
    search_login.classList.remove('active');
    search_toogle.classList.remove('active');
}

let search_cart = document.querySelector('.shopping-cart');
document.querySelector('#cart-btn').onclick = () =>
{
    search_cart.classList.toggle('active');
    searchform.classList.remove('active');
    search_login.classList.remove('active');
    search_toogle.classList.remove('active');
}

let search_login= document.querySelector('.login-form');
document.querySelector('#login-btn').onclick = () =>
{
    search_login.classList.toggle('active');
    searchform.classList.remove('active');
    search_cart.classList.remove('active');
    search_toogle.classList.remove('active');
}

let search_toogle= document.querySelector('.navbar');
document.querySelector('#menu-btn').onclick = () =>
{
    search_toogle.classList.toggle('active');
    searchform.classList.remove('active');
    search_cart.classList.remove('active');
    search_login.classList.remove('active');
}

window.onscroll = () =>
{
    searchform.classList.remove('active');
    search_cart.classList.remove('active');
    search_login.classList.remove('active');
    search_toogle.classList.remove('active');
}

