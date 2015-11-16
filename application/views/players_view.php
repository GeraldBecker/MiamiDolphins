<div>
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
    <p><b>Current Layout: Table</b></p>
</div>
<div  class="playerstable"> 
    
    <table>
        <tr>
            <td colspan="4" style="border:none;"><a href='/player/add' style="font-size:24px;">Add a new player</a> </td>
        </tr>
        <tr class="playerstable">
            <!-- <th></th> -->
            <th class="playerstable">Name</th>
            <th class="playerstable">Position</th>
            <th class="playerstable">Number</th>
            <th class="playerstable">Player History</th>
        </tr>
        {players}
        <tr id="playerstable">
            <!-- <th><img src="/assets/images/{image}"></th> -->
            <td class="playerstable"><a href='/player/edit/{playerid}'>{firstname} {lastname}</a></td>
            <td class="playerstable">{position}</td>
            <td class="playerstable">{playernum}</td>
            <td class="playerstable">{info}</td>
        </tr>
        {/players}
    </table>
    <div id="rosterlinks">
    {links}
    </div>
</div>
</div>
