<?php
 
  function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data; 
} 

 
   


 
     $name = check_input($_POST['name']);
     $email = check_input($_POST['email']); 
     $message =check_input( $_POST['message']); 
     $send=0;

   
   if (preg_match("/^[0-9]+$/",$name))
    {
        
                $name_warning="Nimi koosneb ainult numbritest";
              
         
   
    }
    elseif (preg_match("/^[A-z]{1}$/",$name) )
    {
    
                $name_warning="Nimi on vähem kui kaks tähte";
         
     
    }
    
   elseif (empty($name))
    {
        
                $name_warning="Väli on tühi";
             
         
       
    }
    elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
    {
    
           
                $email_warning="Emailis viga";
               
         
     
    } 
    elseif (empty($message)){
      
                $message_warning="Väli on tühi";
               
         
          
    }
    elseif (is_numeric($message)){
       
                $message_warning="Teade koosneb ainult numbritest";
            
         
       
    } 
    elseif (preg_match("/^[A-z]{1,4}+$/",$message) )
    {
     
                $message_warning="Teates on vähem kui viis tähte";
             
     
    }
    else{
       
        
        $Msg = $message;	
  		$Nimi = $name;	
  		$Epost = $email;
  		
     
        
  		$Kiri = "Tere!<br>
    		 
    		".$Msg."	<br><br>
    		
      		Lugupidamisega <br>
      		".$Nimi."<br>
      		".$Epost." <br>  			
  		";	        
        	   

      
        
       $subject="...........................";
		$header="Content-type: text/html; charset=UTF-8 \r\n";
		$header.="From: $Epost \r\n";
		$header.="Subject: $subject \r\n";  
		$send = 1;
     echo json_encode($send);
		mail("...............................", $subject, $Kiri, $header);
			 
      
    }  
  
   

  

?>
