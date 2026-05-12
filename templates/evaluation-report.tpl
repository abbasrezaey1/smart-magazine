{include file="header.tpl"}
{include file="navbar.tpl"}
{include file="article-score.tpl"}
<br><br>
<h5>I- Abstract :</h5>

1. Coverage: The abstract covers all parts of the manuscript weakly. Inside of the abstract, simply in one line, state what is the problem, in other words clearly state what is the problem that your wrote paper about it to solve it.
<br><br>
                                   <div style=" width:100%; display:flex; border:solid 1px gray">
                                       <div style="color:white; height:30px;width: {$author_article.score}%; background-color:blue">
                                            
                                       </div>

                                       <div style="height:30px; width:{100-$author_article.score}%;  color:blue; margin-left:7px; text-align:left;padding-top:3px">Score: {$author_article.score}%</div>
                                       <div style="height:30px; float:right">
                                           <form action="" method="post">
                                                <input type="hidden" value="1" name="abstract_coverage">
                                                <button class="btn btn-primary btn-sm">Improve Score</button>
                                           </form>
                                       </div>
                                   </div><br>
{if $abstract_coverage}
            
            <div>
                <div class="form-group">
                <label for="problem">What is the problem?</label>
                <input name="problem" class="form-control" {if $article.problem}value="{$article.problem}"{/if} placeholder="Enter the problem" id="problem" required></input>
                <small>Explain in one line clearly what is the problem that you write this paper about.</small>
            </div>
{/if}


2. Keywords: One more keyword should be added to the paper to covers the goal of the paper.
<br><br>
                                   <div style=" width:100%; display:flex; border:solid 1px gray">
                                       <div style="color:white; height:30px;width: {$author_article.score}%; background-color:blue">
                                            
                                       </div>

                                       <div style="height:30px; width:{100-$author_article.score}%;  color:blue; margin-left:7px; text-align:left;padding-top:3px">Score: {$author_article.score}%</div>
                                       <div style="height:30px; float:right">
                                           <form action="" method="post">
                                                <input type="hidden" value="1" name="abstract_coverage">
                                                <button class="btn btn-primary btn-sm">Improve Score</button>
                                           </form>
                                       </div>
                                   </div><br>
{if $abstract_keywords}
    test2
{/if}
                                   
                            
<h5>II- Introduction:</h5>

1. Importance of the subject of study:

The importance of the subject of the paper should be stated in one line why this problem is important.
<br><br>
                                   <div style=" width:100%; display:flex; border:solid 1px gray">
                                       <div style="color:white; height:30px;width: {$author_article.score}%; background-color:blue">
                                            
                                       </div>

                                       <div style="height:30px; width:{100-$author_article.score}%;  color:blue; margin-left:7px; text-align:left;padding-top:3px">Score: {$author_article.score}%</div>
                                       <div style="height:30px; float:right">
                                           <form action="" method="post">
                                                <input type="hidden" value="1" name="abstract_coverage">
                                                <button class="btn btn-primary btn-sm">Improve Score</button>
                                           </form>
                                       </div>
                                   </div><br>
                                   
2. Goal of the study:

The goal of the study is clear but still it should be stated explicitly in one line in the introduction section what is the main goal of the paper.
<br><br>
                                   <div style=" width:100%; display:flex; border:solid 1px gray">
                                       <div style="color:white; height:30px;width: {$author_article.score}%; background-color:blue">
                                            
                                       </div>

                                       <div style="height:30px; width:{100-$author_article.score}%;  color:blue; margin-left:7px; text-align:left;padding-top:3px">Score: {$author_article.score}%</div>
                                       <div style="height:30px; float:right">
                                           <form action="" method="post">
                                                <input type="hidden" value="1" name="abstract_coverage">
                                                <button class="btn btn-primary btn-sm">Improve Score</button>
                                           </form>
                                       </div>
                                   </div><br>
3. The analysis is flawless.
<br><br>
                                   <div style=" width:100%; display:flex; border:solid 1px gray">
                                       <div style="color:white; height:30px;width: {$author_article.score}%; background-color:blue">
                                            
                                       </div>

                                       <div style="height:30px; width:{100-$author_article.score}%;  color:blue; margin-left:7px; text-align:left;padding-top:3px">Score: {$author_article.score}%</div>
                                       <div style="height:30px; float:right">
                                           <form action="" method="post">
                                                <input type="hidden" value="1" name="abstract_coverage">
                                                <button class="btn btn-primary btn-sm">Improve Score</button>
                                           </form>
                                       </div>
                                   </div><br>
4. The scientific contributions of the paper: The scientific contributions of the paper are acceptable, but they are not mentioned in the paper. It should be explicitly mentioned in one line state what is new in this paper compared to similar papers.
<br><br>
                                   <div style=" width:100%; display:flex; border:solid 1px gray">
                                       <div style="color:white; height:30px;width: {$author_article.score}%; background-color:blue">
                                            
                                       </div>

                                       <div style="height:30px; width:{100-$author_article.score}%;  color:blue; margin-left:7px; text-align:left;padding-top:3px">Score: {$author_article.score}%</div>
                                       <div style="height:30px; float:right">
                                           <form action="" method="post">
                                                <input type="hidden" value="1" name="abstract_coverage">
                                                <button class="btn btn-primary btn-sm">Improve Score</button>
                                           </form>
                                       </div>
                                   </div><br>
5. Organization of the paper: The organization of the paper is structured properly.
There are 8 misspelled grammatical errors in the paper that should be corrected.
<br><br>
                                   <div style=" width:100%; display:flex; border:solid 1px gray">
                                       <div style="color:white; height:30px;width: {$author_article.score}%; background-color:blue">
                                            
                                       </div>

                                       <div style="height:30px; width:{100-$author_article.score}%;  color:blue; margin-left:7px; text-align:left;padding-top:3px">Score: {$author_article.score}%</div>
                                       <div style="height:30px; float:right">
                                           <form action="" method="post">
                                                <input type="hidden" value="1" name="abstract_coverage">
                                                <button class="btn btn-primary btn-sm">Improve Score</button>
                                           </form>
                                       </div>
                                   </div><br>

7. Introduction evaluation: In the introduction it was not stated what will be done in the rest of the paper. It should be simply summarized in 3 lines what will be done in the next sections of the paper.
<br><br>
                                   <div style=" width:100%; display:flex; border:solid 1px gray">
                                       <div style="color:white; height:30px;width: {$author_article.score}%; background-color:blue">
                                            
                                       </div>

                                       <div style="height:30px; width:{100-$author_article.score}%;  color:blue; margin-left:7px; text-align:left;padding-top:3px">Score: {$author_article.score}%</div>
                                       <div style="height:30px; float:right">
                                           <form action="" method="post">
                                                <input type="hidden" value="1" name="abstract_coverage">
                                                <button class="btn btn-primary btn-sm">Improve Score</button>
                                           </form>
                                       </div>
                                   </div><br>

<h5>III-Methodology:</h5>
1. Logical organization of methodology:
The methodology was organized logically.
<br><br>
                                   <div style=" width:100%; display:flex; border:solid 1px gray">
                                       <div style="color:white; height:30px;width: {$author_article.score}%; background-color:blue">
                                            
                                       </div>

                                       <div style="height:30px; width:{100-$author_article.score}%;  color:blue; margin-left:7px; text-align:left;padding-top:3px">Score: {$author_article.score}%</div>
                                       <div style="height:30px; float:right">
                                           <form action="" method="post">
                                                <input type="hidden" value="1" name="abstract_coverage">
                                                <button class="btn btn-primary btn-sm">Improve Score</button>
                                           </form>
                                       </div>
                                   </div><br>
<h5>VII-Rating: 1 = Excellent, 2 = Good, 3 = Fair, 4 = poor</h5>

1. Originality: 1<br>

2. Contribution to the field: 2 <br>

3. Technical quality: 3 <br>

4. Clarity of presentation: 4 <br>

5. Depth of research: 2 <br>

6. Quality of Concept: 1 <br>

<br><br>
Editor Decision: This paper is accepted after minor corrections in International.

<br>
{include file="footer.tpl"}