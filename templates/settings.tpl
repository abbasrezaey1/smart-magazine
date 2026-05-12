{include file="header.tpl"}
{include file="navbar.tpl"}
{include file="title.tpl"}

{if $message}
  <div class="alert alert-{$message_type}">
    <strong>{$message}</strong>
  </div>
{/if}
<form method="POST" action=""  enctype="multipart/form-data">


<h5>General</h5>
            <div class="form-group">
               <label for="name">Website Title:</label>
                <input name="name" class="form-control">
            </div>
            



                  <div style="display:flex; flex-wrap:wrap">
                      
                      <div class="form-group">     
                          <label for="logo">Website Logo:</label>
                          <input type="file" name="large_logo" class="form-control">
                      </div>
                      
                      <div>
                            {if $logo}
                                 <img  class="logo-settings"  src="{$base_url}/logo/{$web_no}.png">
                            {/if}
                      </div>
                  
                  </div>                
                
                  <div style="display:flex; flex-wrap:wrap">
                      
                      <div class="form-group">     
                          <label for="logo">Website Logo (Mobile Version):</label>
                          <input type="file" name="small_logo" class="form-control">
                      </div>
                      
                      <div>
                            {if $logo}
                                 <img class="logo-settings" src="{$base_url}/logo/small-{$web_no}.png">
                            {/if}
                      </div>
                      
                  </div>
                
                
            <div class="form-group">
               <label for="homepage_post_number">Number of the posts in homepage:</label>
               
                       <select name="homepage_post_number" class="form-control">
                            {html_options values=$page_number_option_values selected=$page_number_option_selected output=$page_number_option_output}
                       </select>
               
            </div>
            

<h5>Google Indexing</h5>
           
            
            <div class="form-check form-switch">
                <input name="index_about" class="form-check-input" type="checkbox" {if $indexing->about}checked{/if}>
                <label class="form-check-label" >Index "About" Page</label>
            </div>
            <div class="form-check form-switch">
                <input name="index_contact" class="form-check-input" type="checkbox" {if $indexing->contact}checked{/if}>
                <label class="form-check-label">Index "Contact" Page</label>
            </div>
            <div class="form-check form-switch">
                <input name="index_terms_conditions" class="form-check-input" type="checkbox"  {if $indexing->terms_conditions}checked{/if}>
                <label class="form-check-label" >Index "Terms and Conditions" Page</label>
            </div>
            <div class="form-check form-switch">
                <input name="index_privacy" class="form-check-input" type="checkbox" {if $indexing->privacy}checked{/if}>
                <label class="form-check-label" >Index "Privacy" Page</label>
            </div>
            <br>


<h5>Footer</h5>

           <input type="hidden" name="web_id" value="'.$web_id.'">
           
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Footer Link</span>
                  </div>
                  <input type="text" name="footer_link_text_1" {if $setting.footer_link_text_1}value="{$setting.footer_link_text_1}"{/if}  placeholder="Label" class="form-control">
                  <input type="url" name="footer_link_1" {if $setting.footer_link_1}value="{$setting.footer_link_1}"{/if} placeholder="URL: e.g. http://website.com/article-1/"';} echo'  class="form-control">
                    <select name="footer_link_width_1" class="form-control">
                                {html_options values=$width_option_values selected=$setting.footer_link_width_1 output=$width_option_output}
                    </select>
                </div>
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Footer Link</span>
                  </div>
                  <input type="text" name="footer_link_text_2" {if $setting.footer_link_text_2}value="{$setting.footer_link_text_2}"{/if}  placeholder="Label" class="form-control">
                  <input type="url" name="footer_link_2" {if $setting.footer_link_2}value="{$setting.footer_link_2}"{/if} placeholder="URL: e.g. http://website.com/article-1/"';} echo'  class="form-control">
                    <select name="footer_link_width_2" class="form-control">
                                {html_options values=$width_option_values selected=$setting.footer_link_width_2 output=$width_option_output}
                    </select>
                </div>
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Footer Link</span>
                  </div>
                  <input type="text" name="footer_link_text_3" {if $setting.footer_link_text_3}value="{$setting.footer_link_text_3}"{/if}  placeholder="Label" class="form-control">
                  <input type="url" name="footer_link_3" {if $setting.footer_link_3}value="{$setting.footer_link_3}"{/if} placeholder="URL: e.g. http://website.com/article-1/"';} echo'  class="form-control">
                    <select name="footer_link_width_3" class="form-control">
                                {html_options values=$width_option_values selected=$setting.footer_link_width_3 output=$width_option_output}
                    </select>
                </div>
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Footer Link</span>
                  </div>
                  <input type="text" name="footer_link_text_4" {if $setting.footer_link_text_4}value="{$setting.footer_link_text_4}"{/if}  placeholder="Label" class="form-control">
                  <input type="url" name="footer_link_4" {if $setting.footer_link_4}value="{$setting.footer_link_4}"{/if} placeholder="URL: e.g. http://website.com/article-1/"';} echo'  class="form-control">
                    <select name="footer_link_width_4" class="form-control">
                                {html_options values=$width_option_values selected=$setting.footer_link_width_4 output=$width_option_output}
                    </select>
                </div>
                
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Footer Link</span>
                  </div>
                  <input type="text" name="footer_link_text_5" {if $setting.footer_link_text_5}value="{$setting.footer_link_text_5}"{/if}  placeholder="Label" class="form-control">
                  <input type="url" name="footer_link_5" {if $setting.footer_link_5}value="{$setting.footer_link_5}"{/if} placeholder="URL: e.g. http://website.com/article-1/"';} echo'  class="form-control">
                    <select name="footer_link_width_5" class="form-control">
                                {html_options values=$width_option_values selected=$setting.footer_link_width_5 output=$width_option_output}
                    </select>
                </div>
                
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Footer Link</span>
                  </div>
                  <input type="text" name="footer_link_text_6" {if $setting.footer_link_text_6}value="{$setting.footer_link_text_6}"{/if}  placeholder="Label" class="form-control">
                  <input type="url" name="footer_link_6" {if $setting.footer_link_6}value="{$setting.footer_link_6}"{/if} placeholder="URL: e.g. http://website.com/article-1/"';} echo'  class="form-control">
                    <select name="footer_link_width_6" class="form-control">
                                {html_options values=$width_option_values selected=$setting.footer_link_width_6 output=$width_option_output}
                    </select>
                </div>
                
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Footer Link</span>
                  </div>
                  <input type="text" name="footer_link_text_7" {if $setting.footer_link_text_7}value="{$setting.footer_link_text_7}"{/if}  placeholder="Label" class="form-control">
                  <input type="url" name="footer_link_7" {if $setting.footer_link_7}value="{$setting.footer_link_7}"{/if} placeholder="URL: e.g. http://website.com/article-1/"';} echo'  class="form-control">
                    <select name="footer_link_width_7" class="form-control">
                                {html_options values=$width_option_values selected=$setting.footer_link_width_7 output=$width_option_output}
                    </select>
                </div>
                
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Footer Link</span>
                  </div>
                  <input type="text" name="footer_link_text_8" {if $setting.footer_link_text_8}value="{$setting.footer_link_text_8}"{/if}  placeholder="Label" class="form-control">
                  <input type="url" name="footer_link_8" {if $setting.footer_link_8}value="{$setting.footer_link_8}"{/if} placeholder="URL: e.g. http://website.com/article-1/"';} echo'  class="form-control">
                    <select name="footer_link_width_8" class="form-control">
                                {html_options values=$width_option_values selected=$setting.footer_link_width_8 output=$width_option_output}
                    </select>
                </div>
            
            
            <br>
    
            <button name= "submitbutton" class="btn btn-default">Save</button>
    </form>


</div>
