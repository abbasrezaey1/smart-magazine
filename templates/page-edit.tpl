{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{if $message}
    <div class="alert alert-success">
        <strong>{$message}</strong>
    </div>
{/if}
{include file="title.tpl"}    
    <form method="POST" action="">
            <div class="form-group">
                <textarea class="form-control" rows="8" name="content" placeholder="Enter content" id="content" required>{if $body}{$body}{else}This is {$title} page of the website. You still did not set any content in this page. You can edit this page and add any HTML content here.{/if}</textarea>
            </div>
            <button name="save_button" class="btn btn-default">Save</button>
    </form>
{include file="footer.tpl"}
 