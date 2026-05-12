{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="title.tpl"}
   
   
   <h5>Visitors Country:</h5>
                    {foreach from=$countries item=$country}
                        <li>
                            <small>{$country.label}: {$country.nb_visits} visits</small>
                        </li>
                    {/foreach}
                    <br>
                    
               <h5>Visited Pages:</h5>  
                   {foreach from=$pages item=$page}
                        <li>
                                    <small>{$page.label}: {$page.nb_visits} visits - Bounce Rate: {$page.bounce_rate} {if $page.entry_nb_actions}-{$page.entry_nb_actions} actions{/if} </small>
                        </li>
                    {/foreach}
                       <br>
            
                <h5>Visitors Devices:</h5>    
                    {foreach from=$devices item=$device}
                    {if $device.nb_visits} 
                        <li>
                                    <small>{$device.label}: {$device.nb_visits} visits</small>
                        </li>
                    {/if}
                    {/foreach}
                       <br>
                       
                    <h5>Visitors Browser:</h5>
                    {foreach from=$browsers item=$browser}
                        <li>
                                    <small>{$browser.label}: {$browser.nb_visits} visits</small>
                        </li>
                    {/foreach}
                       <br>
                       
                    <h5>Visitors Language:</h5>
                    {foreach from=$languages item=$language}
                        <li>
                                    <small>{$language.label}: {$language.nb_visits} visits</small>
                        </li>
                    {/foreach}
                       <br>
                       
                    <h5>Visitors Duration:</h5>
                    {foreach from=$visit_durations item=$visit_duration}
                        <li>
                                <small>{$visit_duration.label}: {$visit_duration.nb_visits} visits</small>
                        </li>
                    {/foreach}
                    