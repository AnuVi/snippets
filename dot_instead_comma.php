// 5,3 asemel 5.3
// 5,3 asemel 5.3

function dot_instead_comma($num = null)
  { if (isset ($num))
              $pattern = '/\,/i';
              $replacement = '.';
           return preg_replace($pattern,$replacement, $num);
  
  }