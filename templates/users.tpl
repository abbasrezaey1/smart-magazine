{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="title.tpl"}
{if $message}
        <div class="alert alert-{$type}">
           <strong>{$message}</strong>
        </div>
{/if}

{if $users}
    {foreach from=$users item=$user} 
    <div class="card" style="width: 100%; margin-top:1%">
             
          <div class="card-header">
              <div style="display:flex; flex-wrap: wrap;justify-content:space-between">
                    <div style="min-width:80%; display:flex; justify-content:space-between">
                        
                          <div style="width:35%">{if $user.name}{$user.name} {$user.last_name}{else}Unknown{/if}</div>
                          <div style="width:18%">
                              {if $user.country}{$user.country}{else}Unknown{/if}
                          </div>
                          <div  style="width:18%">
                             {if $user.gender}{$user.gender}{else}Unknown{/if}
                          </div>
                          <div  style="width:30%">
                             {$user.email}
                          </div>
                     
                    </div>
                    <div>
                      <form style="display:inline" action="" method="post">
                        <button name="delete_button" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </div>
              </div> 
          </div>
    </div>

    {/foreach}
{else} 
      <div class="card" style="max-width: 100%; margin-top:1%">
        <div class="card-header"><h5>No user yet</h5></div>
      </div>
    </div>
{/if}