<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>

<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Product List</h2>
      	</div>
      	<div class="col-2">
      		<a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-warning btn-sm">Thêm sản phẩm</a>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table id="table-list" class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên sản phẩm</th>
              <th>Hình ảnh</th>
              <th>Giá bán</th>
              <th>Số lượng</th>
              <th>Loại sản phẩm</th>
            </tr>
          </thead>
          <tbody id="product_list">
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- Add Product Modal start -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Tên sản phẩm</label>
		        		<input type="text" name="product_name" class="form-control" placeholder="Nhập tên sản phẩm">
		        	</div>
        		</div>
        		<div class="col-12">
            <div class="form-group">
		        		<label>Loại sản phẩm</label>
		        		<select class="form-control category_list" name="category_id">
		        			<option value="1">Cây cảnh văn phòng</option>
		        			<option value="2">Cây cảnh trong nhà</option>
                  <option value="3">Xương rồng</option>
		        			<option value="4">Sen đá</option>
                  <option value="5">Hoa sinh nhật</option>
                  <option value="6">Hoa đám cưới</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Mô tả sản phẩm</label>
		        		<textarea class="form-control" name="product_desc" placeholder="Nhập mô tả sản phẩm"></textarea>
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Số lượng sản phẩm</label>
                <input type="number" name="product_qty" class="form-control" placeholder="Nhập số lượng sản phẩm">
              </div>
            </div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Giá sản phẩm</label>
		        		<input type="number" name="product_price" class="form-control" placeholder="Nhập giá sản phẩm">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Hình ảnh sản phẩm <small>(định dạng: jpg, jpeg, png)</small></label>
		        		<input type="file" name="product_image" class="form-control">
		        	</div>
        		</div>
        		<input type="hidden" name="add_product" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-product">Thêm sản phẩm</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Add Product Modal end -->

<!-- Edit Product Modal start -->
<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-product-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="e_product_name" class="form-control" placeholder="Nhập tên sản phẩm">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Loại sản phẩm</label>
                <select class="form-control category_list" name="e_category_id">
                  <option value="">Home</option>
                  <option value="">Office</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Mô tả sản phẩm</label>
                <textarea class="form-control" name="e_product_desc" placeholder="Nhập mô tả sản phẩm"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Số lượng sản phẩm</label>
                <input type="number" name="e_product_qty" class="form-control" placeholder="Nhập số lượng sản phẩm">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Giá sản phẩm</label>
                <input type="number" name="e_product_price" class="form-control" placeholder="Nhập giá sản phẩm">
              </div>
            <div class="col-12">
              <div class="form-group">
                <label>Hình ảnh sản phẩm <small>(định dạng: jpg, jpeg, png)</small></label>
                <input type="file" name="e_product_image" class="form-control">
                <img src="" class="img-fluid" width="50">
              </div>
            </div>
            <input type="hidden" name="pid">
            <input type="hidden" name="edit_product" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary submit-edit-product">Thêm sản phẩm</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Product Modal end -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/products.js"></script>
<script src="../assets/DataTable/datatables.js"></script>
<link rel="stylesheet" href="../assets/DataTable/datatables.css">