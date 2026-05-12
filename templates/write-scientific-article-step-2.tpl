{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{if $message}
    <div class="alert alert-{$message_type|default:'danger'}">
       <strong>{$message}</strong>
    </div>
{/if}

{include file="title.tpl"}
    <form method="POST" action="submit-scientific-article-finilize">
        
            <input value="{$submission_id}" type="hidden" name="submission_id">
            <input value="{$keywords|escape:'html'}" type="hidden" name="keywords">
        
            <div class="form-group">
                <label for="problem">Explain in one line why {$article.problem|escape:'html'|lcfirst}</label>
                <input name="problem_exp" class="form-control" value="{$article.problem_exp|escape:'html'}" placeholder="Enter the problem" id="problem" required>
            </div>
            
            <div class="form-group">
                <label for="problem_importance_exp">How {$article.problem_importance|escape:'html'|lcfirst}?</label>
                <input name="problem_importance_exp" class="form-control" value="{$article.problem_importance_exp|escape:'html'}" placeholder="Enter importance of the problem" id="problem_importance" required>
            </div>
            
            <div class="form-group">
                <label for="prev_solution_drawback_1_exp">Write other challenge about solution of {$article.prev_solution_1|escape:'html'}</label>
                <input name="prev_solution_drawback_1_exp" class="form-control" placeholder="Enter purposed solution for the problem" value="{$article.prev_solution_drawback_1_exp|escape:'html'}" id="prev_solution_drawback_1_exp" required>
            </div>

            <div class="form-group">
                <label for="prev_solution_drawback_2_exp">Write one disadvantage of solution of: {$article.prev_solution_2|escape:'html'}</label>
                <input name="prev_solution_drawback_2_exp" class="form-control" placeholder="Enter purposed solution for the problem" id="prev_solution_drawback_2_exp" value="{$article.prev_solution_drawback_2_exp|escape:'html'}" required>
            </div>
            
            <div class="form-group">
                <label for="prev_solution_drawback_3_exp">What is other problem whith the solution you mentioned as {$article.prev_solution_3|escape:'html'}</label>
                <input name="prev_solution_drawback_3_exp" class="form-control" placeholder="Enter purposed solution for the problem" id="prev_solution_drawback_3_exp" value="{$article.prev_solution_drawback_3_exp|escape:'html'}" required>
            </div>


            <div class="form-group">
                <label for="sloution_exp">Can you explain in one line more about your solution: {$article.sloution|escape:'html'|lcfirst}</label>
                <input name="sloution_exp" class="form-control" placeholder="Enter your sloution explantion" id="sloution_exp" value="{$article.sloution_exp|escape:'html'}" required>
                <small>Simply explain it in one line more.</small>
            </div>
            
            <div class="form-group">
                <label for="sloution_advantage_1_exp">Can you explain in one line why {$article.sloution_advantage_1|escape:'html'|lcfirst}</label>
                <input name="sloution_advantage_1_exp" class="form-control" placeholder="Enter firt advantage if your sloution" id="sloution_advantage_1_exp" value="{$article.sloution_advantage_1_exp|escape:'html'}" required>
                <small>Simply explain it in one line more.</small>
            </div>
            
            <div class="form-group">
                <label for="sloution_advantage_2_exp">Shortly in one line state why {$article.sloution_advantage_2|escape:'html'|lcfirst}</label>
                <input name="sloution_advantage_2_exp" class="form-control" placeholder="Enter firt advantage if your sloution" id="sloution_advantage_2_exp" value="{$article.sloution_advantage_2_exp|escape:'html'}" required>
                <small>Explain it a bit more in one line.</small>
            </div>
            
            <div class="form-group">
               <label for="keywords_exp">Please add two keywords to these keywords: {$article.keywords|escape:'html'}</label>
               <input type="text" class="form-control" value="{$article.keywords|escape:'html'}" placeholder="Enter keywords" name="keywords_exp" id="keywords_exp" required>
               <small id="keywords_exp" class="form-text text-muted">Speperate the keywords with "," e.g. keyword1, keyword2</small>            
            </div>
            
            <button name="submit" class="btn btn-default">Submit</button>
    </form>
    
</div>
