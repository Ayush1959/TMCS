<?php
session_start();
// echo "Welcome " . $_SESSION['name1']. "<br>";
// print_r($_SESSION)
?>
<?php include 'includes/header.php';?>
<?php include 'includes/sidebar-user.php';?>
<body>
  <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">News List</h1>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-8">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <?php  echo "Welcome " . $_SESSION['name1']; ?>
                          </div>
                          <div class="panel-body">
                              <ul class="timeline">
<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$query = "select * FROM tbl_news";
$res = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($res)) {
  echo '<li>';
  echo '<div class="timeline-panel">';
  echo '<div class="timeline-heading">';
  echo '<h4 class="timeline-title">';
  echo "<b>".$row['Heading']. "</b>";
  echo '</h4>';
  echo '</div>';
  // echo "&nbsp";
  if (("Admin" == $_SESSION["username1"]) & ($_SESSION["password"] == $_SESSION["password1"])) {
    echo '<div class="col-lg-2">';
    echo "<a href='view.php?id=".$row['Id']."'> View &nbsp </a>";
    echo '</div>';
    echo '<div class="col-lg-2">';
    echo "<a href='edit.php?id=".$row['Id']."'> Edit &nbsp </a>";
    echo '</div>';
    echo '<div class="col-lg-2">';
    echo "<a href='delete.php?id=".$row['Id']."'> Delete &nbsp </a>";
    // echo '</div>';
    // echo "<br>";
  }
  if (($_SESSION["username1"] == $_SESSION["username2"]) & ("edit" == $_SESSION["type2"])) {
    // echo '<div class="col-lg-2">';
    echo "<a href='view.php?id=".$row['Id']."'> View &nbsp </a>";
    // echo '</div>';
    // echo '<div class="col-lg-2">';
    echo "<a href='edit.php?id=".$row['Id']."'> Edit &nbsp </a>";
    // echo '</div>';
  }
  if (($_SESSION["username1"] == $_SESSION["username2"]) & ("cont" == $_SESSION["type2"])) {
    // echo '<div class="col-lg-2">';
    echo "<a href='view.php?id=".$row['Id']."'> View &nbsp </a>";
    // echo '</div>';
  }
  echo '</div>';
  echo '</li>';
  // echo '</div>';
  echo "<br>";
}

 ?>
</ul>
</div>
</div>
</div>
</div>
</div>


<?php include 'includes/footer.php';?>
