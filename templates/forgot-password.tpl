{include file="header.tpl" title="Recover Password"}

<div class="container">
<br>
<h3>Recover Password</h3>
<br>
    <form method="POST" action="forgot-password">    
            
            {if $message}
                 <div class="alert alert-{if $success}success{else}danger{/if}">{$message}</div>
            {/if}
            
            <div class="form-group">
               <label for="email">Email:</label>
               <input type="email" class="form-control" placeholder="Enter your email address" name="email" id="email" required>
            </div>
              <br>
            <button name="send_password_button" class="btn btn-default">Recover Password</button>
    </form>

</div>

{include file="footer.tpl"}