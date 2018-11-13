<template>
  <div class="container">
    <form action="">
      <div class="form-group">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
              <div class="row">
                Email: <input type="text" name="email" id="email" class="form-control">
              </div>
              <div class="row">
                Password: <input type="password" name="password" id="password" class="form-control">
              </div>
              <div class="row">
                Age: <input type="text" name="age" id="age" class="form-control">
              </div>
              <div class="row">
                Message:<textarea name="message" id="message" cols="100" rows="5"></textarea>
              </div>
              <div class="row">
                <label for="sendmail">
                  <input type="checkbox" id="sendmail" value="SendMail"> Send Mail</label>
                <label for="sendInfomail">
                  <input type="checkbox" id="sendInfomail" value="SendInfoMail"> Send Infomail </label>                    
            </div>
            <div class="row">
              <label for="male">
                <input type="radio" id="male" value="Male"> Male</label>
              <label for="female">
                <input type="radio" id="female" value="Female"> Female </label>
            </div>
            <div class="row">
              <label for="priority">Priority</label>
              <select id="priority" class="form-control">
                <option></option>
                </select>
            </div>
            <hr>
            <div class="row">
              <button class="btn btn-primary">Submit! </button>
            </div>
        </div>
      </div>
    </form>
    <div class="row">
      <h4>Your Data</h4>
      <p>Mail:</p>
      <p>Password:</p>
      <p>Age:</p>
      <p>Message: </p>
      <p>Send Mail?</p>
      <ul>
        <li></li>
      </ul>
      <p>Gender:</p>
      <p>Priority:</p>
      <p>Switched:</p>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>
