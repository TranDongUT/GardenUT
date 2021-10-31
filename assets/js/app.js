


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

/* show detail modal item onclick */
// items.forEach(function(item,index){
//     item.onclick = function(){
//         modalDetailItem.classList.add('modal-show');
//     }
// });


/* modal login form */
const loginBtn = $('.login-btn');
const modalFormLogin = $('.modal-login');
loginBtn.onclick = function(e){
    // e.preventDefault();
    modalFormLogin.classList.add('show-login-form');
}

$('.modal-login').onclick = function(){
    modalFormLogin.classList.remove('show-login-form');
}

$('.modal-login .container').onclick = function(e){
    e.stopPropagation();
}

var sanphamApi = "http://localhost/gardenut/api/sanpham/read.php";

function start(){
    getData(renderNewArrival);
   // getData(renderSanPham);  
}

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
                    <img src="${sanpham[i].link}" alt="">
                </div>
                <div onclick="cartNumbers(${sanpham[i].id_sanpham},'${sanpham[i].tensp}',${sanpham[i].gia},'${sanpham[i].link}')" class="add-to-cart-btn" >Thêm vào giỏ</div>
                <div class="arrival-info">
                    <div class="arrival-name">${sanpham[i].tensp}</div>
                    <div class="arrival-cost">${sanpham[i].gia}</div>
                </div>
                 </div>`)
    }
    document.querySelector('.arrival-list').innerHTML = htmls.join(""); 
}
start();




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
