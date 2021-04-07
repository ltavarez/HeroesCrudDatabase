$(document).ready(function(){

   $(".btn-delete").on("click",function(){
    
    let id = $(this).data("id");

    if(confirm("Esta seguro que desea eliminar a esta compañia?")){

        if(id !== null && id !== undefined && id !== "" ){
            window.location.href = "delete.php?id=" + id;            
        }        

    }
    
   });
    
   

});