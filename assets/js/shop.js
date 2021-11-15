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

/* Mobile menu */
//const menuBtns = $('.menu-mobile');
//const navMobile = $('.nav');
$('.menu-mobile').onclick = function(){
    if ($('.ti-menu') !== null){
        //console.log($('#btn-menu').className)
        //$('#btn-menu').classList.remove('ti-close');
        $('#btn-menu').className = ('ti-toggle ti-close');
        $('.nav').style.right = 0;
    }
    else{
        $('#btn-menu').className = ('ti-toggle ti-menu');
        $('.nav').style.right = -100 + "%";
        
    }
}

/* main */
function start(){ 
    getData(function(data){
        data = convertCartToArray(data);
        data = handleDataImg(data);
        renderSanPham(data);
    });
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

function convertCartToArray(data){
    let arrItems = [];
    for(var i in data.Sanpham){     
        arrItems.push(data.Sanpham[i]);
    }
    return  arrItems;
}

function handleDataImg(arr){
    let newArr = []; 
    newArr.push(arr[0]);
    for(let i=0; i<arr.length; i++){
        let check = newArr.every(function(item){
            return item.id_sanpham != arr[i].id_sanpham;
        })
        if(check){
            newArr.push(arr[i]);
        }
    }
    return newArr;
}

let currentPage = 1;
let perPage = 9;
let arrSanPham = [];
let perPost = [];

function renderSanPham(data){

    arrSanPham = data;
    let totalPage = Math.ceil(data.length/perPage);
    handlePage(1);
    // for(var i = 0; i<9; i++){
    //     htmls.push(`<div id="${arrSanPham[i].id_sanpham}" class="col-md-3 shop-item">
    //                     <div class="shop-item-img">
    //                         <img src="./assets/image/sanpham/${arrSanPham[i].link}" alt="">
    //                     </div>
    //                     <div onclick="cartNumbers(${arrSanPham[i].id_sanpham},'${arrSanPham[i].tensp}',${arrSanPham[i].gia},'${arrSanPham[i].link}')" class="add-to-cart-btn" >Thêm vào giỏ</div>
    //                     <div class="shop-item-info">
    //                         <div onclick="renderModal(${arrSanPham[i].id_sanpham})" class="shop-item-name">${arrSanPham[i].tensp}</div>
    //                         <div class="shop-item-cost">${arrSanPham[i].gia}</div>
    //                     </div>
    //                 </div>`)
    // }
    // $('.shop-list-item').innerHTML = htmls.join("");
    $$('.page-index').forEach(element => {
        element.remove();
    });
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
                        <img src="./assets/image/sanpham/${sanpham.hinhanh}" alt="">
                    </div>
                    <div class="shop-item-info">
                        <div onclick="renderModal(${sanpham.id_sanpham},'${sanpham.tensp}','${sanpham.ghichu}',${sanpham.gia},'${sanpham.link}')" class="shop-item-name">${sanpham.tensp}</div>
                        <div class="item-cost-cart">
                            <div class="shop-item-cost">${sanpham.gia}</div>
                            <div onclick="cartNumbers(${sanpham.id_sanpham},'${sanpham.tensp}',${sanpham.gia},'${sanpham.link}')" class="add-to-cart-btn" > + </div>
                        </div>    
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

///////////////////////////////////////
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
        let arrImg = filterArrImg(detailItem);
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
                    $('.product__images .images').innerHTML += `<img onclick = "changeImg('img-${i}')"; class="img-${i}" src="./assets/image/sanpham/${arrImg[i]}" alt="">`
                }              
    })
    modalDetail.classList.add('showModal');  
}

function changeImg(img){
    let image  = $('.'+img).src;
    $(".modal-slider img").src = image;
}


function filterArrImg(arr){
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

/* control widget sort/filter */
const sortWidgetBtn = $$("input[name='sort-btn']");
sortWidgetBtn[0].onclick = function(){
    arrSanPham.sort(function(a,b){
        if(Number(a.gia) > Number(b.gia)){
            return 1;
        }
        if(Number(a.gia) < Number(b.gia)){
            return -1
        }
        return 0; 
    })
    renderSanPham(arrSanPham);        
} 
sortWidgetBtn[1].onclick = function(){
    arrSanPham.sort(function(a,b){
        if(Number(a.gia) < Number(b.gia)){
            return 1;
        }
        if(Number(a.gia) > Number(b.gia)){
            return -1
        }
        return 0; 
    })
    renderSanPham(arrSanPham); 
}


function renderSort(data){
    let htmls = [];
    for(var i = 0; i<9; i++){
        htmls.push(`<div id="${data[i].id_sanpham}" class="col-md-3 shop-item">
                        <div class="shop-item-img">
                            <img src="./assets/image/sanpham/${data[i].link}" alt="">
                        </div>
                        <div class="shop-item-info">
                            <div onclick="renderModal(${data[i].id_sanpham})" class="shop-item-name">${data[i].tensp}</div>
                            <div class="item-cost-cart">
                                <div class="shop-item-cost">${data[i].gia}</div>
                                <div onclick="cartNumbers(${data[i].id_sanpham},'${data[i].tensp}',${data[i].gia},'${data[i].link}')" class="add-to-cart-btn" > + </div>
                            </div>
                        </div>
                    </div>`)
    }
    $('.shop-list-item').innerHTML = htmls.join("");
}

arrIdBox = [];
const widgetBox = $$('.widget-boxs');
widgetBox.forEach(function(e){
    e.onclick = function(){
        if(e.checked == true){
            arrIdBox.push(e.value);
        }
        else{
            let index = arrIdBox.indexOf(e.value);
            arrIdBox.splice(index,1);
        }
        filterByTypeProduct(arrIdBox);
    }
})

function filterByTypeProduct(arrIdBox){
    if(arrIdBox.length != 0){ 
        getData(function(data){
            data = convertCartToArray(data);
            data = handleDataImg(data);
            arrFill = data.filter(function(item){
                return arrIdBox.includes(item.id_loaisp);
            })
            renderSanPham(arrFill);
        });
        //renderSanPham(arrSanPham);
    }
    else if(arrIdBox.length == 0){
        getData(function(data){
            data = convertCartToArray(data);
            data = handleDataImg(data);
            renderSanPham(data);
        });
    }
}


window.onload = function(){
    const searchResult = localStorage.getItem("searchResult");
    if(searchResult != null){
        getData(function(data){
            data = convertCartToArray(data);
            data = handleDataImg(data);
            let arrFill = data.filter(function(item){ 
                return item.tensp.includes(searchResult);
            })
            renderSanPham(arrFill);
        });
        renderSanPham(arrSanPham);
        localStorage.removeItem("searchResult");
    }
    else{
        if(localStorage.getItem("selected") === "product-1"){
            widgetBox[0].checked == true;
            arrIdBox.push(widgetBox[0].value);
        }
        if(localStorage.getItem("selected") === "product-2"){
            widgetBox[1].checked == true;
            arrIdBox.push(widgetBox[1].value);
        }
        if(localStorage.getItem("selected") === "product-3"){
            widgetBox[2].checked == true;
            arrIdBox.push(widgetBox[2].value);
        }
        if(localStorage.getItem("selected") === "product-4"){
            widgetBox[3].checked == true;
            arrIdBox.push(widgetBox[3].value);
        }
        if(localStorage.getItem("selected") === "product-5"){
            widgetBox[4].checked == true;
            arrIdBox.push(widgetBox[4].value);
        }
        if(localStorage.getItem("selected") === "product-6"){
            widgetBox[5].checked == true;
            arrIdBox.push(widgetBox[5].value);
        }
        filterByTypeProduct(arrIdBox);
        localStorage.removeItem("selected");
   }
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

