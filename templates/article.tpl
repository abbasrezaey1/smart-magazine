{include file="header.tpl"}
{include file="navbar.tpl"}
{foreach from=$article_array item=article}
    {if $article.published and !$article.rejected or $isAdmin}
    <div class="card" style="max-width: 100%; margin-bottom:3%">  
        <div class="card-header">
                  <div style="display:flex; align-items:center; flex-wrap: wrap;justify-content:space-between">
                      <div style="mid-width:85%">
                          <h4>{$article.title} - {$article.date|date_format}{if $isAdmin or $isAuthor}<button class="btn btn-outline-warning btn-sm py-0 btn-mini">{$article.web_id}</button>{/if}</h4>
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

{if $article.is_scientific}
            
                <center><h3>{$article.title|upper}</h3></center><br>
                <center>{$article.authors}</center><br><br>
                <center><b>ABSTRACT</b><br></center>
                {$article.problem|ucfirst}. {$article.problem_importance|ucfirst}. {$article.prev_solution_1|ucfirst} but {$article.prev_solution_drawback_1|lcfirst}. 
                {$article.prev_solution_2|ucfirst} but {$article.prev_solution_drawback_2|lcfirst}. {$article.prev_solution_3|lcfirst} but {$article.prev_solution_drawback_3|lcfirst}.
                In this paper, {$article.sloution|lcfirst}. {$article.sloution_advantage_1|ucfirst}. {$article.sloution_advantage_2|ucfirst}.
                <br><br><b>KEYWORDS:</b> {$article.keywords|ucfirst}
                <br><br><center><b>INTRODUCTION</b></center>
                {$article.problem_p|ucfirst}. {$article.problem_exp|ucfirst}. 
                {$article.problem_importance_p|ucfirst}. {$article.problem_importance_exp|ucfirst}.
                To solve this problem several solutions proposed so far. {$article.prev_solution_1_p|ucfirst} but {$article.prev_solution_drawback_1_p|lcfirst}. 
                Also, {$article.prev_solution_drawback_1_exp|lcfirst}. {$article.prev_solution_2_p} but {$article.prev_solution_drawback_2_p|lcfirst}. 
                Futhermore, {$article.prev_solution_drawback_2_exp|lcfirst}. {$article.prev_solution_3_p|lcfirst} but {$article.prev_solution_drawback_3_p|lcfirst}.
                Moreover, {$article.prev_solution_drawback_3_exp|lcfirst}. 
                To solve these problems in past solutions, in this paper, {$article.sloution_p|lcfirst}. {$article.sloution_exp|lcfirst}. {$article.sloution_advantage_1_p|ucfirst}. {$article.sloution_advantage_1_exp|ucfirst}. 
                {$article.sloution_advantage_2_p|ucfirst}. {$article.sloution_advantage_2_exp|ucfirst}.
                

{if $article.solution_part_1}
<br><br><b><center>METHODOLOGY</center></b>
    <div style="margin-bottom:10px">
        {$article.solution_part_1|ucfirst}.
    </div>
{/if}

{if $article.solution_image_1}
    <center><img class="imaga" src="http://clamamagazine.com/images/{$article.solution_image_1}">
    <div style="margin-bottom:10px">Fig. 1. {$article.solution_image_caption_1|ucfirst}.</div></center>
{/if}

{if $article.solution_part_2}
<div style="margin-bottom:10px">
    {$article.solution_part_2|ucfirst}.
</div>
{/if}

{if $article.solution_image_2}
<center><img class="imaga" src="http://clamamagazine.com/images/{$article.solution_image_2}">
<div style="margin-bottom:10px">Fig. 2. {$article.solution_image_caption_2|ucfirst}.</div></center>
{/if}

{if $article.solution_part_3}
<div style="margin-bottom:10px">
    {$article.solution_part_3|ucfirst}.
</div>
{/if}

{if $article.solution_image_3}
<center><img class="imaga" src="http://clamamagazine.com/images/{$article.solution_image_3}">
<div style="margin-bottom:10px">Fig. 2. {$article.solution_image_caption_3|ucfirst}.</div></center>
{/if}

{if $article.solution_part_4}
<div style="margin-bottom:10px">
    {$article.solution_part_4|ucfirst}.
</div>
{/if}

{if $article.solution_image_4}
<center><img  class="imaga" src="http://clamamagazine.com/images/{$article.solution_image_4}">
<div style="margin-bottom:10px">Fig. 3. {$article.solution_image_caption_4|ucfirst}.</div></center>
{/if}

{if $article.solution_part_5}
<div style="margin-bottom:10px">
    {$article.solution_part_5|ucfirst}.
</div>
{/if}

{if $article.solution_image_5}
<center><img  class="imaga" src="http://clamamagazine.com/images/{$article.solution_image_5}">
<div style="margin-bottom:10px">Fig. 4. {$article.solution_image_caption_5|ucfirst}.</div></center>
{/if}

{if $article.solution_part_6}
<div style="margin-bottom:10px">
    {$article.solution_part_6|ucfirst}.
</div>
{/if}

{if $article.solution_image_6}
<center><img  class="imaga" src="http://clamamagazine.com/images/{$article.solution_image_6}">
<div style="margin-bottom:10px">Fig. 5. {$article.solution_image_caption_6|ucfirst}.</div></center>
{/if}

{if $article.solution_part_7}
<div style="margin-bottom:10px">
    {$article.solution_part_7|ucfirst}.
</div>
{/if}

{if $article.solution_image_7}
<center><img  class="imaga" src="http://clamamagazine.com/images/{$article.solution_image_7}">
<div style="margin-bottom:10px">Fig. 6. {$article.solution_image_caption_7|ucfirst}.</div></center>
{/if}

{if $article.solution_final_part}
    <div style="margin-bottom:10px">
        {$article.solution_final_part|ucfirst}.
    </div>
{/if}

{if $article.solution_advantages}
<div>
    {$article.solution_advantages|ucfirst}.
</div>
{/if}

{if $article.conclusion}
<br><b><center>CONCLUSION</center></b>
<div>
    {$article.conclusion|ucfirst}.
</div>
{/if}
{else} 
    {$content}
{/if}
            </p>
            {if $article.is_scientific}
            <b><center>REFRENCES</center></b>
            <div style="margin-bottom:8px">
                <div>
                    [1]. {$article.ref_authors_1} '{$article.ref_article_title_1}', {$article.ref_journal_title_1}, <span style="fon-face:italic">{$article.ref_vol_issue_1}</span>
                </div>
                <div>
                    [2]. {$article.ref_authors_2} '{$article.ref_article_title_2}', {$article.ref_journal_title_2}, <span style="fon-face:italic">{$article.ref_vol_issue_2}</span>
                </div>
                <div>
                    [3]. {$article.ref_authors_3} '{$article.ref_article_title_3}', {$article.ref_journal_title_3}, <span style="fon-face:italic">{$article.ref_vol_issue_3}</span>
                </div>
            </div>
            <br>    
            <a href="http://{$website}/{$article.url}/pdf" class="btn btn-primary">Full Text PDF</a>
            {/if}
            {if $article.related_links_1}  
                <br><br>            
                <h5>Related Articles</h5>
                 {if $article.related_links_1}  
                     <a href="{$article.related_links_1}">{if $article.related_links_text_1}{$article.related_links_text_1}{else}{$article.related_links_1}{/if}</a><br>
                 {/if}
                 {if $article.related_links_2}  
                     <a href="{$article.related_links_2}">{if $article.related_links_text_2}{$article.related_links_text_2}{else}{$article.related_links_2}{/if}</a><br>
                 {/if}
                 {if $article.related_links_3}  
                     <a href="{$article.related_links_3}">{if $article.related_links_text_3}{$article.related_links_text_3}{else}{$article.related_links_3}{/if}</a><br>
                 {/if}
             {/if}
             <br>
             {if $isAdmin}
               <a href="http://{$website}/{$article.url}/edit" class="btn btn-primary">Edit</a>
               <a href="http://{$website}/{$article.url}/delete" class="btn btn-danger">Delete</a>
             {/if}    



             
           </div>
           
                         {if $web_settings.type=="magazine"}
                            <a class="btn btn-primary text-white">Download Full Text</a>
                         {/if}
                         
             
             
    </div>
    {/if}
    
    {if $isAdmin and $article.published}
    <div class="card" style="max-width: 100%">
        <div class="card-body">
            <ul class="list-group list-group-flush">
            {foreach from=$comments item=comment}
                  <li class="list-group-item">
                    <p>
                        <p><b>{$comment.name}</b> <small class="text-muted">{$comment.date}</small></p>
                    </p>
                    <p>
                     {$comment.comment}
                    </p>
                    
                    
                        <button name="delete_comment_button" class="btn btn-danger btn-sm float-right">Delete</a>
                    
                  </li>
            {/foreach} 
            <br>
            </ul>
                <form method="POST" action="">
                  <div class="form-group">
                       <input type="text" class="form-control" name="name" id="name" placeholder="Your name" required>
                  </div>
                  <div class="form-outline w-100">
                       <textarea class="form-control" name="comment" rows="4" placeholder="Enter a comment" style="background: #fff;" required></textarea>
                  </div>
                  
                      <br>
                      <div class="form-group">
                           <input class="form-control" type="date" name="date" id="date" value="{$date}">
                      </div>
                 
                  <div class="float-end mt-2 pt-1">
                      <button name="comment_button" class="btn btn-primary btn-sm">Post comment</button>
                  </div>
                </form>
        </div>
    </div>
    {/if}

{/foreach}

{include file="footer.tpl"}
 