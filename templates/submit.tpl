{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
    {if $msg}
        <div class="alert alert-success">
           <strong>{$msg}</strong>
        </div>
    {/if}
{include file="title.tpl"}


 <form method="POST" action="submit-item">
        
            <div class="form-group">
               <label for="title">{$site.object|ucfirst} Title:</label>
               <input type="text" class="form-control" placeholder="Enter title" name="title" id="title" required>
            </div>
            
            {if $site.type=='magazine'}
            <div class="form-group">
               <label for="authors">Authors:</label>
               <input type="text" class="form-control" placeholder="Enter author(s)" name="authors" id="authors" required>
               <small>Seperate authors using comman e.g. John Smith, Varun Soxy, David Hartlap</small>
            </div>
            {/if}
            
            
            {if $site.type=='magazine_directory'}
            <div class="form-group">
               <label for="publisher">Publisher:</label>
               <input type="text" class="form-control" placeholder="Enter publisher name" name="publisher" id="publisher" required>
                     <small>If the journal does not have publisher, enter the name of the journal editor e.g. Dr. Smith Varun</small>
            </div>
            <div class="form-group">
               <label for="title">{$site.object|ucfirst} ISSN:</label>
               <input type="text" class="form-control" placeholder="Enter ISSN" name="issn" id="issn">
            </div>
            
            <div class="form-group">
               <label for="country">{$site.object|ucfirst} Publication Center (Country):</label>
               <input type="text" class="form-control" placeholder="Enter Country" name="country" id="country">
            </div>
            
            {/if} 
            
            {if $site.type=='article_directory'}
            <div class="form-group">
               <label for="article_url">Article Direct Link:</label>
               <input type="url" class="form-control" placeholder="Enter direct link to the article PDF" name="article_url" id="article_url" required>
                     <small>The article should be the direct link of a public article</small>
            </div>
            {/if}
            
            <div class="form-group">
                <label for="content">{$site.object_description|ucfirst}</label>
                <textarea class="form-control" rows="8" name="content" placeholder="Enter content" id="content" required>{$article.content|escape:'html'}</textarea>
                  {if $content_hint_message}
                      <div class="alert alert-{$message_type}" role="alert">
                        {$content_hint_message}
                      </div>
                   {/if}
            </div>
            {if $site.type=='magazine_directory'}
                <div class="form-group">
                   <label for="cover_photo">{$site.object|ucfirst} Cover Photo:</label>
                   <input type="file" class="form-control" required>
                </div>
            {/if}
            
            {if $site.type=='magazine' || $site.type=='blog'}
                <div class="form-group">
                   <label for="article_file">Article (MS-Word Format):</label>
                   <input type="file" class="form-control" required>
                </div>
            {/if}
            
            {if $site.type=='magazine' || $site.type=='blog'  || $site.type=='magazine_directory' }
            <div class="form-group">
               <label for="authors">Email:</label>
               <input type="email" class="form-control" placeholder="Enter email(s)" name="email" id="email" required>
            </div>
            {/if}
            
                  <button class="btn btn-default">Submit</button>
 </form>
{include file="footer.tpl"}