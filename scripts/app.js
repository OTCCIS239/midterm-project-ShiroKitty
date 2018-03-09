$(document).ready(function(){
     console.log("Jquery is working");

    $('.orders').click( function() {
        $(location).attr('href', 'http://localhost/midterm-project-ShiroKitty/ordersInfo.php')
    });
});

function displayProduct(name, description){
    alert('Name: ' + name +
         '\n\nDescription: ' + description);
}