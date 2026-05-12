{include file="header.tpl" title=$title}
{include file="navbar.tpl"}


    
<div class="card" style="max-width: 100%; margin-top:1%">
      <div class="card-header">
      <h5>  {$feed_channel->title} - {$feed_channel->description} </h5>
      </div>
      <div class="card-body mt-0">
        <p class="card-text">
            <ul class="list-group list-group-flush">
                {foreach from=$feed_channel->item item=$feed_item}
                      <li class="list-group-item border-top-0">
                            <a href="{$feed_item->link}">{$feed_item->title}</a>
                      </li>
                      <li class="list-group-item">
                           {$feed_item->description}
                      </li>
                {/foreach}
             </ul>
        </p>
      </div>
</div>
<br>
<h5>The Generated Article from the above RSS Feed</h5>
<br>
<div class="card" style="max-width: 100%; margin-top:1%">
      <div class="card-header">
      <h5>  {$rss.head.title} - {$rss.head.description} </h5>
      </div>
      <div class="card-body mt-0">
        <p class="card-text">
                {foreach from=$rss.items item=$item}
                        {$item.title} {$item.description}
                {/foreach}
        </p>
      </div>
</div>

   