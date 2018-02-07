// show the single plan image
$('.openimage').each(function(index, element) {
$('.openimage:eq('+index+')').click(function(e) {
//$('.openimage:eq('+index+')').attr("data-target","#planimagemodal"); 
planid = $('.planids:eq('+index+')').val();
$('.modal-title').html(planid);
   
});    
});


