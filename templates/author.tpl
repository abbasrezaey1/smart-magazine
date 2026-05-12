{include file="header.tpl"}
{include file="navbar.tpl"}

{if $message}
        <div class="alert alert-{$type}">
           <strong>{$message}</strong>
        </div>
{/if}

{if $article.published and !$article.rejected or $isAdmin}
    <div class="card" style="max-width: 100%; margin-bottom:3%">  
            <div class="card-header">
                      <div style="display:flex; align-items:center; flex-wrap: wrap;justify-content:space-between">
                          <div style="mid-width:85%">
                              <h4>
                                  {$article.authors} {if $isAdmin or $isAuthor}
                                  <button class="btn btn-outline-warning btn-sm py-0 btn-mini">{$article.web_id}</button>{/if}
                              </h4>
                          </div>
                          <div>
                          {if $isAdmin or $isAuthor}
                                {if $article.published}
                                        <a role="button" class="btn btn-success">Published</a> 
                                {else}
                                        <a role="button" class="btn btn-warning">Not Published</a>
                                {/if}
                          {/if}
                          </div>
                      </div>
            </div>
            <div class="card-body">
                <p class="card-text">
                    {$article.affiliation}
                </p>
            </div>
{if !$author_articles}
    <div class="card" style="max-width: 100%; margin-top:1%">
        <div class="card-header">
            <h5>No article yet</h5>
        </div>
    </div>
{else}
    {foreach from=$author_articles item=$author_article}
                  {include file="article-score.tpl"}
    {/foreach}
{/if}

<br>

<div style="margin:15px">
    
<h4>Add Article</h4>

<form method ="post" action="add-article">
           
            <input type="hidden" name="submission_id" value="{$article.submission_id}">
            
            <div class="form-group">
               <label for="title">Article Title:</label>
               <input type="text" class="form-control" placeholder="Enter Article Title" name="title" id="title" required>
            </div>
            
            <div class="form-group">
               <label for="authors">Authors Names:</label>
               <input type="text" class="form-control" placeholder="Enter Authors Name" name="authors" id="authors" required>
               <small>Seperate Authors with comma e.g. Sobah Zamir, Ali Kian, Ludmial Galbur</small>
            </div>
            
            <input name="add_button" type="submit" class="form-control btn btn-primary" value="Add Article">
</form>

</div>
    </div>
{/if}

<br>
{include file="footer.tpl"}