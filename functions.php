<?php
  include "..";  //yhendus andmebaasiga
 //vt ka rida 9 
  
  
   
  function nextid( $field=0, $table=0 )     
	        {
	              include "..";        //yhendus anmebaasiga
	              $query=mysql_query('SELECT max('.$field.') as nextid from '.$table.'');
	            
	                 if( $query)  //kui suurim id on teada, siis
	                  {      $row = mysql_fetch_array( $query ); //  muutuja rida võrdub vastava päringu tulemusega
	                          return $row['nextid'] + 1;       // ning tagasta muutuja rea väärtus ühe võrra suuremana
	                  }
	        }
	        

    function cleanup($text = null)
 {	if (isset ($text))
	{ 
		return addslashes(strip_tags($text));
	}
 }   
 function dot_instead_comma($s_arv=null)
  { if (isset ($s_arv))
              $pattern = '/\,/i';
              $replacement = '.';
           return preg_replace($pattern,$replacement, $s_arv);
  
  }
 function number($data){
         
           if (empty($data)){
                $error = '<p class="er-msg">Väli on täitmata!</p>';
                 
               
                
           }
           if (!empty($data)){
               
                 if (!is_numeric($data)){
                $error = '<p class="er-msg">Ei ole number!</p>';
               
                } 
           }
             return $error;

           }
           
   function valik($data){
          if (empty($data)){
                $error = '<p class="er-msg">Väli valimata!</p>';     
           }  
            return $error;
    } 
    
    function tekst($data){
         
          if(empty($data)){
               $error = '<p class="er-msg">Väli täitmata!</p>';     
         } 
           
          if (!empty($data)){
            
              if(is_numeric($data)){
                   $error = '<p class="er-msg">Väli koosneb ainult numbritest!</p>';   
               }
                if(!is_numeric($data)){
                  if(strlen($data)< 2){
                    $error = '<p class="er-msg">Rohkem kui täht, palun!</p>';   
                }   
                }   
                    
           }     
            return $error;
    } 
    
     function tyhi($data){
        
          if (!empty($data)){
            
              if(is_numeric($data)){
                   $error = '<p class="er-msg">Väli koosneb ainult numbritest!</p>';   
               }
                if(!is_numeric($data)){
                  if(strlen($data)< 2){
                    $error = '<p class="er-msg">Rohkem kui täht, palun!</p>';   
                }   
                }   
                    
           }     
            return $error;
    } 
    function kuu_nimi ($kuu){
               $patterns = array('/\January/i','/\February/i','/\March/i','/\April/i','/\May/i','/\June/i','/\July/i','/\October/i','/\December/i'); 
          $replacements = array('Jaanuar','Veebruar', 'Märts','Aprill','Mai','Juuni','Juuli','Oktoober','Detsember');
         $Kuu_nimi =preg_replace($patterns,$replacements,$kuu); 
           return $Kuu_nimi;
    }
    
    function kuu_number($kuu){
         $patterns = array('/^1$/i','/ ^2$/i','/ ^3$/i','/ ^4$/i','/ ^5$/i','/ ^6/i','/ ^7/i','/ ^8$/i','/ ^9$/i','/10$/i','/11$/i','/12/i'); 
          $replacements = array('jaanuar','veebruar', 'märts','aprill','mai','juuni','juuli','august','september','oktoober','november','detsember');
         $Kuu_nimi =preg_replace($patterns,$replacements,$kuu);
             return $Kuu_nimi;
    
    }


?>
