
//category portfolio
function subcatval(value)
{
   var id = value;
   $.ajax({
        url: "loadsubCat.php", 
        type: "POST", 
        dataType:"text",            
        data: {action : 'load_sub_cat', id: id},
        success: function(data) {
            $('#v-pills-'+value).html(data);  
        }
    });
}

function opensubmodel(value)
{
 var id = value;
 $('#modalopen-'+id).modal('show');
}

function submit_form(id)
{
    document.getElementById("id"+id).name = "id";
    document.getElementById("id"+id).id = "id";
    document.getElementById("id").value=id;
}
function updatesubcat(id)
{
    var id = id;
    var subcat = $('#subcat').val();
    var coin = $('#coin').val();
    var subcat_img = $('#subcat_img').val();
     $.ajax({
        url: "loadsubCat.php", 
        type: "POST", 
        dataType:"json",            
        data: {action : 'updatecat', id: id,subcat:subcat,coin:coin,subcat_img:subcat_img},
        success: function(data) {
            if(data.status == 1){
                 alert('Sub category updated successfully');
            }else{
                 alert("Update Failed");
            }
        }
     });
}

/*-------------------  category portfolio  -----------------------*/
jQuery(".filter-button").click(function(){

  var value = jQuery(this).attr('data-filter');  
  console.log(value);
  if(value == "")
  {
    jQuery('.filter').show('1000');  
  }
  else
  {
    jQuery(".filter").not('.'+value).hide('3000');
    jQuery('.filter').filter('.'+value).show('3000');   
  }

  if (jQuery(".filter-button").removeClass("active")) {
    jQuery(this).removeClass("active");
  } 
        
  jQuery(this).addClass("active");
});

