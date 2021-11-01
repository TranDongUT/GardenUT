$(document).ready(function(){

	var productList;
	
	function getProducts(){
		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : {GET_PRODUCT:1},
			success : function(response){
				var resp = $.parseJSON(response);
				//console.log(resp);
				if (resp.status == 202) {

					var productHTML = '';

					productList = resp.message.products;
					
					if (productList) {
						$.each(resp.message.products, function(index, value){

							var productHTML = '<tr>'+
								              '<td>'+ value.id_sanpham +'</td>'+
								              '<td>'+ value.tensp +'</td>'+
								              '<td><img width="60" height="60" src="../assets/image/sanpham/'+value.hinhanh+'"></td>'+
								              '<td>'+ value.gia +'</td>'+
								              '<td>'+ value.soluong +'</td>'+
								              '<td>'+ value.tenloai +'</td>'+
								              '<td><a class="btn btn-sm btn-info edit-product" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a pid="'+value.id_sanpham+'" class="btn btn-sm btn-danger delete-product" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></td>'+
								            '</tr>';
							$( "#table-list tbody" ).append(productHTML);
							
						});
						$("#table-list").DataTable();
						//$("#product_list").html(productHTML);
						
					}
					
					


					var catSelectHTML = '<option value="">Select Category</option>';
					$.each(resp.message.categories, function(index, value){

						catSelectHTML += '<option value="'+ value.id_loaisp +'">'+ value.tenloai +'</option>';

					});

					$(".category_list").html(catSelectHTML);

				}
			}

		});
	}

	getProducts();
	

	$(".add-product").on("click", function(){

		$.ajax({

			url : '../admin/classes/Products.php',
			method : 'POST',
			data : new FormData($("#add-product-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#add-product-form").trigger("reset");
					$("#add_product_modal").modal('hide');
					
					getProducts();
					alert(resp.message);
					window.location.href = "products.php";
				}else if(resp.status == 303){
					alert(resp.message);
				}
				
			}

		});
		$(".modal").classList.remove("show");
	});


	$(document.body).on('click', '.edit-product', function(){

		console.log($(this).find('span').text());

		var product = $.parseJSON($.trim($(this).find('span').text()));

		console.log(product);

		$("input[name='e_product_name']").val(product.tensp);
		$("select[name='e_category_id']").val(product.id_loaisp);
		$("textarea[name='e_product_desc']").val(product.ghichu);
		$("input[name='e_product_qty']").val(product.soluong);
		$("input[name='e_product_price']").val(product.gia);
		$("input[name='e_product_image']").siblings("img").attr("src", "./assets/image/sanpham/"+product.hinhanh);
		$("input[name='pid']").val(product.id_sanpham);
		$("#edit_product_modal").modal('show');

	});

	$(".submit-edit-product").on('click', function(){

		$.ajax({

			url : '../admin/classes/Products.php',
			method : 'POST',
			data : new FormData($("#edit-product-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit-product-form").trigger("reset");
					$("#edit_product_modal").modal('hide');
					getProducts();
					alert(resp.message);
					window.location.href = "products.php";
				}else if(resp.status == 303){
					alert(resp.message);
				}
			}

		});


	});

	$(document.body).on('click', '.delete-product', function(){

		var pid = $(this).attr('pid');
		if (confirm("Bạn có chắc chắn xóa mục này không?")) {
			$.ajax({

				url : '../admin/classes/Products.php',
				method : 'POST',
				data : {DELETE_PRODUCT: 1, pid:pid},
				success : function(response){
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getProducts();
						alert(resp.message);
					}else if (resp.status == 303) {
						alert(resp.message);
					}
				}

			});
		}else{
			alert('Cancelled');
		}
		

	});

});