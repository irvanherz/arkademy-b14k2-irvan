<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
	<title>Arkademy Coffee Shop | Category</title>
</head>

<body>
	<header>
		<div class="navbar navbar-dark bg-light text-dark box-shadow">
			<div class="container d-flex justify-content-between">
				<a href="#" class="navbar-brand d-flex align-items-center">
					<img src="https://www.arkademy.com/img/logo%20arkademy.1c82cf5c.svg" height="30px" class="pr-3"></img>
					<h1 class="h5 m-0"><span style="color:#ff8fb2;">ARKADEMY</span> <b style="color:#000;">COFFEE SHOP</b></h1>
				</a>
				<button type="button" class="btn btn-primary active px-5" data-toggle="modal" data-target="#modal-add">
					ADD
				</button>
			</div>
		</div>
	</header>

	<main role="main">

		<div class="container mt-5">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-borderless rounded-lg shadow overflow-hidden">
						<thead>
							<tr class="bg-secondary text-light">
								<th scope="col" class="text-white">No</th>
								<th scope="col" class="text-white">Category</th>
								<th scope="col" class="text-white">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($this->category->read() as $i=>$v){ ?>
							<tr>
								<td class="border-0"><?=$i+1?></td>
								<td class="border-0"><?=$v->name?></td>
								<td class="border-0"><a class="text-success" href="#" data-toggle="modal" data-target="#modal-edit" data-id="<?=$v->id?>">Edit</a> | <a class="text-danger" href="#" data-toggle="modal" data-target="#modal-delete" data-id="<?=$v->id?>">Delete</a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>

	<!-- Modal Add -->
	<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form class="modal-content" method="POST" action="<?=base_url('/store/add_category')?>">
				<div class="modal-header">
					<h5 class="modal-title">Add Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="product-name">Category Name</label>
						<input name='name' type="text" class="form-control" placeholder="Snack">
					</div>
					<div class="modal-alert">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Modal Edit -->
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form class="modal-content" method="POST" action="<?=base_url('/store/edit_category')?>">
				<div class="modal-header">
					<h5 class="modal-title">Edit Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input name='id' type="hidden">
					<div class="form-group">
						<label for="product-name">Category Name</label>
						<input name='name' type="text" class="form-control" placeholder="Snack">
					</div>
					<div id="modal-add-product-alert">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Modal Delete -->
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form class="modal-content" method="POST" action="index.php/store/<?=base_url('/store/delete_category')?>">
				<div class="modal-header">
					<h5 class="modal-title">Delete Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Are you sure?
						<input name='id' type="hidden" value="">
					<div id="modal-alert">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Yes</button>
				</div>
			</form>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
	<script>
$("#modal-add form" ).submit(function(event) {
	var data = $("#modal-add form").serialize();
	event.preventDefault();
	$.ajax({
		type: "POST",
		url: "add_category",
		data: data,
		dataType: "json",
		success: function(data) {
			if(data.status == 0){
				$("#modal-add .modal-alert").html("");
				$("#modal-add").modal("hide");
				location.reload();
			} else {
				var msg = "";
				data.message.forEach(function(v,i){
					msg = msg + "<li>" + v + "</li>";
				});
				msg = "<b>Error</b><br/><ul>"+msg+"</ul>";
				$("#modal-add .modal-alert").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span id="modal-add-product-alert">'+msg+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
			
		},
		error: function() {
			var msg = "<b>Error</b><br/>Connection error";
			$("#modal-add .modal-alert").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span id="modal-add-product-alert">'+msg+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
	});
});

$("#modal-edit form" ).submit(function(event) {
	var data = $("#modal-edit form").serialize();
	event.preventDefault();
	$.ajax({
		type: "POST",
		url: "edit_category",
		data: data,
		dataType: "json",
		success: function(data) {
			if(data.status == 0){
				$("#modal-edit .modal-alert").html("");
				$("#modal-edit").modal("hide");
				location.reload();
			} else {
				var msg = "";
				data.message.forEach(function(v,i){
					msg = msg + "<li>" + v + "</li>";
				});
				msg = "<b>Error</b><br/><ul>"+msg+"</ul>";
				$("#modal-edit .modal-alert").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span id="modal-add-product-alert">'+msg+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
			
		},
		error: function() {
			var msg = "<b>Error</b><br/>Connection error";
			$("#modal-edit .modal-alert").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span id="modal-add-product-alert">'+msg+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
	});
});

$("#modal-delete form" ).submit(function(event) {
	var data = $("#modal-delete form").serialize();
	event.preventDefault();
	$.ajax({
		type: "POST",
		url: "delete_category",
		data: data,
		dataType: "json",
		success: function(data) {
			if(data.status == 0){
				$("#modal-delete .modal-alert").html("");
				$("#modal-delete").modal("hide");
				location.reload();
			} else {
				var msg = "";
				data.message.forEach(function(v,i){
					msg = msg + "<li>" + v + "</li>";
				});
				msg = "<b>Error</b><br/><ul>"+msg+"</ul>";
				$("#modal-delete .modal-alert").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span id="modal-add-product-alert">'+msg+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
			
		},
		error: function() {
			var msg = "<b>Error</b><br/>Connection error";
			$("#modal-delete .modal-alert").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span id="modal-add-product-alert">'+msg+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
	});
});

$('#modal-delete').on('show.bs.modal', function(event) {
	var row = $(event.relatedTarget.parentNode.parentNode)
	var modal = $(this)
	var target_id = $(event.relatedTarget).data('id')
	modal.find('form input').val(target_id)
	modal.find('.modal-title').text("Delete '" + row.find("td:eq(1)").text() + "'")
})

$('#modal-edit').on('show.bs.modal', function(event) {
	var row = $(event.relatedTarget.parentNode.parentNode)
	var modal = $(this)
	modal.find('form input[name="id"]').val($(event.relatedTarget).data("id"))
	modal.find('form input[name="name"]').val(row.find("td:eq(1)").text())
})
	</script>
</body>

</html>
