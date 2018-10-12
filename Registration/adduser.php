<?php
session_start();
// echo "Welcome " . $_SESSION['name1']. "<br>";
?>
<?php include 'includes/header.php';?>
<?php include 'includes/sidebar-user.php';?>
<body>
  <div id="page-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Add User</h1>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-8">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <?php  echo "Welcome " . $_SESSION['name1']; ?>
                          </div>

    <!-- <div class="container"> -->
    <!-- <p><b>Signup Form</b></p><br> -->
    <form id="signup_id" name="signup" action="adduser-action.php" method="post">
      <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
      <!-- <br> -->
      <div class="form-group">
      <label for="usr">User Name:</label>
      <input type="text" class="form-control" id="usr" name="username" required>
    </div>
      <!-- <br> -->
      <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" name="email" required>
    </div>
      <!-- <br> -->
      <div class="form-group">
      <label for="nbr">Number:</label>
      <input type="text" id="nbr" class="form-control" name="number">
    </div>
      <!-- <br> -->
      <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password" required>
    </div>
      <!-- <br><br> -->
      <div class="form-group">
      <label for="dd1">User Type:</label>
      <select name="dd1" id="dd1" class="form-control" required>
        <option value="">Select Type</option>
        <option value="edit">Editor</option>
        <option value="cont">Contributor</option>
        </select>
      </div>
      <!-- <br> -->
      <button type="submit" class="btn btn-default">Submit</button>
      <!-- <input type="submit" name="submit" value="Submit"> -->
      <!-- <br><br><br> -->
    </form>
  <!-- </div> -->
</div>
</div>
</div>
</div>
  </body>
  </html>
