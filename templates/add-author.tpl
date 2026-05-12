{include file="header.tpl"}
{include file="navbar.tpl"}


 <form method="POST" action="">
        
            <div class="form-group">
               <label for="name">Author Name and Last Name:</label>
               <input type="text" class="form-control" placeholder="Enter Name and Last Name" name="name" id="name" required>
            </div>
            
            
            <div class="form-group">
               <label for="email">Email:</label>
               <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" required>
            </div>
                
            <button name="add_button" class="btn btn-default">Submit</button>
 </form>
 
{include file="footer.tpl"}
 