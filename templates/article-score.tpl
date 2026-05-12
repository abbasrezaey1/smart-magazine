              <div class="card-header">
                      <div style="display:flex; flex-direction:column; flex-wrap: wrap;justify-content:space-between">
                            
                                   <h5>
                                      <a href="{$base_url}/{$web_no}">{$author_article.title}</a>
                                   </h5>
                                   
                                   <h6>
                                      {$author_article.authors} 
                                   </h6>
                                   
                                   <div style=" width:100%; display:flex; border:solid 1px gray">
                                       <div style="color:white; height:30px;width: {$author_article.score}%; background-color:blue"></div>
                                       <div style="height:30px; width:{100-$author_article.score}%;  color:blue; margin-left:7px; text-align:left;padding-top:3px">Score: {$author_article.score}%</div>
                                       <div style="height:30px; float:right">
                                           <form action="" method="post">
                                                <input type="hidden" value="1" name="abstract_coverage">
                                                <button class="btn btn-primary btn-sm">Improve Score</button>
                                           </form>
                                       </div>
                                   </div>
                                   
                            <div style="margin-top:10px">
                              <a href="{$author_article.actual_url}" target= _blank class="btn btn-primary btn-sm">FULL TEXT PDF</a>
                              <a href="{$base_url}/{$web_no}/{$author_article.url}/evaluation-report" class="btn btn-primary btn-sm">Evaluation Report</a>
                                   &nbsp; &nbsp; &nbsp;
                              <form style="display:inline" action="" method="post">
                                   <button name="delete_button" class="btn btn-danger btn-sm">Delete</button>
                              </form>
                            </div>
                            
                      </div> 
                  </div>