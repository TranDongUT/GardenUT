$(document).ready(function(){

	getCustomers();
	getCustomerOrders();
	

	function getCustomers(){
		$.ajax({
			url : '../admin/classes/Customers.php',
			method : 'POST',
			data : {GET_CUSTOMERS:1},
			success : function(response){
				
				//console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customersHTML = "";

					$.each(resp.message, function(index, value){

						customersHTML += '<tr>'+
									          '<td>#</td>'+
									          '<td>'+value.username+'</td>'+
									          '<td>'+value.phone+'</td>'+
									        //   '<td>'+value.address+'</td>'+
									       '</tr>'

					});

					$("#customer_list").html(customersHTML);

				}else if(resp.status == 303){

				}

			}
		})
		
	}

	function getCustomerOrders(){
		$.ajax({
			url : '../admin/classes/Customers.php',
			method : 'POST',
			data : {GET_CUSTOMER_ORDERS:1},
			success : function(response){
				//console.log(response);

				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customerOrderHTML = "";

					$.each(resp.message, function(index, value){
						
						$trangthai = value.trangthai == '1' ? 'Chờ xử lý' : 'Hoàn thành';

						customerOrderHTML ='<tr>'+
								              '<td>'+value.id_order+'</td>'+
								              '<td>'+ value.username +'</td>'+
								              '<td>'+value.sonha+', '+value.xa+', '+value.huyen+', '+value.tinh+'</td>'+
								              '<td>'+ value.ngaydat +'</td>'+
								              '<td>'+ value.tongsl +'</td>'+
											  '<td>'+ $trangthai+'</td>'+
											  '<td><a cid="'+value.id_order+'" class="btn btn-sm btn-info details" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span>Chi tiết</a>&nbsp;'+
								            '</tr>';
						$( "#table-list tbody" ).append(customerOrderHTML);
					});
					$("#table-list").DataTable();
					//$("#customer_order_list").html(customerOrderHTML);
					//console.log($("#table-list"));
				}else if(resp.status == 303){
					$("#customer_order_list").html(resp.message);
				}

			}
		})
		
	}

	


	$(document.body).on('click', '.details', function(){
		
		var cid = $(this).attr('cid');
			$.ajax({
				url : '../admin/classes/Customers.php',
				method : 'POST',
				data : {GET_ORDER_DETAILS:1, cid:cid},
				success : function(response){
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						var orderDetailsHTML = "";
					
						$id_order = null;
					$.each(resp.message, function(index, value){
						$id_order = value.id_order;
						orderDetailsHTML +='<tr>'+
								              '<td>'+value.id_order+'</td>'+
								              '<td>'+ value.tensp +'</td>'+
								              '<td><img width="60" height="60" src="../assets/image/sanpham/'+value.hinhanh+'"></td>'+
								              '<td>'+ value.soluong +'</td>'+
								            '</tr>';

					});
					orderDetailsHTML += '<tr><td style="width:220px">'
						+'<a cid="'+$id_order+'" class="btn-finish btn btn-info" style="color:#fff; cursor:pointer">Hoàn tất</a>'
						+'<a cid="'+$id_order+'" class="btn-unfinish btn btn-danger" style="float:right; color:#fff; cursor:pointer">Chờ xử lý</a>'
					+'</td></tr>';

					$("#order-details").html(orderDetailsHTML);

				}else if(resp.status == 303){
					$("#order-details").html(resp.message);
				}
				}
			})
			$("#product_details").modal('show');
	});



/* Xử lý đơn hàng */
	$(document.body).on('click', '.btn-finish', function(){
		
		var cid = $(this).attr('cid');
			$.ajax({
				url : '../admin/classes/Customers.php',
				method : 'POST',
				data : {FINISH_ORDER:1, cid:cid},
				success : function(response){
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
				}else if(resp.status == 303){
					$("#order-details").html(resp.message);
				}
				}
			})
			window.location.href = "customer_orders.php";
			
	});

	$(document.body).on('click', '.btn-unfinish', function(){
		
		var cid = $(this).attr('cid');
			$.ajax({
				url : '../admin/classes/Customers.php',
				method : 'POST',
				data : {UNFINISH_ORDER:1, cid:cid},
				success : function(response){
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
				}else if(resp.status == 303){
					$("#order-details").html(resp.message);
				}
				}
			})
			window.location.href = "customer_orders.php";

			
	});

});