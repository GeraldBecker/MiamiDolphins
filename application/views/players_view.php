<div>
    <a href='/player/add'>Add a new player</a> 
    {ddl}
    <table>
        <tr class="playerstable">
            <!-- <th></th> -->
            <th class="playerstable"d="playerstable">Name</th>
            <th class="playerstable">Position</th>
            <th class="playerstable">Number</th>
            <th class="playerstable">Player History</th>
        </tr>
        {players}
        <tr id="playerstable">
            <!-- <th><img src="/assets/images/{image}"></th> -->
            <td class="playerstable">{firstname} {lastname}</td>
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
