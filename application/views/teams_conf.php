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
            <tr class="layoutheading">
                <td colspan="9">American Football Conference</td>
            </tr>                
            <tr>
                <th></th>
                <th>AFC Team</th>
                <th>Team Code</th>
                <th>Division</th>
                <th>W</th>
                <th>L</th>
                <th>PF</th>
                <th>PA</th>
                <th>NP</th>
            </tr>
            {teamListAFC}
            <tr>
                <td class="nopadding"><img src="/assets/images/{image}" width="60px" height="60px"></td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{division}</td>
                <td>{wins}</td>
                <td>{losses}</td>
                <td>{ptsfor}</td>
                <td>{ptsagainst}</td>
                <td>{ptsnet}</td>
            </tr>
            {/teamListAFC}
            <tr><td colspan="9" height="20px"> </td></tr>
            <tr class="layoutheading">
                <td colspan="9">National Football Conference</td>
            </tr>                
            <tr>
                <th></th>
                <th>NFC Team</th>
                <th>Team Code</th>
                <th>Division</th>
                <th>W</th>
                <th>L</th>
                <th>PF</th>
                <th>PA</th>
                <th>NP</th>
            </tr>
            {teamListNFC}
            <tr>
                <td class="nopadding"><img src="/assets/images/{image}" width="60px" height="60px"></td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{division}</td>
                <td>{wins}</td>
                <td>{losses}</td>
                <td>{ptsfor}</td>
                <td>{ptsagainst}</td>
                <td>{ptsnet}</td>
            </tr>
            {/teamListNFC}
        </table>
    </div>
</div>    

        