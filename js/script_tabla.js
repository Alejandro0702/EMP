/*$("#tabla tr").click(function(){
    $(this).addClass('selected').siblings().removeClass('selected');   
    //var value=$(this).find('td:first').html();
 });
 
 $('#i_Eliminar').on('click', function(e){
    let usr = $("#tabla tr.selected td:first-child").html();
 });
*/
 $("#tabla tbody").on('click', 'tr',function(){
   $(this).addClass('selected').siblings().removeClass('selected');
});
