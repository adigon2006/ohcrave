/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 $(document).ready(function(e) {
 $('.addplanimage').each(function(index, element) {
 $(".addplanimage:eq("+index+")").click(function(e) {
 
 planid = $('.planid:eq('+index+')').val();
 $.post('../snippets/initializeplanid.php',{'planid':planid},function(){});   
});
    
});   
});


