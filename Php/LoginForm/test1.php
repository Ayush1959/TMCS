<?php
echo "<form method='post'>
  <input type='submit' name='back' value='Go Back'>
  </form>";
  if( isset( $_REQUEST['back'] ))
  {
  // echo "string";
  header('Location:form.php');
  exit;
}
 ?>
