let $ = document.querySelector.bind(document);
let $$ = document.querySelectorAll.bind(document);

/* scroll page header */
document.onscroll = function(){
    if(window.scrollY >= 200){
        header.style.backgroundColor = 'black';
    }
    else{
        header.style.backgroundColor = '';
    }
}

/* Mobile header */
/* Mobile menu */
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

/* select/search submenu */
const listSelected = $$(".select-product");
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

/* Search */
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


/* modal-login */
const loginBtn = $('.login-btn');
const modalFormLogin = $('.modal-login');
function showLoginForm() {
    modalFormLogin.classList.add('show-login-form');
    return false;
}

$('.modal-login').onclick = function(){
    modalFormLogin.classList.remove('show-login-form');
}

$('.modal-login .container').onclick = function(e){
    e.stopPropagation();
}


// for (const menuBtn of menuBtns) {
//     menuBtn.addEventListener('click', function(e) {
//         if ($('i.ti-close') !==null){
//             $('#btn-menu').classList.remove('ti-close');
//             $('#btn-menu').classList.add('ti-menu');
//             navMobile.classList.remove('active');
//         }
//         else{
//             $('#btn-menu').classList.remove('ti-menu');
//             $('#btn-menu').classList.add('ti-close');
//             navMobile.classList.add('active');
//         }
//     })
// }

function cartApp(){
    onLoadCartNumbers();
    updateOrder();
    cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);
    cartItems = convertCartToArray(cartItems);
    renderCartItems(cartItems);
    payTotal(cartItems)
}
cartApp();

const cartQuantity = $('.cart-quantity');
function onLoadCartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers');
    $('.cart-quantity').innerText = productNumbers;
}


function renderCartItems(cartItems){
    const htmls = cartItems.map(function(item){
        
        return `
                <div class="item item-${item.id_sanpham}">
                    <div class="item-info">
                        <img src="./assets/image/sanpham/${item.link}" alt="">
                        <div class="name"><h4>${item.ten_sanpham}</h4></div>
                    </div>
                    <div class="item quantity">
                        <span class="qty-minus" onclick="var effect = document.getElementById('qty-${item.id_sanpham}'); var qty = effect.value; if( !isNaN( qty ) && qty>1 ) effect.value--;updateQuantity(${item.id_sanpham},effect.value) ;return false;"><i class="ti-minus" aria-hidden="true"></i></span>
                        <input type="number" class="qty-text" id="qty-${item.id_sanpham}" step="1" min="1" max="12" name="quantity" value="${item.quantity}">
                        <span class="qty-plus" onclick="var effect = document.getElementById('qty-${item.id_sanpham}'); var qty = effect.value; if( !isNaN( qty )) effect.value++ ;updateQuantity(${item.id_sanpham},effect.value);return false;"><i class="ti-plus" aria-hidden="true"></i></span>
                    </div>
                    <div class="item-price">
                        <p>${item.gia}</p>
                    </div>
                    <div class="item-total">
                        <p>${item.quantity * item.gia}</p>
                    </div>
                    <div onclick="removeItem(${item.id_sanpham})" class="item-trash">
                        <i class="ti-trash"></i>
                    </div>
                </div>`
    })
    document.querySelector('.products-list').innerHTML = htmls.join("");
    
}

function convertCartToArray(cartItems,callback){
    let arrItems = [];
    for(var i in cartItems){     
        arrItems.push(cartItems[i]);
    }
    return  arrItems;
}

function updateQuantity(id_sanpham,value){
    cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);
    cartItems = convertCartToArray(cartItems);
    let productNumbers = 0;
    cartItems.forEach(function(item,index){
        if(item.id_sanpham == id_sanpham){
            item.quantity = parseInt(value);
        }
        productNumbers += item.quantity;
    });
    
    localStorage.setItem('productInCart',JSON.stringify(cartItems));
    localStorage.setItem('cartNumbers', productNumbers);
    $('.cart-quantity').innerText = productNumbers;

    cartApp();
}

function payTotal(cartItems){
    let htmls = `<div class="pay-price">
                    <h5>Tổng Tiền Hàng</h5>
                    <h5>${totalCost(cartItems)}</h5>
                </div>
                <div class="pay-ship">
                    <h5>Phí vận chuyển</h5>
                    <h5>15000</h5>
                </div>
                <div class="pay-total">
                    <h5>Tổng Thanh Toán</h5>
                    <h5>${totalCost(cartItems) + 15000}</h5>
                </div>`
    document.querySelector('.pay-detail').innerHTML = htmls;
}

function totalCost(cartItems){
    return cartItems.reduce(function(pre,current){
        return pre + (current.gia * current.quantity); 
    },0)
}


function removeItem(id_sanpham){

    document.querySelector('.item-'+id_sanpham).remove();
    cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);
    cartItems = convertCartToArray(cartItems);

    /* handle on localstorage */
    if(cartItems.length == 1){
        localStorage.removeItem('productInCart');
        localStorage.setItem('cartNumbers', 0);
        cartItems = [];
    }
    else{
        cartItems.forEach(function(item,index){
            if(item.id_sanpham == id_sanpham){
                let productNumbers = localStorage.getItem('cartNumbers');                
                localStorage.setItem('cartNumbers', productNumbers-item.quantity);
                $('.cart-quantity').innerText = productNumbers-item.quantity;
                cartItems.splice(index,1);
            }
        });
    }
    localStorage.setItem('productInCart',JSON.stringify(cartItems));

    cartApp();
}


function getProductToOrder(){

    cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);
    cartItems = convertCartToArray(cartItems);

    return cartItems;
}

function updateOrder(){
    arrProducts = getProductToOrder();
    let soluong = localStorage.getItem('cartNumbers');
    
    let htmls = arrProducts.map(function(item){
        return `<input type="hidden" name="products[]" id="" value='${JSON.stringify(item)}'>`;
        
    })
    $('.arrProducts').innerHTML = htmls.join("");
    $("input[name='totalProducts']").value = soluong;
}


const btnOrder = $('.btn-order');
const isLogin = $('.isLogin');
btnOrder.onclick = function(){
    if(isLogin == null){
        modalFormLogin.classList.add('show-login-form');
    }
    if(localStorage.getItem('cartNumbers') == 0 || localStorage.getItem('cartNumbers') == null){
        alert("Bạn chưa có sản phẩm nào trong giỏ");
    }
}