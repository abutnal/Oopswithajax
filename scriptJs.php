// DOCUMENT READY
$(function(){
	insert_records();
	loadData();
})

//Insert Method With Ajax
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
				 $('#saveData').find('input:text').val(''); 
   				//$('input:checkbox').removeAttr('checked');
			}
		});
	});
}


//Update method with Ajax
$(document).ready(function(){
	$(document).on('submit','#updateData', function(event){
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
	})
})
//loadData Method (All records)
function loadData(){
	$.ajax({
			url: 'controller.php',
			method: 'get',
			dataType: 'json',
			data: {records:1},
			success: function(response){
				if (response.status == 'success') {
					$('#dataTable').html(response.html);
				}
			}

	});
}

// Select Where (Update and Delete)
 $(document).ready(function(){
	  			$(document).on('click', '#action', function(event){ 
	  				event.preventDefault();
	  				var $anchor = $(event.target);
	  				var id = $anchor.attr('data-id');
	  				var actionName = $anchor.attr('id');
	  				// console.log(id+actionName);
	  				$.ajax({
	  						url: 'controller.php',
	  						method: 'POST',
	  						data:{actionName:actionName,user_id:id},
	  						success:function(data){
	  							$('#saveData').hide();
	  							
	  							if(data=="delete"){
	  								console.log('Deleted successfuly');
	  								$('#updateData').hide();
	  								$('#saveData').show();
	  							}
	  							else{
	  								$('#select_where').html(data);
	  							}
	  							loadData();
	  						}
	  				});
				});

				// Form Hide and Show
				$(document).on('click', '#cancel', function(){
					$('#updateData').hide();
					$('#saveData').show();
				});
  });

  