let $ = document.querySelector.bind(document);
let $$ = document.querySelectorAll.bind(document);

function cartApp(){
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
    if(productNumbers){
        cartQuantity.innerText = productNumbers;
    }
}
onLoadCartNumbers();

function renderCartItems(cartItems){
    const htmls = cartItems.map(function(item){
        return `<hr>
                <div class="item item-${item.id_sanpham}">
                    <div class="item-info">
                        <img src="${item.link}" alt="">
                        <div class="name"><h4>${item.ten_sanpham}</h4></div>
                    </div>
                    <div class="item quantity">
                        <span class="qty-minus" onclick="var effect = document.getElementById('qty-${item.id_sanpham}'); var qty = effect.value; if( !isNaN( qty ) && qty>1 ) effect.value--;updateQuantity(${item.id_sanpham},effect.value) ;return false;"><i class="ti-minus" aria-hidden="true"></i></span>
                        <input type="number" class="qty-text" onchange="updateQuantity(${item.id_sanpham},this.value)" id="qty-${item.id_sanpham}" step="1" min="1" max="12" name="quantity" value="${item.quantity}">
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
                </div>
                <hr>`
    })
    document.querySelector('.products-list').innerHTML = htmls.join("");
}

function convertCartToArray(cartItems,callback){
    let arrItems = [];
    for(var i in cartItems){
        if(cartItems[i].quantity == 0){
            continue;
        }else{
            arrItems.push(cartItems[i]);
        }
    }
    return  arrItems;
}

function updateQuantity(id_sanpham,value){    
    cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);
    cartItems[id_sanpham].quantity = parseInt(value);
    localStorage.setItem('productInCart',JSON.stringify(cartItems));
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
    cartItems[id_sanpham].quantity = 0;
    localStorage.setItem('productInCart',JSON.stringify(cartItems));
    cartApp();
}
