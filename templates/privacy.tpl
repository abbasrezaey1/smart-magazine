{include file="header.tpl" title=$title}
{include file="navbar.tpl"}

    {if $msg}
        <div class="alert alert-success">
           <strong>{$msg}</strong>
        </div>
    {/if}
{include file="title.tpl"}
{if $body}
{$body}
{/if}
<br><br>
{if $isAdmin}
    <form method="post" action="">
        <button name="edit_button" type="submit" class="btn btn-primary">Edit</button>
    </form>
{/if}
{include file="footer.tpl"}