{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="title.tpl"}

     <div class="card" style="max-width: 100%; margin-top:1%">

      <div class="card-body">
        <p class="card-text">
            <ul class="list-group list-group-flush">
              <li class="list-group-item border-top-0">
                  Number of Websites: {$websites_number}
              </li>
              <li class="list-group-item">
                 Websites Speed: 
                 
                     {if $loading_errors}
                     <small class="text-muted">
                         {$loading_errors}
                     </small>
                     {else}
                        <span class="text-success">all websites are loading fast in less than 1.5 milisecond.</span>
                     {/if}
                 
              </li>
              <li class="list-group-item">
                  Total Number of Articles: {$articles_number}
              </li>
              <li class="list-group-item border-bottom-0">
                  Number of Users: {$users_number}
              </li>
              <li class="list-group-item">
                  Duplicate Checker Balance: {$balance}
              </li>
              <li class="list-group-item border-bottom-0">
                  Number of RSS Resources:
              </li>
                
            
             </ul>
        </p>
      </div>
     
    </div>
            