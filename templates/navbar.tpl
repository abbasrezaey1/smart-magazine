<input id="trigger" type="checkbox">


<div id="viewport">
    <div style="width:50%; display:inline-block">
        <div style="display:flex; width: 50%; align-items:center">
{if $isAdmin}
    <label style="margin-right:2%" class="menu-icon" for="trigger">
        {if !$logo}
          <div style="height:15px"></div>
        {/if}
          <div class="h-line"></div>
          <div class="h-line"></div>
    </label>
{/if}

    <label style="margin-right:2%" class="menu-icon" for="trigger-2">
        <div style="height:15px"></div>
        <div class="h-line"></div>
        <div class="h-line"></div>
    </label>


            <a href="http://{$website}">
                {if $logo}
                <div>
                    <img class="logo" src="{$base_url}/logo/{$web_no}.png">
                </div>
                {/if}
                {if $logo_small}
                <div>
                    <img class="logo-small" src="{$base_url}/logo/small-{$web_no}.png">
                </div>
                {/if}
            </a>
           
        </div>
    </div>
    
    
    
    <div id="content">
      

<input id="trigger-2" type="checkbox">
<div class="box-2">
        <nav id="navigation-bar" class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav">

                <li>
                    <a class="nav-link" href="http://{$website}">Home</a>
                </li>
                
                <li>
                    <a class="nav-link" href="http://{$website}/about">About</a>
                </li>
                
                <li>
                    <a class="nav-link" href="http://{$website}/editorial-team">Editorial Board</a>
                </li>
                
                <li>
                    <a class="nav-link" href="http://{$website}/energy-articles">Energy Articles</a>
                </li>
                
                <li>
                    <a class="nav-link" href="http://{$website}/contact">Contact</a>
                </li>
                
            </ul>
        </nav>
</div>
<br>

  <br>