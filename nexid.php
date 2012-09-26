//to get nexid of the field

function nextid( $field=0, $table=0 )     
	        {
	              include "dbconnect.php";    
	              $query=mysql_query('SELECT max('.$field.') as nextid from '.$table.'');
	            
	                 if( $query)  //kui suurim id on teada, siis
	                  {      $row = mysql_fetch_array( $query );
	                          return $row['nextid'] + 1;       
	                  }
	        }