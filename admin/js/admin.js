$(document).ready(function(){

	getAdmins();
	
	function getAdmins(){
		$.ajax({
			url : '../admin/classes/Admin.php',
			method : 'POST',
			data : {GET_ADMIN:1},
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);

				if (resp.status == 202) {
					var adminHTML = '';

					$.each(resp.message, function(index, value){
						$id_admin = value.admin_id;
						adminHTML += '<tr>'+
										'<td>'+value.admin_id+'</td>'+
										'<td>'+ value.name +'</td>'+
										'<td>'+ value.email +'</td>'+
										'<td>'+ value.is_active +'</td>'+
										'<td><a class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>'+
										'<td><a cid="'+$id_admin+'" class="btn-update-admin btn-sm btn-info">update</a></td>'+
									'</tr>';
					});

					$("#admin_list").html(adminHTML);

				}else if(resp.status == 303){
					$("#admin_list").html(resp.message);
				}
			}
		})
	}

	$(".add-brand").on("click", function(){

		alert();

	});

	$('.btn-update-admin').on("click", function(){
		
		var cid = $(this).attr('cid');
		console.log(cid);
			$.ajax({
				url : '../admin/classes/Admin.php',
				method : 'POST',
				data : {UPDATE_ADMIN:1, cid:cid},
				success : function(response){
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
				}else if(resp.status == 303){
					$("#admin_list").html(resp.message);
				}
				}
			})
			window.location.href = "index.php";
			
	});

});