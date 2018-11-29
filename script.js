$(function(){
	insert_records();
	loadData();
	update_records();
})

function insert_records(){
	$('#saveData').on('submit', function(event){
		event.preventDefault();
		$form = $(this);
		$.ajax({
			url: $form.attr('action'),
			method: $form.attr('method'),
			data: $form.serialize(),
			success:function(response){
				console.log(response);
				loadData();
			}
		});
	});
}


function loadData(){
	$.ajax({
			url: 'controller.php',
			method: 'get',
			data: {records:1},
			success: function(response){
				response = $.parseJSON(response);
				if (response.status == 'success') {
					$('#dataTable').html(response.html);
				}
			}

	});
}

function update_records(){
	$('#dataTable').on('click', function(event){
		event.preventDefault();
		alert('Hello');
		// var user_id = $('#user_id').val();
		// alert(user_id);
	});
}