$ = document.querySelector.bind(document);
$$ = document.querySelectorAll.bind(document);


const header = $('#header');
const items = $$('.arrival-item');
const modalDetailItem = $('.modal-detail')
const addToCartBtn = $$('.add-to-cart-btn');
const cartQuantity = $('.cart-quantity');

console.log(cartQuantity.innerText);
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

items.forEach(function(item,index){
    item.onclick = function(){
        modalDetailItem.classList.add('modal-show');
    }
});

/* add to cart btn */
addToCartBtn.forEach(function(btn){
    btn.onclick = function(){
        old = Number(cartQuantity.innerText);
        cartQuantity.innerText = old+=1;
    }
})