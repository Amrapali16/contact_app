 
  
  var count=2;

  $("#addMobile").click(function()
  {
 
    
 
    if(count1<6)
    {
 
    
    var html='';
 
   html+='<div id="mobileBox">';
 
   html+='<label  class="form-label">Mobile Number '+count+'</label>';
   
   html+='<div class="input-group mb">';
   
   html+='<input type="tel" name="u[Mobile]" class="form-control"  placeholder="XXXXXXXXXX">';
   
   html+='<button class="btn btn-info" type="button" id="removeMobile">-</button>';
   
   html+='</div>';
 
   html+='</div>';
 
   $('#mobileAll').append(html);
 
   count1++;
 
    }
    else
    {
      swal('limit over.max input fields allowed are 5');
    }
 
  });
 
  $(document).on('click','#removeMobile',function()
  {
     $(this).closest('#mobileBox').remove();

     count1--;
         
  });
 
 
 
 
 
 