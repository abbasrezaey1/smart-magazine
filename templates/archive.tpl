{include file="header.tpl" title=$title}

{if $isAdmin}

    <a class="btn btn-outline-secondary" id="settings_index_top" href="http://{$website}/settings" role="button">Settings</a>

{/if}
{include file="navbar.tpl"}
 
    <span style="font-weight:bold; color:gray; margin-top:-30px; margin-bottom:15px" class="btn btn-grey">Vol. 1, Issue 1, May 2023</span>

{foreach from=$articles item=article}
    {if $article.published and !$article.rejected}
        <div class="card" style="max-width: 100%; margin-bottom:2%">
          <div class="card-header">
              <h5>
               <a  href="http://{$website}/{$article.url}" >   {$article.title}  </a>
              </h5>
          </div>

        </div>
    {/if}
{/foreach}
{include file="footer.tpl"}
 