var main = function(){
	$('#ok').hide();
	$('#campo_img').hide();
	$('#change').on('click',function(){
		if($(this).is(':checked')){
			$('#campo_img').show();
			$('#ok').show();
		}else{
			$('#campo_img').hide();
			$('#ok').hide();
		}
		
	});
};

main();