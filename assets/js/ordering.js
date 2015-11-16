/*Redirects the page and adds the order by selected by the user.
*/
function OrderSort(orderby)
{
     location.href += "/order/" + orderby;
}

function ChangeLayout(layout) {
	location.href += "/changeLayout/" + layout;	
}

