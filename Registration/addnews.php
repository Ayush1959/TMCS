<?php
session_start();
echo "Welcome " . $_SESSION['name1']. "<br>";
?>
<?php include 'includes/header.php';?>
<?php include 'includes/sidebar-user.php';?>
<body>
  <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Add News</h1>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-8">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <?php  echo "Welcome " . $_SESSION['name1']; ?>
                          </div>
                          <!-- <div class="panel-body">
                              <ul class="timeline">   -->
    <form id="signup_id" name="signup" action="addnews-action.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
      <label for="head">Heading:</label>
      <input type="text" class="form-control" id="head" name="name" required>
    </div>
    <div class="form-group">
    <label for="desc">Description : </label>
    <textarea name="description" class="form-control" id="desc" required></textarea>
    <!-- <input type="text" id="desc" name="description" required> -->
  </div>
  <div class="form-group">
  <label for="fileToUpload">Select image to upload:</label>
      <!-- Select image to upload: -->
      <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
      <!-- <input type="submit" name="submit" value="Submit"> -->
    </form>
  </div>
</div>
</div>
</div>
  </body>
  </html>
