// to clean-up  input

  function cleanup($text = null)
 {	
 	if (isset ($text))
	{ 
		return addslashes(strip_tags($text));
	}
 }  