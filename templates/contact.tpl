{include file="header.tpl" title=$title}
{include file="navbar.tpl"}
{include file="title.tpl"}
<div style="display:flex; flex-wrap:wrap;">
    
    <div style="width:300px; margin-right:20px">
        <img style="margin-bottom:8px;width:300px" src="https://www.ukspa.org.uk/wp-content/uploads/2022/08/CRP_ScienceVillage_Exterior1-980x653.jpg">
    </div>
    
    <div>
        International Journal of Advanced Energy Researches (IJAER) <br>
        Clama Magazine Publication<br>
        Garden Cottage, Chesterford Research Park, <br>
        Little Chesterford, Essex England, CB10 1XL. 
        <br>
        Tel (United Kingdom): +441733 568388 (landline)<br>
        Tel (United State): +1 205 5787 077<br>
        Tel (Canada): +1 910 384 0378<br>
        Fax: +441733 568384 <br>
    </div>
</div>
<br><br>


    {if $msg}
        <div class="alert alert-success">
           <strong>{$msg}</strong>
        </div>
    {/if}
<h5>Contact</h5>
    <form method="POST" action="">
            <div class="form-group">
               <input type="text" class="form-control" placeholder="Name and last name" name="name" required>
            </div>
            
            <div class="form-group">
               <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            
            <div class="form-group">
                <textarea class="form-control" rows="8" name="message" placeholder="Enter message" required></textarea>
            </div>
            
            <button name="send_button" class="btn btn-primary">Send</button>
    </form>
{include file="footer.tpl"}
 