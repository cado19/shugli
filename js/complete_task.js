$(document).ready(function(){
	$('.completed').click(function(){
		const id = $(this).attr('data-task-id');
		// console.log(id);
		$.post("php/complete.php", 
			{
				id: id
			},
			(data) => {
				console.log(data);
				if(data != "error"){
					const title = $(this).next();
					if(data == "1"){
						title.removeClass('completed');
					}else {
						title.addClass('completed');
					}
				}
			}
		);
	});
});
