 {include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="title.tpl"}

{if $message}
    <br>
    <div class="container">
      <div class="alert alert-success">
        <strong>{$message} - <a href="http://{$website}/{$article.url|escape:'html'}">View Article</a></strong>
      </div>
    </div>
{/if}
    <br>
    <form method='POST' action=''>
        
            <div class="form-group">
               <label for="title">Title:</label>
               <input type='text' class="form-control" value="{$article.title|escape:'html'}" name='title' id='title'>
            </div>
            
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" rows="8" name='content' id='content'>{$article.content|escape:'html'}</textarea>
            </div>
            
            <div class="form-group">
               <label for="url">Custome URL:</label>
               <input type='text' class="form-control" value="{$article.url|escape:'html'}" name='url' id='url' required>
               <small id="url" class="form-text text-muted">Speperate the words in url with '-' e.g. your-new-article</small>
            </div>
            
            <div class="form-group">
               <label for="keywords">Keywords:</label>
               <input type="text" class="form-control" value="{$article.keywords|escape:'html'}" name="keywords" id="keywords" required>
               <small id="keywords" class="form-text text-muted">Seperate the keywords with "," e.g. keyword1, keyword2</small>   
               <small id="keywords" class="form-text text-muted">
               
                 {foreach from=$keywords_info item=keyword_info}
                      <div class="btn btn-outline-secondary" style="margin-right:4px">{$keyword_info.keyword}: {$keyword_info.frequency}% </div>
                 {/foreach}
                  
                 </small>
            </div>
            
            <div class="form-group">
               <label for="keyword_check">Check a Keyword:</label>
               <input type="text" class="form-control" {if $keyword_check}value="{$keyword_check}"{/if} name="keyword_check" id="keyword_check">
               <small id="keyword_check" class="form-text text-muted">You can check frequency of a keyword in the article</small>   
               <small id="keyword_check" class="form-text text-muted">
                  {if $keyword_check}
                        <div class="btn btn-outline-secondary" style="margin:4px">{$keyword_check}: {$keyword_check_frequency}% </div>
                  {/if}
                </small>
            
            </div>
            <button name="check_keyword_button" style="margin-bottom:2%" class="btn btn-default">Check Keyword</button>
            
            <div class="form-group">
               <label for="metadescription">Meta-Desciption:</label>
               <input type="text" class="form-control" value="{$article.metadescription|escape:'html'}" name="metadescription" id="metadescription" required>
               <small id="metadescription" class="form-text text-muted">Enter maximum two lines description of the article.</small>            
            </div>
            
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Related Link</span>
              </div>
              <input type="text" name="related_links_text_1" value="{$article.related_links_text_1|escape:'html'}" placeholder ="Label" class="form-control">
              <input type="url" name="related_links_1" value="{$article.related_links_1|escape:'html'}" placeholder ="URL" class="form-control">
            </div>
            
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Related Link</span>
              </div>
              <input type="text" name="related_links_text_2" value="{$article.related_links_text_2|escape:'html'}" placeholder ="Label" class="form-control">
              <input type="url" name="related_links_2" value="{$article.related_links_2|escape:'html'}" placeholder ="URL" class="form-control">
            </div>
            
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Related Link</span>
              </div>
              <input type="text" name="related_links_text_3" value="{$article.related_links_text_3|escape:'html'}" placeholder ="Label" class="form-control">
              <input type="url" name="related_links_3" value="{$article.related_links_3|escape:'html'}" placeholder ="URL" class="form-control">
            </div>
            <br>
            
            <input type='hidden' name='submission_id' value="{$article.submission_id|escape:'html'}">
            <input  type= 'hidden' name='web_id' value="{$article.web_id|escape:'html'}">
            
            <a href="http://{$website}/{$article.url|escape:'html'}" role="button" class="btn btn-primary">Cancel</a>        
            <button name='submitbutton' class="btn btn-default">Save</button>
            
    </form>
