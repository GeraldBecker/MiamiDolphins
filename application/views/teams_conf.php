<div>    
    <div id="team_sort_form">
        Sort By: <select onchange="TeamOrderSort(this.value);">
            {teamsortoptions}
            <option value="{value}">{text}</option>
            {/teamsortoptions}
        </select>
        <p><b>Currently sorting by: {teamordermethod}</b></p>
    </div>   
    <div id="team_layout_form">
        Layout: <select onchange="TeamChangeLayout(this.value);">
            {teamlayoutoptions}
            <option value="{value}">{text}</option>
        {/teamlayoutoptions}
        </select>
        <p><b>Current Layout: Conference</b></p>
    </div>
    
    <div class="teamtable">
        <table>
            <tr>
                <th></th>
                <th>Conference</th>
                <th>Team</th>
                <th>Team Code</th>
                <th>Division</th>                
            </tr>
            {teamlist}
            <tr>
                <td class="nopadding"><img src="assets/images/{image}"></td>
                <td>{conference}</td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{division}</td>                
            </tr>
            {/teamlist}
        </table>
        <div id="teamlinks">
        {teamlinks}
        </div>
    </div>
</div>    