<div class="center_content">
    <div id="sort_form">
        Sort By: <select onchange="OrderSort(this.value);">
            {options}
            <option value="{value}">{text}</option>
            {/options}
        </select>
        <p><b>Currently sorting by: {ordermethod}</b></p>
    </div>
    
    <div id="layout_form">
        Layout: <select onchange="ChangeLayout(this.value);">
            {layoutoptions}
            <option value="{value}">{text}</option>
            {/layoutoptions}
        </select>
        <p><b>Current Layout: Gallery</b></p>
    </div>

    <a href='/player/add' style="font-size:24px;">Add a new player</a> 
    <br><br>

    
    <div class="row">
        {players}
        <div class="span4">
        	<img src="/assets/images/{image}" width="120px" height="120px">
        	<p id="gallery_player_info"><a href='/player/edit/{playerid}'>{firstname} {lastname}</a><b>{playernum}</b></p>

        </div>
        {/players}
    </div>
    
    <div id="rosterlinks">
    {links}
    
</div>