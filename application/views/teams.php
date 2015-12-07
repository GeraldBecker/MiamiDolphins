<div class="center_content">    
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
        <p><b>Current Layout: League</b></p>
    </div>
    
    <div class="teamtable">
        <table>
            <tr>
                <th></th>
                <th>Team</th>
                <th>Team Code</th>
                <th>Division</th>
                <th>Conference</th>
                <th>W</th>
                <th>L</th>
                <th>PF</th>
                <th>PA</th>
                <th>NP</th>
            </tr>
            {teamlist}
            <tr>
                <td class="nopadding"><img class="nfllogo" src="/assets/images/{image}" width="60px" height="60px"></td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{division}</td>
                <td>{conference}</td>
                <td>{wins}</td>
                <td>{losses}</td>
                <td>{ptsfor}</td>
                <td>{ptsagainst}</td>
                <td>{ptsnet}</td>
            </tr>
            {/teamlist}
        </table>
    </div>
</div>    