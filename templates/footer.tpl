{if $isAdmin and $web_settings}

<footer class="bg-light text-center text-lg-start">
<div style="display:flex; padding:20px; flex-direction: row; flex-wrap: wrap; justify-content:space-around">

    {foreach from=$web_settings item=web_setting}
          
          {if $web_setting.footer_link_1}
              <div style="padding:10px; width: {$web_setting.footer_link_width_1}">
                <a href="$web_setting.footer_link_1" class="text-dark">
                    {if $web_setting.footer_link_text_1}
                        {$web_setting.footer_link_text_1}
                    {else}
                        {$web_setting.footer_link_1}
                    {/if}
                </a>
              </div>
          {/if}

          {if $web_setting.footer_link_2 }
              <div style="padding:10px; width: {$web_setting.footer_link_width_2}">
                <a href="$web_setting.footer_link_2" class="text-dark">{if $web_setting.footer_link_text_2}{$web_setting.footer_link_text_2}{else}{$web_setting.footer_link_2}{/if}</a>
              </div>
          {/if}
          
          {if $web_setting.footer_link_3 }
              <div style="padding:10px; width: {$web_setting.footer_link_width_3}">
                <a href="$web_setting.footer_link_3" class="text-dark">{if $web_setting.footer_link_text_3}{$web_setting.footer_link_text_3}{else}{$web_setting.footer_link_3}{/if}</a>
              </div>
          {/if}
          
          {if $web_setting.footer_link_4 }
              <div style="padding:10px; width: {$web_setting.footer_link_width_4}">
                <a href="$web_setting.footer_link_4" class="text-dark">{if $web_setting.footer_link_text_4}{$web_setting.footer_link_text_4}{else}{$web_setting.footer_link_4}{/if}</a>
              </div>
          {/if}
          
          {if $web_setting.footer_link_5 }
              <div style="padding:10px; width: {$web_setting.footer_link_width_5}">
                <a href="$web_setting.footer_link_5" class="text-dark">{if $web_setting.footer_link_text_5}{$web_setting.footer_link_text_5}{else}{$web_setting.footer_link_5}{/if}</a>
              </div>
          {/if}
          
          {if $web_setting.footer_link_6 }
              <div style="padding:10px; width: {$web_setting.footer_link_width_6}">
                <a href="$web_setting.footer_link_6" class="text-dark">{if $web_setting.footer_link_text_6}{$web_setting.footer_link_text_6}{else}{$web_setting.footer_link_6}{/if}</a>
              </div>
          {/if}
          
          {if $web_setting.footer_link_7 }
              <div style="padding:10px; width: {$web_setting.footer_link_width_7}">
                <a href="$web_setting.footer_link_7" class="text-dark">{if $web_setting.footer_link_text_7}{$web_setting.footer_link_text_7}{else}{$web_setting.footer_link_7}{/if}</a>
              </div>
          {/if}
          
          {if $web_setting.footer_link_8}
              <div style="padding:10px; width: {$web_setting.footer_link_width_8}">
                <a href="$web_setting.footer_link_8" class="text-dark">{if $web_setting.footer_link_text_8}{$web_setting.footer_link_text_8}{else}{$web_setting.footer_link_8}{/if}</a>
              </div>
          {/if}

    {/foreach}

 </div>
 
 <a class="btn btn-outline-secondary" style="margin-bottom:2%" href="http://{$website}/settings" role="button">Edit Footer</a>
 </footer>
 {/if}
 
 <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
   
      <li class="nav-item"><a href="http://{$website}/privacy" class="nav-link px-2 text-muted">Privacy</a></li>
          <li class="nav-item"><a href="http://{$website}/terms_condition" class="nav-link px-2 text-muted">Terms and Conditions</a></li>
  
    </ul>
    {if !$isAdmin}<p class="text-center text-muted">© {$year} www.{$website}</p>{/if}

    {if $isAdmin && $loading_time}<span class="nav-link badge badge-primary badge-pill">Loaded in {$loading_time}</span>{/if}
  </footer>


</div>
</BODY>
</HTML>