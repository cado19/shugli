$(document).ready(function(){
	$('.remove-task').click(function(){
		const id = $(this).attr('id');
		$.post("php/remove.php",
			{
				id: id
			},
			(data) => {
				if(data){
					$(this).parent().parent().hide(600);
				}
			}
		);
	});

	
});