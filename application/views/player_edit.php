<div class="row">
    <div class="errors">{message}</div>
    <form action="/player/confirm" method="post">        
        {fplayerid}
        {ffirstname}
        {flastname}
        {fteamcode}
        {fplayernum}
        {fposition}
        {fimage}
        {finfo}        
        {fsubmit}
        <button type="submit" name="submitType" value="delete" class="btn btn-danger">Delete</button>
        <button type="submit" name="submitType" value="cancel" class="btn">Cancel</button>
    </form>    
</div>