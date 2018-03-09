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

function displayOrder(orderDate, shipDate, creditCard, billingAddress, price, discountAmt, taxAmt, shippingAmt){
    var total = price + taxAmt + shippingAmt - discountAmt;
    if(shipDate == ''){
        shipDate = 'Not yet shipped';
    }
    alert('Order Date: ' + orderDate +
    '\nShipping Date: ' + shipDate +
    '\nCard Number: ' + creditCard +
    '\nBilling Address: ' + billingAddress +
    '\nList Price: ' + '$' + price.toFixed(2) +
    '\n Discount: ' + '$' + discountAmt.toFixed(2)+
    '\n Tax: ' + '$' + taxAmt.toFixed(2) +
    '\n Shipping: ' + '$' + shippingAmt.toFixed(2) +
    '\nTotal: ' + '$' + total.toFixed(2));
}
