{include file="header.tpl" title=$title}

<br>
    <form method="POST" action="register">
    <h3>Sign Up</h3>
            
            {if $message}
                <div class="alert alert-danger">{$message}</div>
            {/if}
            
            <div class="form-group">
               <label for="email">Email:</label>
               <input type="email" class="form-control" placeholder="Enter email address" name="email" id="email" required>
            </div>
            
            <div class="form-group">
               <label for="password">Password:</label>
               <input type="password" class="form-control" placeholder="Enter a password" name="password" id="password" required>
            </div>
    
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="agree_terms_of_service" required>
                <label class="form-check-label" for="agree_terms_of_service">I agree the <a href="#">terms of the service</a></label>
              </div>
              <br>
            <button name="singup_button" class="btn btn-default">Sign Up</button>
    </form>