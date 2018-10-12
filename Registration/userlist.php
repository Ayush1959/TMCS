<?php
session_start();
echo "Welcome " . $_SESSION['name1']. "<br>";
?>
<?php include 'includes/header.php';?>
<?php include 'includes/sidebar-user.php';?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php  echo "Welcome " . $_SESSION['name1']; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>User Name</th>
                                      <th>Type</th>
                                  </tr>
                              </thead>
                              <tbody>
<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$query = "select * FROM tbl_user";
$res = mysqli_query($con,$query);
while ($row = mysqli_fetch_array($res)) {
  echo '<tr>';
  echo "<td>";
  echo "<b>".$row['Name']. "</b>";
  echo "</td>";
  echo "<td>";
  echo "<b>".$row['Username']. "</b>";
  echo "</td>";
  echo "<td>";
  if (($row['Type']) == "edit") {
    echo "Editor";
    echo "</td>";
  }
  else {
    echo "Contributor";
    echo "</td>";
  }
  echo '</tr>';
}
 ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<?php include 'includes/footer.php';?>
