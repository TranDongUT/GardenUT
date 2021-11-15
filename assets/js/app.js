
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const header = $('#header');
const items = $$('.arrival-item');
const modalDetailItem = $('.modal-detail')


/* Scroll header */
document.onscroll = function(){
    if(window.scrollY >= 200){
        header.style.backgroundColor = 'black';
    }
    else{
        header.style.backgroundColor = '';
    }
}


/* Mobile menu */
const menuBtns = $$('.menu-btn');
const navMobile = $('.nav');

for (const menuBtn of menuBtns) {
    menuBtn.addEventListener('click', function(e) {
        if ($('i.ti-close') !==null){
            $('#btn-menu').classList.remove('ti-close');
            $('#btn-menu').classList.add('ti-menu');
            navMobile.classList.remove('active');
        }
        else{
            $('#btn-menu').classList.remove('ti-menu');
            $('#btn-menu').classList.add('ti-close');
            navMobile.classList.add('active');
        }
    })
}

/* modal login form */
const loginBtn = $('.login-btn');
const modalFormLogin = $('.modal-login');
function showLoginForm(){
    modalFormLogin.classList.add('show-login-form');
}

$('.modal-login').onclick = function(){
    modalFormLogin.classList.remove('show-login-form');
}

$('.modal-login .container').onclick = function(e){
    e.stopPropagation();
}


/* select/search submenu */
const listSelected = $$(".select-product");
//
listSelected.forEach(function(e){
    e.onclick = function(){
        localStorage.setItem("selected",e.getAttribute('id'))
        window.location = "shop.php";
    };
});
$(".menu-search").onclick = function(){
    if ($('#div-search-result.active') !== null){
        $('#div-search-result').classList.remove("active");

    }
    else {
        $('#div-search-result').classList.add("active");
    }
}


$("#search-btn").onclick = function(){
    if($(".search-result").value != ""){
        //console.log($(".search-result").value)
        localStorage.setItem("searchResult",capitalizeFirstLetter($(".search-result").value))
        window.location = "shop.php";
    }
    
}
function capitalizeFirstLetter(string) {
    // return string.charAt(0).toUpperCase() + string.slice(1);
    return string
    .toLowerCase()
    .split(' ')
    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
    .join(' ');
  }

/* RENDER API */
var sanphamApi = "http://localhost/gardenut/api/sanpham/read.php";

function start(){
    getData(renderNewArrival);
   // getData(renderSanPham);  
}
start();

function getData(callback){
    fetch(sanphamApi)
        .then(function(respone){
            return respone.json();
        })
        .then(callback)
}

function distinctData(data){
    return [...new Map(data.Sanpham.map(item =>
        [item['id_sanpham'], item])).values()];
}

function renderNewArrival(data){
    let sanpham = distinctData(data);
    let htmls = [];
    for(var i = 0; i<=3; i++){
        htmls.push(`<div id="${sanpham[i].id_sanpham}" class="col-4 arrival-item">
        <div class="arrival-img">
            <img src="./assets/image/sanpham/${sanpham[i].link}" alt="">
        </div>
        <div class="arrival-info">
        <div class="arrival-name">${sanpham[i].tensp}</div>
            <div class="item-cost-cart">
                <div class="arrival-cost">${sanpham[i].gia}</div>
                <div onclick="cartNumbers(${sanpham[i].id_sanpham},'${sanpham[i].tensp}',${sanpham[i].gia},'${sanpham[i].link}')" class="add-to-cart-btn" > + </div>
            </div>
        </div>
         </div>`)
    }
    document.querySelector('.arrival-list').innerHTML = htmls.join(""); 
}





const cartQuantity = document.querySelector('.cart-quantity');
function onLoadCartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers');
    if(productNumbers){
        cartQuantity.innerText = productNumbers;
    }
}

function cartNumbers(id_sanpham, ten_sanpham, gia, link){ 
    /* handle cart quantity */
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = Number(productNumbers);

    if(productNumbers){
        localStorage.setItem('cartNumbers',productNumbers + 1);
        cartQuantity.innerText = productNumbers+=1;
    }
    else{
        localStorage.setItem('cartNumbers', 1);
        cartQuantity.innerText = 1;
    }

      /* create obj:sanpham to set in localstorage*/
    const sanpham = {
        "id_sanpham":id_sanpham,
        "ten_sanpham":ten_sanpham,
        "gia":gia,
        "link":link,
        "quantity":1
    }  
    setItems(sanpham);
}

function setItems(sanpham){
    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);
   
    if(cartItems != null){
        if(cartItems[sanpham.id_sanpham] == undefined){
            cartItems = {
                ...cartItems,
                [sanpham.id_sanpham]:sanpham
            }
        }
        else{
            cartItems[sanpham.id_sanpham].quantity += 1;
        }
    }
    else{
        cartItems = {   
            [sanpham.id_sanpham]:sanpham
        }
    }
    localStorage.setItem('productInCart',JSON.stringify(cartItems));
}
onLoadCartNumbers();
