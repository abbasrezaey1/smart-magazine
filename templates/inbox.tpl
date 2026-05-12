{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="title.tpl"}
{if $messages}
{foreach from=$messages item=$message} 
     <div class="card" style="max-width: 100%; margin-top:1%">
      <div class="card-header">
          <h5>{$message.name} - {$message.email} - Received from {$message.web_id}
                    
          </h5>
      </div>
      <div class="card-body">
        <p class="card-text">
            {$message.message}
        </p>
        
          <button name="delete_button" style="width:100px" class="btn btn-danger btn-sm">Delete</a>

      </div>
    
     </div>
{/foreach}
{else} 
      <div class="card" style="max-width: 100%; margin-top:1%">
        <div class="card-header"><h5>No new message yet</h5></div>
      </div>
    </div>
{/if}