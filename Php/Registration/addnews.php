<?php
session_start();
echo "Welcome " . $_SESSION['name1']. "<br>";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Form </title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
          <a href="dashboard.php">Dashboard</a>
        </div>
        <div class="col-lg-2">
          <a href="logout.php">Logout</a>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
    <p><b>Add News</b></p>
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
  </body>
  </html>
