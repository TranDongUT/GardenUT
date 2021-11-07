<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>ĐƠN HÀNG</h2>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table id="table-list" class=" table table-striped table-sm">
          <thead>
            <tr>
              <th>Mã đặt hàng</th>
              <th>Tên khách hàng</th>
              <th>Địa chỉ</th>
			        <th>Ngày đặt hàng</th>
              <th>Tổng số lượng</th>
              <th>Trạng thái</th>
            </tr>
          </thead>
          <tbody id="customer_order_list">
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



<!-- Modal -->
<div class="modal fade" id="product_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chi Tiết Đơn Hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Mã đặt hàng</th>
              <th>Tên sản phẩm</th>
              <th>Hình ảnh</th>
              <th>Số lượng</th>
              
            </tr>
          </thead>
          <tbody id="order-details">
            <!-- <tr>
              <td>1</td>
              <td>ABC</td>
              <td>FDGR.JPG</td>
              <td>122</td>
            </tr> -->
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>
<script src="../assets/DataTable/datatables.js"></script>
<link rel="stylesheet" href="../assets/DataTable/datatables.css">