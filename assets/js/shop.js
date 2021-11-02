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
/* main */
function start(){ 
    getData(renderSanPham);
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

let currentPage = 1;
let perPage = 9;
let arrSanPham = [];
let perPost = [];

function renderSanPham(data){

    arrSanPham = distinctData(data);
    let totalPage = Math.ceil(arrSanPham.length/perPage);

    let htmls = [];
    for(var i = 0; i<9; i++){
        htmls.push(`<div id="${arrSanPham[i].id_sanpham}" class="col-md-3 shop-item">
                        <div class="shop-item-img">
                            <img src="./assets/image/sanpham/${arrSanPham[i].link}" alt="">
                        </div>
                        <div onclick="cartNumbers(${arrSanPham[i].id_sanpham},'${arrSanPham[i].tensp}',${arrSanPham[i].gia},'${arrSanPham[i].link}')" class="add-to-cart-btn" >Thêm vào giỏ</div>
                        <div class="shop-item-info">
                            <div onclick="renderModal(${arrSanPham[i].id_sanpham})" class="shop-item-name">${arrSanPham[i].tensp}</div>
                            <div class="shop-item-cost">${arrSanPham[i].gia}</div>
                        </div>
                    </div>`)
    }
    $('.shop-list-item').innerHTML = htmls.join("");

    for(var i = 1; i <= totalPage; i++){
        $('.page-btn-list').innerHTML += `<a href="#"><button onclick="handlePage(${i})" type="button" class="btn btn-dark page-index">${i}</button></a>`; 
    }
}

function handlePage(key){
    currentPage = key;
    perPost = arrSanPham.slice(
        (currentPage - 1) * perPage,
        (currentPage - 1) * perPage + perPage
    )
    
    let htmls = perPost.map(function(sanpham){
        return `<div id="${sanpham.id_sanpham}" class="col-md-3 shop-item">
                    <div class="shop-item-img">
                        <img src="./assets/image/sanpham/${sanpham.link}" alt="">
                    </div>
                    <div onclick="cartNumbers(${sanpham.id_sanpham},'${sanpham.tensp}',${sanpham.gia},'${sanpham.link}')" class="add-to-cart-btn" >Thêm vào giỏ</div>
                    <div class="shop-item-info">
                        <div onclick="renderModal(${sanpham.id_sanpham},'${sanpham.tensp}','${sanpham.ghichu}',${sanpham.gia},'${sanpham.link}')" class="shop-item-name">${sanpham.tensp}</div>
                        <div class="shop-item-cost">${sanpham.gia}</div>
                    </div>
                </div>`
    })
    $('.shop-list-item').innerHTML = htmls.join("");
}


// function renderSanPham(data){
  
//     let arrSanPham = distinctData(data)
//     let htmls = arrSanPham.map(function(sanpham){
//         return `<div id="${sanpham.id_sanpham}" class="col-md-3 shop-item">
//                     <div class="shop-item-img">
//                         <img src="${sanpham.link}" alt="">
//                     </div>
//                     <div onclick="cartNumbers(${sanpham.id_sanpham},'${sanpham.tensp}',${sanpham.gia},'${sanpham.link}')" class="add-to-cart-btn" >Thêm vào giỏ</div>
//                     <div class="shop-item-info">
//                         <div class="shop-item-name">${sanpham.tensp}</div>
//                         <div class="shop-item-cost">${sanpham.gia}</div>
//                     </div>
//                 </div>`
//     })
//     $('.shop-list-item').innerHTML = htmls.join("");
// }


/* add to cart func, set onclick by internal in html */
const cartQuantity = document.querySelector('.cart-quantity');
function onLoadCartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers');
    if(productNumbers){
        cartQuantity.innerText = productNumbers;
    }
}

function cartNumbers(id_sanpham, ten_sanpham, gia, link, quantity = 1){ 
    /* handle cart quantity */
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = Number(productNumbers);
    quantity = Number(quantity);
    if(productNumbers){
        localStorage.setItem('cartNumbers',productNumbers + quantity);
        cartQuantity.innerText = productNumbers += quantity;
    }
    else{
        localStorage.setItem('cartNumbers', quantity);
        cartQuantity.innerText = quantity;
    }

      /* create obj:sanpham to set in localstorage*/
    const sanpham = {
        "id_sanpham":id_sanpham,
        "ten_sanpham":ten_sanpham,
        "gia":gia,
        "link":link,
        "quantity":quantity
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
            cartItems[sanpham.id_sanpham].quantity += sanpham.quantity;
        }
    }
    else{
        cartItems = {   
            [sanpham.id_sanpham]:sanpham
        }
    }
    modalDetail.classList.remove('showModal');
    localStorage.setItem('productInCart',JSON.stringify(cartItems));
}
onLoadCartNumbers();



/* Handle Detail Modal */
const modalDetail = $('.modal-detail');
const modalSilderImg = $('.modal-slider img')
const modalImgList = $$('.modal-detail .images img');

function renderModal(id_sanpham){

    let detailItem;
    getData(function(data){
        detailItem = data.Sanpham.filter(function(items){
            return items.id_sanpham == id_sanpham;
        })

        let arrImg = fillerArrImg(detailItem);
            let htmls = `<div class="product">
                    <div class="product__images">
                        <div class="modal-slider"><img src="./assets/image/sanpham/${detailItem[0].link}" alt=""></div>
                        <div class="images">
                       
                        </div>
                    </div>
                    <div class="infos">
                        <h2>${detailItem[0].tensp}</h2>
                        <h2 class="price">${detailItem[0].gia}</h2>
                        <div class="p">${detailItem[0].ghichu}</div>
                        <div class="quantity">
                            <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) && qty>1 ) effect.value--;return false;"><i class="ti-minus" aria-hidden="true"></i></span>
                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                            <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="ti-plus" aria-hidden="true"></i></span>
                        </div>
                        <div class="button">
                            <button onclick="cartNumbers(${detailItem[0].id_sanpham},'${detailItem[0].tensp}',${detailItem[0].gia},'${detailItem[0].link}',document.getElementById('qty').value)" class="cart">Thêm Vào Giỏ</button>
                        </div>
                    </div>
                </div>`;
                $('.modal_container').innerHTML = htmls;   
                for(let i = 0; i<arrImg.length; i++){
                    $('.product__images .images').innerHTML += `<img class="" src="./assets/image/sanpham/${arrImg[i]}" alt="">`
                }
        
    })
    modalDetail.classList.add('showModal');
   
}

function fillerArrImg(arr){
    return  newArrImg = arr.map(function(item){
        return item.link;
    })
}

modalDetail.onclick = function(){
    modalDetail.classList.remove('showModal');
}

$('.modal_container').onclick = function(e){
    e.stopPropagation();
}