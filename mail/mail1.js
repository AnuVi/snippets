google.load("jquery", "1.7.0")
google.setOnLoadCallback (function(){
  
 
 if( $.support.placeholder == undefined )
  {
    $.support.placeholder = false;
    var test = document.createElement('input');
    if( 'placeholder' in test ) $.support.placeholder = true;
  }
  if( !$.support.placeholder )
  {
    $('[placeholder]').val(function() {
    if( $.trim( $( this ).val() ) == '' )
      return $( this ).attr('placeholder');
    else
    return $( this ).val();
    }).click(function() {
      var self = $( this );
      if( self.val() == self.attr('placeholder') ) self.val('');
      }).blur(function() {
      var self = $( this );
      if( self.val() == '') self.val( self.attr('placeholder') );
    });
  }  
  
 

  //$(function(){  
// teate saatmise kotnroll
  var  name = $('#name'),
  		 language=$('#lang').val(),
     	 email = $('#email'),
    		message = $('#message'),
   		 majaID = $('#majaID'),
   		 teade =  $('#teade'),
    	required = ["name", "email", "message"],
   		hasWarning=false;
    //veateated
  
    if( language==='est' ){
                
          var 	nameWarning ="Nimi puudu või vähem kui kaks tähte",
   			messageWarning = "Teade puudu või vähem kui neli tähte",
    		numberWarning = "Koosneb ainult numbritest",
    		emailWarning = "Email vales formaadis",
   			 emptyWarning= "Väli on tühi";
    
    }
    
    if( language==='ru' ){
                
          var 	nameWarning ="Поле пусто или меньше двух символов",
   			messageWarning = "Поле пусто или меньше 4 символов",
    		numberWarning = "Поле  состоит из номеров",
    		emailWarning = "Ошибка в поле почты",
   			 emptyWarning= "Поле пустоi";
    
    }
    
     if( language==='en' ){
                
          var 	nameWarning ="Empty field or it has less than 2 letters",
   			messageWarning = "Empty field or it has less than 4 letters",
    		numberWarning = "Only consists of numbers",
    		emailWarning = "Error in email",
   			 emptyWarning= "Empty field";
    
    }
    
     
  
	
	    $('#mail_form').submit(function(){
	          for (i=0;i<required.length;i++) {
			   var input = $('#'+required[i]);
			     if (input.val() == " "|| (input.val() == nameWarning)||(input.val() == messageWarning )|| (input.val() == numberWarning) || (input.val() == emailWarning) ) {
				    input.addClass("warning-message");
				   
				    return false;
			       } else {
			     	input.removeClass("warning-message");
			       }
		    }
		
		     
	    //kui nimi on tühi või vähem kui 2 tähte
	    	if (name==" " ||  name.val().length<2 || (name.val() == nameWarning)){
	    	 	      name.next('p').text(nameWarning).show();
	    	 	      name.addClass('warning-message');
	    	 	      //hasWarning=true;
	    	 			return false;	    	 
	    	 }
        //kui nimi koosneb ainult numbritest
           if (/^[0-9]+$/.test(name.val()) || (name.val() == numberWarning)){
	    	 	      name.next('p').text(numberWarning).show();
	    	 	      name.addClass('warning-message');
	    	 	      console.log(name.val());
	    	 	    
	    	 			  return false;	    	 
	    	    
	    	    }
        
		 //emaili kontroll

         if( !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test( email.val() ) || email==" " || (email.val() == emailWarning) ) { 
                       email.next('p').text(emailWarning).show();
	    	 	       email.addClass('warning-message');
	    	 			return false;
    }
	    	
	    //teade tühi või alla 5 
	   if(message==" " ||  message.val().length<5 || (message.val() == messageWarning)){
	    	 	      message.next('p').text(messageWarning).show();
	    	 	       message.addClass('warning-message');
	    	 			return false;	    	 
	    	 } 
	    	    //teade koosneb numbritest

	     if(/^[0-9]+$/.test(message.val()) || (message.val() == numberWarning)){
	    	 	      message.next('p').text(numberWarning).show();
	    	 	      console.log("jah");
	    	 	      message.addClass('warning-message');
	    	 			return false;	    	 
	    	 } 
	    	 
	    	
	     if (input.hasClass('warning-message')  ) {
			return false;
		} else {
/*	  var dataString = 'name='+ name.val() + '&email=' + email.val() + '&message=' + message.val();  
console.log(dataString); 
//return false;
$.ajax({  
  type: "POST",  
  url: "mail2.php",  
  data: dataString,  
  success: function() {  
    $('#mail_form').html("<div id='ok-teade'></div>");  
    $('#ok-teade').html("<p>Teie teade edastati.</br>Võtame peagi ühendust.</p>")  
    //.append("<p>Võtame peagi ühendust.</p>")  
  // .hide()  
  /*  .fadeIn(1500, function() {  
      $('#ok-teade').append("<img id='checkmark' src='images/check.png' />");  
    });   */
//  }  
//});  
//return false;
	input.removeClass('warning-message');
	return true;
		}
		   	
	   });
    // Puhastab väljad kui kasutaja klikib
	   $(":input").focus(function(){		
	   if ($(this).hasClass("warning-message")) {
			//$(this).val('');
			$(this).removeClass("warning-message");
            $(this).next('p.warning').hide();
	   }	 
	    
	    });	
 
});