{include file="header.tpl" title=$title}

<div class="container">
  
  <div class="mx-auto" style="margin-top:50px; margin-bottom:20px; width: 200px;">
              <h3>Admin Login</h3>
  </div>
  
<form method="POST" action="validate">
  
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="username" id="username" name="username" class="form-control" />
    <label class="form-label" for="username">User Name</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="password" name="password" class="form-control" />
    <label class="form-label" for="password">Password</label>
  </div>

  <!-- Submit button -->
  <input type="submit" name='submitbutton' class="btn btn-primary btn-block mb-4" value='Sign in'>
  
  <div class="clearfix">
        <a href="forgot-password" class="float-sm-left">Forgot Password?</a>
  </div>    
    <p class="text-center">
    <a href="register">Create an Account</a>
    </p>
</form>
</div>