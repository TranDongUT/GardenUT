// $ = document.querySelector.bind(document);
// $$ = document.querySelectorAll.bind(document);
var sanphamApi = "http://localhost/gardenut/api/sanpham/read.php";

function start(){
    getData(renderNewArrival);
    getData(renderSanPham);  
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
    var htmls = distinctData(data).map(function(sanpham){
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


function renderSanPham(data){
    var htmls = distinctData(data).map(function(sanpham){
        return  `<div class="row row-justify mb-8">
                    <div id="${sanpham.id_sanpham}" class="col-3 shop-item">
                        <div class="shop-item-img">
                            <img src="${sanpham.link}" alt="">
                        </div>
                        <div class="add-to-cart-btn">Thêm vào giỏ</div>
                        <div class="shop-item-info">
                            <div class="shop-item-name">${sanpham.tensp}</div>
                            <div class="shop-item-cost">${sanpham.gia}</div>
                        </div>
                    </div>
                    <div id="item1" class="col-3 shop-item">
                        <div class="shop-item-img">
                            <img src="./assets/image/arrivals/9.jpg" alt="">
                        </div>
                        <div class="add-to-cart-btn">Thêm vào giỏ</div>
                        <div class="shop-item-info">
                            <div class="shop-item-name">Cactus Flower</div>
                            <div class="shop-item-cost">100.000</div>
                        </div>
                    </div>
                    <div id="item1" class="col-3 shop-item">
                        <div class="shop-item-img">
                            <img src="./assets/image/arrivals/9.jpg" alt="">
                        </div>
                        <div class="add-to-cart-btn">Thêm vào giỏ</div>
                        <div class="shop-item-info">
                            <div class="shop-item-name">Cactus Flower</div>
                            <div class="shop-item-cost">100.000</div>
                        </div>
                    </div>
                </div>`;
       
    })
    document.querySelector('.arrival-list').innerHTML = htmls.join(""); 
}

start();

