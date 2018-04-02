function sendForm(form, url, id){
  $.ajax({                        
     type: "POST",                 
     url: url,                    
     data: $("#"+form).serialize(),
     success: function(data)            
     {
       $("#"+id).html(data);           
     }
  });
}

function charge(id, url){
  $("#"+id).load(url);
}

function gourl(url){
  self.location = url;
}