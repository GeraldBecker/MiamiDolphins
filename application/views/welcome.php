<div >
    <!--<img id="main_logo" src="assets/images/MiamiDolphinsWebpageLogo.jpg"> -->
    <table id="membertable">
        <tr>
            <th><h3>Members</h3></th>
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