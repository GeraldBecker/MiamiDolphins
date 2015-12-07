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
        <p><b>Current Layout: Division</b></p>
    </div>
    
    <div class="teamtable">
        <table>
            <tr class="layoutheading">
                <td colspan="8">American Football Conference</td>
            </tr>                
            <tr>
                <th></th>
                <th>AFC East Team</th>
                <th>Team Code</th>
                <th>W</th>
                <th>L</th>
                <th>PF</th>
                <th>PA</th>
                <th>NP</th>
            </tr>
            {teamListAFCEast}
            <tr>
                <td class="nopadding"><img class="nfllogo"  class="nfllogo" src="/assets/images/{image}" width="60px" height="60px"></td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{wins}</td>
                <td>{losses}</td>
                <td>{ptsfor}</td>
                <td>{ptsagainst}</td>
                <td>{ptsnet}</td>
            </tr>
            {/teamListAFCEast}
            <tr>
                <td colspan="8" height="20px"> </td>
            </tr>
            <tr>
                <th></th>
                <th>AFC North Team</th>
                <th>Team Code</th>
                <th>W</th>
                <th>L</th>
                <th>PF</th>
                <th>PA</th>
                <th>NP</th>
            </tr>
            {teamListAFCNorth}
            <tr>
                <td class="nopadding"><img class="nfllogo"  class="nfllogo"  src="/assets/images/{image}" width="60px" height="60px"></td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{wins}</td>
                <td>{losses}</td>
                <td>{ptsfor}</td>
                <td>{ptsagainst}</td>
                <td>{ptsnet}</td>
            </tr>
            {/teamListAFCNorth}
            <tr>
                <td colspan="8" height="20px"> </td>
            </tr>
            <tr>
                <th></th>
                <th>AFC South Team</th>
                <th>Team Code</th>
                <th>W</th>
                <th>L</th>
                <th>PF</th>
                <th>PA</th>
                <th>NP</th>
            </tr>
            {teamListAFCSouth}
            <tr>
                <td class="nopadding"><img class="nfllogo"  class="nfllogo"  src="/assets/images/{image}" width="60px" height="60px"></td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{wins}</td>
                <td>{losses}</td>
                <td>{ptsfor}</td>
                <td>{ptsagainst}</td>
                <td>{ptsnet}</td>
            </tr>
            {/teamListAFCSouth}
            <tr>
                <td colspan="8" height="20px"> </td>
            </tr>
            <tr>
                <th></th>
                <th>AFC West Team</th>
                <th>Team Code</th>
                <th>W</th>
                <th>L</th>
                <th>PF</th>
                <th>PA</th>
                <th>NP</th>
            </tr>
            {teamListAFCWest}
            <tr>
                <td class="nopadding"><img class="nfllogo"  src="/assets/images/{image}" width="60px" height="60px"></td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{wins}</td>
                <td>{losses}</td>
                <td>{ptsfor}</td>
                <td>{ptsagainst}</td>
                <td>{ptsnet}</td>
            </tr>
            {/teamListAFCWest}
            <tr>
                <td colspan="8" height="20px"> </td>
            </tr>
            
            <tr class="layoutheading">
                <td colspan="8">National Football Conference</td>
            </tr>                
            <tr>
                <th></th>
                <th>NFC East Team</th>
                <th>Team Code</th>
                <th>W</th>
                <th>L</th>
                <th>PF</th>
                <th>PA</th>
                <th>NP</th>
            </tr>
            {teamListNFCEast}
            <tr>
                <td class="nopadding"><img class="nfllogo"  src="/assets/images/{image}" width="60px" height="60px"></td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{wins}</td>
                <td>{losses}</td>
                <td>{ptsfor}</td>
                <td>{ptsagainst}</td>
                <td>{ptsnet}</td>
            </tr>
            {/teamListNFCEast}
            <tr>
                <td colspan="8" height="20px"> </td>
            </tr>
            <tr>
                <th></th>
                <th>NFC North Team</th>
                <th>Team Code</th>
                <th>W</th>
                <th>L</th>
                <th>PF</th>
                <th>PA</th>
                <th>NP</th>
            </tr>
            {teamListNFCNorth}
            <tr>
                <td class="nopadding"><img class="nfllogo"  src="/assets/images/{image}" width="60px" height="60px"></td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{wins}</td>
                <td>{losses}</td>
                <td>{ptsfor}</td>
                <td>{ptsagainst}</td>
                <td>{ptsnet}</td>
            </tr>
            {/teamListNFCNorth}
            <tr>
                <td colspan="8" height="20px"> </td>
            </tr>
            <tr>
                <th></th>
                <th>NFC South Team</th>
                <th>Team Code</th>
                <th>W</th>
                <th>L</th>
                <th>PF</th>
                <th>PA</th>
                <th>NP</th>
            </tr>
            {teamListNFCSouth}
            <tr>
                <td class="nopadding"><img class="nfllogo"  src="/assets/images/{image}" width="60px" height="60px"></td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{wins}</td>
                <td>{losses}</td>
                <td>{ptsfor}</td>
                <td>{ptsagainst}</td>
                <td>{ptsnet}</td>
            </tr>
            {/teamListNFCSouth}
            <tr>
                <td colspan="8" height="20px"> </td>
            </tr>
            <tr>
                <th></th>
                <th>NFC West Team</th>
                <th>Team Code</th>
                <th>W</th>
                <th>L</th>
                <th>PF</th>
                <th>PA</th>
                <th>NP</th>
            </tr>
            {teamListNFCWest}
            <tr>
                <td class="nopadding"><img class="nfllogo"  src="/assets/images/{image}" width="60px" height="60px"></td>
                <td>{city} {name}</td>
                <td>{teamcode}</td>
                <td>{wins}</td>
                <td>{losses}</td>
                <td>{ptsfor}</td>
                <td>{ptsagainst}</td>
                <td>{ptsnet}</td>
            </tr>
            {/teamListNFCWest}
        </table>
    </div>
</div>    

        