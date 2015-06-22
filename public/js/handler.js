/**
 * Created by Admin on 20/06/2015.
 */
$(document).ready(function(){
    $("select.form-control").change(function(){
        if($(this).val() == -1){
            $(this).parent().parent().next().attr('class','form-group');;
        }else{
            $(this).parent().parent().next().attr('class','form-group hide');
        }
    });
});
