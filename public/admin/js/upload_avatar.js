$(document).ready(function(){
      $('input[type=file]').change(function(){        
         try{
            // var name = $('input[type=file]')[0].files[0].name;
            // var img = $('input[type=file]').val();   
            // $('#choose_file').text(name);
            readURL(this);
         }catch(err){
            $('#choose_file').text('Choose file');
            $("img[alt='avatar']").attr("src","//placehold.it/150/");
         }        
      });
      function readURL(input){
         if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
               $("img[alt='avatar']").attr("src",e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
         }
      }
   });