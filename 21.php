<?php
function PrintNum($x=1)
{
  global $z,$w;
  for ($i=1; $i <= $x ; $i++) {

    for ($j=1; $j <= $i ; $j++) {
      if($j<$i){
            echo $j;
      }
      else{
        echo $j."</br>";
      }


    }
  }
}
PrintNum(5)

 ?>
