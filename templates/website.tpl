{include file="header.tpl" title=$title}

{if $isAdmin}

    <a class="btn btn-outline-secondary" id="settings_index_top" href="http://{$website}/settings" role="button">Settings</a>

{/if}
{include file="navbar.tpl"}

{foreach from=$articles item=article}
    {if $article.published and !$article.rejected}
        <div class="card" style="max-width: 100%; margin-bottom:2%">
          <div class="card-header">
              <h4>
                  {$article.title}
              </h4>
          </div>
          <div class="card-body">
            <a  href="http://{$website}/{$article.url}" class="btn btn-primary">
                View Article
            </a>
          </div>
        </div>
    {/if}
{/foreach}
{include file="footer.tpl"}
 