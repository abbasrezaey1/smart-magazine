{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="title.tpl"}
{if $message}
        <div class="alert alert-{$type}">
           <strong>{$message}</strong>
        </div>
{/if}
<form style="margin-top:-20px" method ="post" action="">
        <div style="display:flex; height: 100px; align-items:center; flex-wrap: wrap;justify-content:space-between">
                <div style="display:flex;  min-width:84%; justify-content:space-between">
                    <div style="width:48%">
                        <input type="text" name="web_id"  class="form-control" placeholder="Domain: abc-cbd.com">
                    </div>
                    <div style="width:48%">
                        <input type="text" name="name" class="form-control" placeholder="Website title: Wiki Energy">
                    </div>
                </div>
                <div>
                    <input name="add_button" type="submit" id="last" class="form-control btn btn-primary" value="Add Website">
                </div>
        </div>
</form>

{if $websites}
    {foreach from=$websites item=$website} 
    <div class="card" style="width: 100%; margin-top:1%">
             
          <div class="card-header">
              <div style="display:flex; flex-wrap: wrap;justify-content:space-between">
                    <div style="min-width:80%">
                        <h5>
                          {if $website.name}{$website.name} -{/if}
                          <a href="{$base_url}/{$website.web_no}">{$website.web_id}</a>
                       </h5>
                    </div>
                    <div>
                        
                      <a href="{$base_url}/{$website.web_no}/visitors" class="btn btn-primary btn-sm">Visitors</a>
                               &nbsp; &nbsp; &nbsp; 
                      <form style="display:inline" action="" method="post">
                        <button name="delete_button" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                      <a href="{$base_url}/{$website.web_no}/settings" class="btn btn-primary btn-sm">Settings</a>
                    </div>
              </div> 
          </div>
    </div>

    {/foreach}
{else} 
      <div class="card" style="max-width: 100%; margin-top:1%">
        <div class="card-header"><h5>No websites yet</h5></div>
      </div>
    </div>
{/if}