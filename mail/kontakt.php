<?php


  include "";        //yhendus andmebaasiga
  require "mail.php";
  $kinda_asja_kohta = $_GET['ID'];

   

  if($kindla_asja_kohta){
     $teema.='<label for="teade">Teema:</label><textarea class="question" readonly="readonly" name="teade" id="teade">Küsimus ';
     $teema.=$kindla_asja_kohta;
     $teema.=' kohta</textarea>'; 
 }



?>
<!DOCTYPE HTML>
<html lang="et" dir="ltr">
<head>
	<meta charset="UTF-8">
	<title>Maili saatmine</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
</head>
<body>
   <div class="kontakt_right">
<?php
if ($send==1){
	echo "<br><br><b class='bold'>Kiri saadetud!<br><br>Võtame peagi ühendust.</b>";
}
else
{
?>          
          <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="mail_form"> 
        <fieldset>
        <label for="name"> Nimi: </label><input type="text" placeholder="sisestage nimi" id="name" name="name" value="<?=$name?>" required>  
        <!--p class="form-hint">sisestage nimi, nt Leo</p-->
          <p class="warning"><?=$name_warning?></p>
        <label for="email"> E-post: </label><input placeholder="sisestage email"  type="email" id="email" name="email" value="<?=$email?>" required>
          <!--p class="form-hint">nt naide@gmail.com</p-->                        					
         <p class="warning"><?=$email_warning?></p>
         <?=$teema?>
        <label for="message">Teade:</label><textarea name="message" placeholder="sisestage teade"  id="message" type="text"  required><?php echo $message?></textarea>	
            <!--p class="form-hint">sisestage teade</p-->										
          <p class="warning"><?=$message_warning?></p>
          <input  name="email_send" id="email_send" type="submit" value="SAADA">	
          <input type="hidden" id="lang" name="language" value="est">										
         </fieldset>	
        </form>  <!--id="mail_form" end-->    
<?php
}
?>    
          </div>
	
</body>
</html>
