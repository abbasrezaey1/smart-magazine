{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="title.tpl"}


    {if $message}
        <div class="alert alert-success">
           <strong>{$message}</strong>
        </div>
    {/if}
    <form method="POST" action="">
        
            <div class="form-group">
                <label for="input" type="number"><h5>{$first|capitalize}</h5></label>
               <input type="text" class="form-control form-control-lg"  value="{if $input}{$input}{/if}" name="input" required>
            </div>
            
            <div class="form-group">
                <label for="output"><h5>{$second|capitalize}</h5></label>
               <input type="text" class="form-control form-control-lg" value="{if $output}{$input} {$first|capitalize} = {$output} {$second|capitalize}{/if}" name="output" readonly required>
            </div>
            
            <button name="send_button" class="btn btn-primary btn-lg btn-block">Convert</button>
            
            
    </form>
    
    <h6><span class="btn btn-warning btn-sm">Formula</span> Didive the energy value by {$ratio}</h6>
    
    {foreach from=$converters item=$converter}
        <a  class="btn btn-primary btn m-1" href="{$base_url}/{$converter}/convert">{$converter|replace:'-':' '|capitalize}</a> 
    {/foreach}