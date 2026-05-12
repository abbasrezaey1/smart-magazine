{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
    {if $message}
        <div class="alert alert-{if isset($message_type) && $message_type == 'danger'}danger{elseif isset($message_type) && $message_type == 'info'}info{else}success{/if}">
           <strong>{$message}</strong>
        </div>
    {/if}
    
{include file="title.tpl"} 
<div class="mb-3"><a href="write-scientific-article" style="float:right" role="button" class="btn btn-primary">Switch to Scientific Article Writer</a></div>

    <form method="POST" action="save" enctype="multipart/form-data" id="write-article-form">
        
            <div class="form-group">
               <label for="title">Title:</label>
               <input type="text" class="form-control" value="{$article.title|escape:'html'}" placeholder="Enter title" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label class="d-block mb-2">Article body</label>
                <div class="btn-group btn-group-toggle mb-2" role="group" aria-label="How to provide article text">
                    <label class="btn btn-outline-secondary{if !isset($body_mode_restore) || $body_mode_restore != 'upload'} active{/if}" id="label-body-type">
                        <input type="radio" name="body_mode" value="type" autocomplete="off"{if !isset($body_mode_restore) || $body_mode_restore != 'upload'} checked{/if}> Write here
                    </label>
                    <label class="btn btn-outline-secondary{if isset($body_mode_restore) && $body_mode_restore == 'upload'} active{/if}" id="label-body-upload">
                        <input type="radio" name="body_mode" value="upload" autocomplete="off"{if isset($body_mode_restore) && $body_mode_restore == 'upload'} checked{/if}> Upload Word (.docx)
                    </label>
                </div>
                <p class="small text-muted" id="body-mode-hint-type">Use the box below. Images, videos, and links in the HTML must match the note shown under the field.</p>
                <p class="small text-muted" id="body-mode-hint-upload" style="display:none">Upload one Microsoft Word file in <strong>.docx</strong> format (max 5 MB). Paragraphs become HTML; the random link-count rule does not apply to uploaded files.</p>
            </div>
            
            <div class="form-group" id="mode-type-wrap">
                <label for="content">Content:</label>
                <textarea class="form-control" rows="8" name="content" placeholder="Enter content" id="content">{$article.content|escape:'html'}</textarea>
                  {if $content_hint_message}
                      <div class="alert alert-{$message_type}" role="alert">
                        {$content_hint_message}
                      </div>
                   {/if}
            </div>

            <div class="form-group" id="mode-upload-wrap" style="display:none">
                <label for="word_document">Word document (.docx):</label>
                <input type="file" class="form-control-file" name="word_document" id="word_document" accept=".docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
            </div>
            
            <input type="hidden"  name="total_allowed_link_number" value="{$total_allowed_link_number}"> 
            <input type="hidden"  name="content_hint_message" value="{$content_hint_message}"> 
                

            <div class="form-group">
               <label for="keywords">Keywords:</label>
               <input type="text" class="form-control" value="{$article.keywords|escape:'html'}" placeholder="Enter keywords" name="keywords" id="keywords" required>
               <small id="keywords" class="form-text text-muted">Speperate the keywords with "," e.g. keyword1, keyword2</small>            
            </div>
            
            <div class="form-group">
               <label for="metadescription">Meta-Desciption:</label>
               <input type="text" class="form-control" value="{$article.metadescription|escape:'html'}" placeholder="Enter a short description" name="metadescription" id="metadescription" required>
               <small id="metadescription" class="form-text text-muted">Enter a description of the article maximum two lines.</small>            
            </div>
      
            <input type="hidden"  name="related_link_number" value="{$related_link_number}"> 
            
            
            {if $related_link_number>0}
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Related Link</span>
              </div>
              <input type="text" name="related_links_text_1" value="{$article.related_links_text_1|escape:'html'}" placeholder="Label" class="form-control">
              <input type="url" name="related_links_1" value="{$article.related_links_1|escape:'html'}" placeholder="URL: e.g. http://website.com/article-1" class="form-control">
            </div>
            {/if}
            
             
            {if $related_link_number>1}
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Related Link</span>
              </div>
              <input type="text" name="related_links_text_2" value="{$article.related_links_text_2|escape:'html'}" placeholder="Label" class="form-control">
              <input type="url" name="related_links_2" value="{$article.related_links_2|escape:'html'}" placeholder="URL: e.g. http://website.com/article-2" class="form-control">
            </div>
            {/if}
            
            {if $related_link_number>2}
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Related Link</span>
              </div>
              <input type="text" name="related_links_text_3" value="{$article.related_links_text_3|escape:'html'}" placeholder="Label" class="form-control">
              <input type="url" name="related_links_3" value="{$article.related_links_3|escape:'html'}" placeholder="URL: e.g. http://website.com/article-3" class="form-control">
            </div>
            {/if}
            <br>
            
            <div class="form-group">
                <label>Publication</label>
                <p class="form-control-plaintext border rounded px-3 py-2 mb-0 bg-light">Articles are saved for <strong>{$article_publish_web_id|escape:'html'}</strong>.</p>
                <input type="hidden" name="web" value="{$article_publish_web_id|escape:'html'}">
            </div>
            
            <button class="btn btn-default">Submit</button>
    </form>
    <script>
    (function () {
        var form = document.getElementById('write-article-form');
        if (!form) return;
        var ta = document.getElementById('content');
        var file = document.getElementById('word_document');
        var wrapType = document.getElementById('mode-type-wrap');
        var wrapUpload = document.getElementById('mode-upload-wrap');
        var hintType = document.getElementById('body-mode-hint-type');
        var hintUpload = document.getElementById('body-mode-hint-upload');
        var labelType = document.getElementById('label-body-type');
        var labelUpload = document.getElementById('label-body-upload');
        function setMode(upload) {
            if (upload) {
                wrapType.style.display = 'none';
                wrapUpload.style.display = 'block';
                hintType.style.display = 'none';
                hintUpload.style.display = 'block';
                ta.removeAttribute('required');
                file.setAttribute('required', 'required');
                labelUpload.classList.add('active');
                labelType.classList.remove('active');
            } else {
                wrapType.style.display = 'block';
                wrapUpload.style.display = 'none';
                hintType.style.display = 'block';
                hintUpload.style.display = 'none';
                ta.setAttribute('required', 'required');
                file.removeAttribute('required');
                labelType.classList.add('active');
                labelUpload.classList.remove('active');
            }
        }
        form.querySelectorAll('input[name="body_mode"]').forEach(function (r) {
            r.addEventListener('change', function () { setMode(r.value === 'upload'); });
        });
        if (form.querySelector('input[name="body_mode"]:checked').value === 'upload') {
            setMode(true);
        }
    })();
    </script>
    
</div>