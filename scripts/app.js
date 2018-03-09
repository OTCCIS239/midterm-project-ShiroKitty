$(document).ready(function(){
    // console.log("Jquery is working");

    function displayProducts(){
        alert("HI");
    }

    $(".displayProducts").click(function(varname){
        alert(varname);
    });

    $('.orders').click( function() {
        $(location).attr('href', 'http://localhost/midterm-project-ShiroKitty/ordersInfo.php')
    });
});
