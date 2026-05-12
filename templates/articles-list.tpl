{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="title.tpl"}

{if $articles}
{foreach from=$articles item=$article} 
 {if (!$article.published and !$article.rejected  and $article.submitted and $title=="Waiting Articles") or ($article.rejected and $title=="Rejected Articles") or $title=="My Articles"}
     <div class="card" style="max-width: 100%; margin-top:1%">
      <div class="card-header">
          <div style="display:flex; align-items:center; flex-wrap: wrap;justify-content:space-between">
              <div style="width:90%">
                  <h5>{$article.object}: {$article.title} <button class="btn btn-outline-warning btn-sm py-0 btn-mini">{$article.web_id}</button></h5>
              </div>
               {if $article.rejected}
               <div>
                        <a role="button" class="btn btn-warning">Rejected</a> 
               </div>
               {/if}
          </div>
      </div>
      <div class="card-body">
          
      {if $article.object=='Article'} 
            <p class="card-text">
                 Main Keywords: {foreach from=$article.keywords item=$keyword}
                                    <div style="margin-bottom:4px" class="btn btn-outline-secondary" style="margin-right:4px">
                                        {$keyword.keyword|ucfirst}: {$keyword.frequency}%
                                    </div> 
                                {/foreach}
            </p>
      {/if}
      
      {if $article.object=='Magazine/Journal'} 
        Publisher: {$article.publisher} ISSN: {$article.issn} Country {$article.country} Email: {$article.email}    
      {/if}
      
      {if $article.object=='Article'}
        Author(s): {$article.authors} 
      {/if}
      
    <div style="margin-bottom:10px">
                   
                  {if $title=="Waiting Articles" or $title=="Rejected Articles"}
                    {if $article.scan_id}
                 
                        {if $article.duplicate_percentage==""}
                            <div style="margin-bottom:4px" caria-disabled="true" class="btn btn-outline-info">
                                Duplicate Checking... 
                            </div>
                        {elseif $article.duplicate_percentage>30}
                        
                            <a href="{$base_url}/duplicate-check-result?submission_id={$article.submission_id}" style="margin-bottom:4px" class="btn btn-danger">
                                Duplicate: {$article.duplicate_percentage}% 
                            </a>
                        {else}
                            <a href="{$base_url}/duplicate-check-result?submission_id={$article.submission_id}"  style="margin-bottom:4px" class="btn btn-success">
                                Duplicate: {$article.duplicate_percentage}% 
                            </a>
                        {/if}
                    {else}
                        <div style="margin-bottom:4px" class="btn btn-danger">
                            Duplicate Check Failed! 
                        </div>
                    {/if}
                {/if}
    </div>
        
        <a href="{$base_url}/{$article.web_no}/{$article.url}"  style="margin-bottom:4px" class="btn btn-primary">View</a>
        {if $isAdmin}
            {if !$article.rejected}
                <a href="{$base_url}/reject?submission_id={$article.submission_id}" role="button" style="margin-bottom:4px" class="btn btn-warning">Reject</a>
            {/if}
            {if $title !='Rejected Articles'}
                <a href="{$base_url}/publish?submission_id={$article.submission_id}" role="button" style="margin-bottom:4px" class="btn btn-success">Publish</a>
            {/if}
            
        {/if}
        
        {if ($isAuthor && !$article.submitted) or $isAdmin}
                <a href="{$base_url}/{$article.web_no}/{$article.url}/edit" role="button" style="margin-bottom:4px" class="btn btn-primary">Edit</a>
                <a  href="{$base_url}/delete?submission_id={$article.submission_id}" style="margin-bottom:4px" class="btn btn-danger">Delete</a>
        {/if}
        {if $title=="My Articles"}
            {if $isAuthor && !$article.submitted}
                   <a href="{$base_url}/submit?submission_id={$article.submission_id}" role="button" style="float:right;margin-bottom:4px" class="btn btn-success">Submit</a>
            {else}
                   <button style="float:right;margin-bottom:4px" class="btn btn-secondary" disabled>Submitted</button>
            {/if}
        {/if}
      </div>
    </div>
 {/if}
{/foreach}
{else} 
      <div class="card" style="max-width: 100%; margin-top:1%">
        <div class="card-header"><h5>No new article received yet</h5></div>
      </div>
    </div>
{/if}