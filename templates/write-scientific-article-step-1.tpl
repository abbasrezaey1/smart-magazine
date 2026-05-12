{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{if $message}
    <div class="alert alert-{$message_type|default:'info'}">
       <strong>{$message}</strong>
    </div>
{/if}
    
{include file="title.tpl"}
<div class="mb-3"><a href="write-article" style="float:right" role="button" class="btn btn-primary">Switch to Simple Article Writer</a></div>
    <form method="POST" action="submit-scientific-article">
        
            <div class="form-group">
               <label for="title">Title:</label>
               <input type="text" class="form-control" value="{$article.title|escape:'html'}" placeholder="Enter title" name="title" id="title" required>
            </div>
            
            <div class="form-group">
               <label for="authors">Name of authors:</label>
               <input type="text" class="form-control" value="{$article.authors|escape:'html'}" placeholder="Enter authors name" name="authors" id="authors" required>
                 <small id="authors" class="form-text text-muted">Speperate the authors names with "," e.g. John Smith, Roya Keypour</small>  
            </div>
            
            <div class="form-group">
                <label for="problem">What is the problem?</label>
                <input name="problem" class="form-control" value="{$article.problem|escape:'html'}" placeholder="Enter the problem" id="problem" required>
                <small>Explain in one line clearly what is the problem that you write this paper about.</small>
            </div>
            
            <div class="form-group">
                <label for="problem_importance">Importance of the problem?</label>
                <input name="problem_importance" class="form-control" placeholder="Enter importance of the problem" value="{$article.problem_importance|escape:'html'}" id="problem_importance" required>
                <small>Explain in one line why this problem is important.</small>
            </div>
            
            <div class="form-group">
                <label for="prev_solution_1">Write three previous solutions already proposed for the problem:</label>
                <input name="prev_solution_1" class="form-control" placeholder="Enter purposed solution for the problem" id="prev_solution_1" value="{$article.prev_solution_1|escape:'html'}" required>
                <input name="prev_solution_2" class="form-control" placeholder="Enter purposed solution for the problem" id="prev_solution_2" value="{$article.prev_solution_2|escape:'html'}" required>
                <input name="prev_solution_3" class="form-control" placeholder="Enter purposed solution for the problem" id="prev_solution_3" value="{$article.prev_solution_3|escape:'html'}" required>
            </div>
            
                        
            <div class="form-group">
                <label>Write drawbacks of each of of the above three solutions:</label>
                <input name="prev_solution_drawback_1" class="form-control" placeholder="Enter first sloution drawback" id="prev_solution_drawback_1" value="{$article.prev_solution_drawback_1|escape:'html'}" required>
                <input name="prev_solution_drawback_2" class="form-control" placeholder="Enter second sloution drawback" id="prev_solution_drawback_2" value="{$article.prev_solution_drawback_2|escape:'html'}" required>
                <input name="prev_solution_drawback_3" class="form-control" placeholder="Enter third sloution drawback" id="prev_solution_drawback_3" value="{$article.prev_solution_drawback_3|escape:'html'}" required>
            </div>

            <div class="form-group">
                <label for="sloution">What is your solution for this problem?</label>
                <input name="sloution" class="form-control" placeholder="Enter your sloution" value="{$article.sloution|escape:'html'}" id="sloution" required>
                <small>State your solution for the problem in maximum two lines clearly.</small>
            </div>
            
            <div class="form-group">
                <label for="sloution_advantage_1">Two reasons why your solution is better:</label>
                <input name="sloution_advantage_1" class="form-control" placeholder="Enter firt advantage if your sloution" id="sloution_advantage_1" value="{$article.sloution_advantage_1|escape:'html'}" required>
                <input name="sloution_advantage_2" class="form-control" placeholder="Enter second advantage of your sloution" id="sloution_advantage_2" value="{$article.sloution_advantage_2|escape:'html'}" required>
                <small>Mention two reasons why your solution is better than previous solutions.</small>
            </div>
            
            <div class="form-group">
                <label for="content">Describe your solution in details:</label>
                <textarea class="form-control" rows="8" name="content" placeholder="Enter sloution detailed description" id="content">{$article.content|escape:'html'}</textarea>
            </div>
            
            <div class="form-group">
               <label for="keywords">Keywords:</label>
               <input type="text" class="form-control" value="{$article.keywords|escape:'html'}" placeholder="Enter keywords" name="keywords" id="keywords" required>
               <small id="keywords" class="form-text text-muted">Speperate the keywords with "," e.g. keyword1, keyword2</small>            
            </div>

            <input type="hidden"  name="related_link_number" value="{$related_link_number}"> 
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Reference 1</span>
            </div>
              <input type="text" name="ref_authors_1" value="{$article.ref_authors_1|escape:'html'}" placeholder="Authors Name" class="form-control">
              <input type="text" name="ref_article_title_1" value="{$article.ref_article_title_1|escape:'html'}" placeholder="Article Title" class="form-control">
              <input type="text" name="ref_journal_title_1" value="{$article.ref_journal_title_1|escape:'html'}" placeholder="Journal Title" class="form-control">
              <input type="text" name="ref_vol_issue_1" value="{$article.ref_vol_issue_1|escape:'html'}" placeholder="Volume and Issue Number" class="form-control">
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Reference 2</span>
              </div>
              <input type="text" name="ref_authors_2" value="{$article.ref_authors_2|escape:'html'}" placeholder="Authors Name" class="form-control">
              <input type="text" name="ref_article_title_2" value="{$article.ref_article_title_2|escape:'html'}" placeholder="Article Title" class="form-control">
              <input type="text" name="ref_journal_title_2" value="{$article.ref_journal_title_2|escape:'html'}" placeholder="Journal Title" class="form-control">
              <input type="text" name="ref_vol_issue_2" value="{$article.ref_vol_issue_2|escape:'html'}" placeholder="Volume and Issue Number" class="form-control">
            </div>
            
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Reference 3</span>
              </div>
              <input type="text" name="ref_authors_3" value="{$article.ref_authors_3|escape:'html'}" placeholder="Authors Name" class="form-control">
              <input type="text" name="ref_article_title_3" value="{$article.ref_article_title_3|escape:'html'}" placeholder="Article Title" class="form-control">
              <input type="text" name="ref_journal_title_3" value="{$article.ref_journal_title_3|escape:'html'}" placeholder="Journal Title" class="form-control">
              <input type="text" name="ref_vol_issue_3" value="{$article.ref_vol_issue_3|escape:'html'}" placeholder="Volume and Issue Number" class="form-control">
            </div>            
            <br>
            
            <div class="form-group">
                <label>Publication</label>
                <p class="form-control-plaintext border rounded px-3 py-2 mb-0 bg-light">Articles are saved for <strong>{$article_publish_web_id|escape:'html'}</strong>.</p>
                <input type="hidden" name="web" value="{$article_publish_web_id|escape:'html'}">
            </div>
            
            <button name="submit" class="btn btn-default">Next</button>
    </form>
    
</div>
