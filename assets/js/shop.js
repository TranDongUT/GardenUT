const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document)

var sanphamApi = "http://localhost/gardenut/api/sanpham/read.php";

/* Scroll header */
document.onscroll = function(){
    if(window.scrollY >= 200){
        header.style.backgroundColor = 'black';
    }
    else{
        header.style.backgroundColor = '';
    }
}

function start(){
    getData(renderSanPham);
}
start();

function getData(callback){
    fetch(sanphamApi)
    .then(function(respone){
        return respone.json();
    })
    .then(callback);
}

function distinctData(data){
    return [...new Map(data.Sanpham.map(item =>
        [item['id_sanpham'], item])).values()];
}

function renderSanPham(data){
  
    let arrSanPham = distinctData(data)
    let htmls = arrSanPham.map(function(sanpham){
        return `<div id="${sanpham.id_sanpham}" class="col-md-3 shop-item">
                    <div class="shop-item-img">
                        <img src="${sanpham.link}" alt="">
                    </div>
                    <div onclick="cartNumbers(${sanpham.id_sanpham},'${sanpham.tensp}',${sanpham.gia},'${sanpham.link}')" class="add-to-cart-btn" >Thêm vào giỏ</div>
                    <div class="shop-item-info">
                        <div class="shop-item-name">${sanpham.tensp}</div>
                        <div class="shop-item-cost">${sanpham.gia}</div>
                    </div>
                </div>`
    })

    $('.shop-list-item').innerHTML = htmls.join("");
}


/* add to cart func, set onclick by internal in html */

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
