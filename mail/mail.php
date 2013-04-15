<?php
  include "";      //ühendus andebaasiga
  function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data; 
} 

  
   
if (isset($_POST['email_send'])){

     $send=0;
     $name = check_input($_POST['name']);
     $email = check_input($_POST['email']); 
     $teade = check_input($_POST['teade']);        
   // $title = $_POST['title'];
     $message =check_input( $_POST['message']); 
      $language = $_POST['language']; 

   
   if (preg_match("/^[0-9]+$/",$name))
    {
         switch($language){
            case 'en':
                $name_warning="Name only consists of numbers";    
                 break;
            case 'ru':
                $name_warning="Название состоит из номеров";  
                 break;
            default: 
                $name_warning="Nimi koosneb numbritest";
                break;
         }
   
    }
    elseif (preg_match("/^[A-z]{1}$/",$name) )
    {
     switch($language){
            case 'en':
                $name_warning="Name has less than two letters";  
                 break;
            case 'ru':
                $name_warning="В названии меньше двух символов";
                 break;
            default: 
                $name_warning="Nimi on vähem kui kaks tähte";
                break;
         }
     
    }
    
   elseif (empty($name))
    {
         switch($language){
            case 'en':
                $name_warning="Name field can't be empty";  
                 break;
            case 'ru':
               $name_warning="Поле пустое";
                 break;
            default: 
                $name_warning="Väli on tühi";
                break;
         }
       
    }
    elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
    {
      switch($language){
            case 'en':
                $email_warning="Email format isn't correct";  
                 break;
            case 'ru':
                $email_warning="Ошибка в поле почты"; 
                 break;
            default: 
                $email_warning="Emailis viga";
                break;
         }
     
    } 
    elseif (empty($message)){
      switch($language){
            case 'en':
                $message_warning="Message field can't be empty";  
                 break;
            case 'ru':
                $message_warning="Поле пустое";
                 break;
            default: 
                $message_warning="Väli on tühi";
                break;
         }
          
    }
    elseif (is_numeric($message)){
       switch($language){
            case 'en':
                $message_warning="Message only consists of numbers";  
                 break;
            case 'ru':
                $message_warning="Название состоит из номеров";
                 break;
            default: 
                $message_warning="Teade koosneb ainult numbritest";
                break;
         }
       
    } 
    elseif (preg_match("/^[A-z]{1,4}+$/",$message) )
    {
     switch($language){
            case 'eng':
               $message_warning="Message has less than five letters";  
                 break;
             case 'ru':
                $message_warning="В названии меньше 5 символов";
              break;
            default: 
                $message_warning="Teates on vähem kui viis tähte";
                break;
         }
     
    }
    else{
        $send=1;
        
        $Msg = $message;	
  		$Nimi = $name;	
  		$Epost = $email;
  		$Teade = $teade;
      
  		
       if ($language === 'est') {
        
  		$Kiri = "Tere!<br>
    		<ul>
      		".$Teade."
    		</ul>  
    		".$Msg."	<br><br>
    		
      		Lugupidamisega <br>
      		".$Nimi."<br>
      		".$Epost." <br>  			
  		";	        
        	   

       }
       
       if ($language === 'ru'){
        
  		$Kiri = "Добрый день!<br>
    		<ul>
      		".$Teade."
      		
    		</ul>  
    		".$Msg."	<br><br>
    		
      		С уважением  <br>
      		".$Nimi."<br>
      		".$Epost." <br> ";	        
        	  
       }
            if ($language === 'en'){
        
  		$Kiri = "Hi ,<br>
    		<ul>
      		".$Teade." 
    		</ul>  
    		".$Msg."	<br><br>
    		
      		All the best, <br>
      		".$Nimi."<br>
      		".$Epost." <br> ";	        
        	  
       }
        
       $subject=".......";
		$header="Content-type: text/html; charset=UTF-8 \r\n"; 
		$header.="From: $Epost \r\n";
		$header.="Subject: $subject \r\n";  
		
		mail("........", $subject, $Kiri, $header);	    
    } 
  
   

  
} 
?>
