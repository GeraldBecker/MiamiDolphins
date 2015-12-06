/*Redirects the page and adds the order by selected by the user.
*/
function OrderSort(orderby)
{
    location.href = "/players/order/" + orderby;
}

function ChangeLayout(layout) {
    location.href = "/players/changeLayout/" + layout;	
}

function TeamOrderSort(team_orderby)
{
    location.href = "/teams/order/" + team_orderby;
}

function TeamChangeLayout(team_layout) {
    location.href = "/teams/changeLayout/" + team_layout;	
}

function predict() {
  var options = {
    'team' : $( "#teams" ).val()
  }
  $.post('/welcome/predict', options, function(data) {
    $("#prediction").html(data);
  });
}

