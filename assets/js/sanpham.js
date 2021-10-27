// $ = document.querySelector.bind(document);
// $$ = document.querySelectorAll.bind(document);

var sanphamApi = "http://localhost/gardenut/api/sanpham/read.php";

function start(){
    getData(renderSanPham);
    getData(renderCartItems);  
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

function renderSanPham(data){

    var htmls = distinctData(data).map(function(sanpham){
        let ten = sanpham.tensp;
        return   `<div id="${sanpham.id_sanpham}" class="col-4 arrival-item">
                        <div class="arrival-img">
                            <img src="${sanpham.link}" alt="">
                        </div>
                        <div onclick="cartNumbers(${sanpham.id_sanpham},'${sanpham.tensp}',${sanpham.gia},'${sanpham.link}')" class="add-to-cart-btn" >Thêm vào giỏ</div>
                        <div class="arrival-info">
                            <div class="arrival-name">${sanpham.tensp}</div>
                            <div class="arrival-cost">${sanpham.gia}</div>
                        </div>
                 </div>`;
       
    })
    document.querySelector('.arrival-list').innerHTML = htmls.join(""); 
}

function renderCartItems(data){
    let inCart = localStorage.getItem('productInCart');

}


start();

