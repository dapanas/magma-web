var url_c = 'content/shop/cart-controller.php?';

function add_p(id){

   
   // titulo producto
   var texto = encodeURI($('h1').html());
   var size= $('#size').val();
   console.log(size);
   if (size == '-1') {
    alert("Please Select Size")
    return false;
    }
   var precio= $('.price').html();
   precio =  encodeURI( parseFloat(precio.replace(",",".")));

   
    $.get(url_c+'op=add&idd='+id+'&articulo='+texto+'&talla='+size+'&precio='+precio, function(data) {
          if (data > 0){
                var div =     $('div.mybag');
                
                div.fadeTo('slow', 0, function() {
                $('a[href="mybag"]',div).html("MY BAG: "+data+" ");    
                div.fadeTo('slow',10);
                });  
                
          }
          else       alert("Please try again");
          
    });
}

function update_counter(){
   
  $.get(url_c+'op=total_products',function(data){
                div.fadeTo('slow', 0, function() {
                $('a[href="mybag"]',div).html("MY BAG: "+data+" ");    
                div.fadeTo('slow',10);
                });  
                });
}


function update_p(id,qty){
 if (parseInt(qty)>0) $.get(url_c+'op=update&qty='+qty+'&rid='+id);

}
// UI

$(document).ready(function(){


});