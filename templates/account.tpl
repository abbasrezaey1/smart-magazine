{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="title.tpl"}


     <div class="card" style="max-width: 100%; margin-top:1%">
      <div class="card-body">
        <p class="card-text">
            <ul class="list-group list-group-flush">
              <li class="list-group-item" style="margin-top:-14px;border-top:none">
                  Name: {$user.name} {$user.last_name}
              </li>
              <li class="list-group-item">
                  Country: {$user.country}
              </li>
              <li class="list-group-item">
                  Postal Code: {$user.post_code}
              </li>
              <li class="list-group-item">
                  Email: {$user.email}
              </li>
              <li class="list-group-item">
                  Password: *********
              </li>
              <li class="list-group-item" style="border-bottom:none; border-top:none">
                          <a href="logout" class="btn btn-primary">Logout</a>
              </li>
             </ul>
        </p>

      </div>
    </div>
            