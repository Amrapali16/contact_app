 
  var count=2;

 $("#addEmail").click(function()
 {

   

   if(count<6)
   {

   
   var html='';

  html+='<div id="emailBox">';

  html+='<label  class="form-label">Email address '+count+'</label>';
  
  html+='<div class="input-group mb">';
  
  html+='<input type="email" name="uEmail[]" class="form-control"  placeholder="name@user.com">';
  
  html+='<button class="btn btn-info" type="button" id="removeEmail">-</button>';
  
  html+='</div>';

  html+='</div>';

  $('#emailAll').append(html);

  count++;

   }
   else
   {
     swal('limit over.max input fields allowed are 5');
   }

 });

 $(document).on('click','#removeEmail',function()
 {
    $(this).closest('#emailBox').remove();

    count--;
        
 });





