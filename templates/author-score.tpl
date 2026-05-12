{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="miniheader.tpl" title=$title}

<center>{include file="title.tpl"}
{if $message}
        <div class="alert alert-success">
           <strong>{$message}</strong>
        </div>
{/if}

    <form method="POST" action="">
        
            <div class="form-group">
               <input type="text" style="text-align:center" placeholder= "Author Name" class="form-control form-control-lg" name="author" required>
            </div>
            <button name="shortenen" class="btn btn-primary btn-lg btn-block">Find Author</button>        
            <div class="form-group">
                <label for="output"></label>
               {if $short_link}<input type="text" style="text-align:center" class="form-control form-control-lg" value="{$short_link}" name="short_link" readonly required>{/if}
            </div>

    </form>
</center>

{$block1}