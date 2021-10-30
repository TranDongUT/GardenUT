/* add to cart func, set onclick by internal in html */

export const cartQuantity = document.querySelector('.cart-quantity');
export function onLoadCartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers');
    if(productNumbers){
        cartQuantity.innerText = productNumbers;
    }
}

export function cartNumbers(id_sanpham, ten_sanpham, gia, link){ 
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


export function setItems(sanpham){
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
