/*Redirects the page and adds the order by selected by the user.
*/
function OrderSort(orderby)
{
    location.href = "/players/order/" + orderby;
}

function ChangeLayout(layout) {
	location.href = "/players/changeLayout/" + layout;	
}

