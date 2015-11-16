<div class="playerstable">
    <a href='/player/add'>Add a new player</a> 
    <table>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Position</th>
            <th>Number</th>
            <th>Player History</th>
        </tr>
        {players}
        <tr>
            <th><img src="assets/images/{image}"></th>
            <td>{firstname} {lastname}</td>
            <td>{position}</td>
            <td>{playernum}</td>
            <td>{info}</td>
        </tr>
        {/players}
    </table>
</div>
