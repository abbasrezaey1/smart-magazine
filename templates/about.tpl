{include file="header.tpl" title=$title}
{include file="navbar.tpl"}

    {if $msg}
        <div class="alert alert-success">
           <strong>{$msg}</strong>
        </div>
    {/if}
{include file="title.tpl"}
{if isset($website_settings.about) && $website_settings.about}
    {$website_settings.about}
{else}
  This is {$title} page of the website. You still did not set any content in this page. You can edit this page and add any HTML content here.
{/if}
<br><br>
{if $isAdmin}
    <form method="post" action="">
        <button name="edit_button" type="submit" class="btn btn-primary">Edit</button>
    </form>
{/if} 
{include file="footer.tpl"}
 