<div >
    <img id="stadium" src="assets/images/stadium.jpg">
    
    <table id="membertable">
        <tr>
            <th><h3>Our Team</h3></th>
        </tr>
        <tr>
            {member_list}
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img id="member_image" src="assets/images/member_images/{image}"></td>
            {/member_list}
        </tr>
        <tr>
            {member_list}
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{name}</td>
            {/member_list}
        </tr>
    </table>
</div>