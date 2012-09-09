<?php
// grouped by 3 if the price has more than 4 characters

//hindades grupeeriks 3-kaupa kui on vähemalt viiekohaline arv


   function price_space($string1) {
      
   	$s=strlen($string1);
   	if ($s>4)
   	{
  		return preg_replace('/(?=(([0-9]{3})*)$)/',' ', $string1);
   	}        
    	else 
   	{
     		return $string1;
   	}
   }  




?>
//proov
