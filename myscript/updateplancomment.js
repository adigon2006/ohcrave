// JavaScript Document
$(document).ready(function(e) {
$('.updatecomment').each(function(index, element) {
$(this).click(function(e) {
theindexval = $('.indexval:eq('+index+')').val();
thecommentupdate = $('.updatevalue:eq('+index+')');
$('.theplancomment:eq('+theindexval+')').html(thecommeentupdate);    
});
    
});   
});