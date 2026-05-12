
{include file="header.tpl" title=$message}

<br>
<div class="alert alert-{if $success}success{else}danger{/if}" role="alert">
    {$message}
</div>