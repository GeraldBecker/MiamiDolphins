Sort By: <select onchange="OrderSort(this.value);">
    {options}
    <option value="{value}">{text}</option>
    {/options}
</select>
<p><b>Currently sorting by: {ordermethod}</b></p>
<div class="playerstable">
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
            <th><img src="/assets/images/{image}"></th>
            <td>{firstname} {lastname}</td>
            <td>{position}</td>
            <td>{playernum}</td>
            <td>{info}</td>
        </tr>
        {/players}
    </table>
    <div id="rosterlinks">
    {links}
    </div>
</div>
