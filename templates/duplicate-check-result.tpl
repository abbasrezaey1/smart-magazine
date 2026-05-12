{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="title.tpl"}


     <div class="card" style="max-width: 100%; margin-top:1%">
      <div class="card-header">
          <div style="display:flex; align-items:center; flex-wrap: wrap;justify-content:space-between">
              <div style="width:90%">
                  <h5>{$article.title} <button class="btn btn-outline-warning btn-sm py-0 btn-mini">{$article.web_id}</button></h5>
              </div>
          </div>
      </div>
      <div class="card-body">
        <p class="card-text">
            <h5>Average Duplication: {$article.duplicate_percentage}%</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                  <h5>Similar Results:</h5> {if $article.similar_results}{$article.similar_results}{else} no similar results found.{/if}
              </li>
             </ul>
        </p>
      </div>
    </div>
            