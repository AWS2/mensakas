$(document).ready(main);

function main() {
    console.log('menuCarrito');
    $(".add").click(addProduct);
    $(".remove").click(removeProduct);
}

function addProduct(e) {
    var counter = $(e.target).siblings()[2];
    var id = $(e.target).siblings().first().val();
    var nameAndDescription = $(e.target).parent().siblings().first();
    var price = $(e.target).parent().siblings().last();

    if(counter.innerHTML == 0){
        counter.innerHTML = parseInt(counter.innerHTML) + 1;
        $("<div class='col-10 row' id='"+id+"'></div>").appendTo('#ShoppingCart');
        nameAndDescription.clone().appendTo('#ShoppingCart > #'+id);
        price.clone().appendTo('#ShoppingCart > #'+id);
    }else{
        counter.innerHTML = parseInt(counter.innerHTML) + 1;
        var priceSum = $('#ShoppingCart > #'+id).children().last().children();
        var sum = parseFloat(priceSum.text()) + parseFloat(price.children().text());
        priceSum.text(sum.toFixed(2));
    }

    var total =  $(".total");
    var priceProducts =  $("#ShoppingCart > div > div > .price");
    var totalPrice = 0;
    priceProducts.each(function(){
        totalPrice = parseFloat($(this).text()) + totalPrice;
    });
    total.text(totalPrice.toFixed(2));
    $('.totalShopping').val(totalPrice.toFixed(2));
}

function removeProduct(e){
    var id = $(e.target).siblings().first().val();
    var counter = $(e.target).siblings()[1];
    var price = $(e.target).parent().siblings().last();
    console.log($(e.target).parent().siblings().last());
    if(counter.innerHTML == 0){

    }else if(counter.innerHTML == 1){
        $('#ShoppingCart > #'+id).remove();
        counter.innerHTML = parseInt(counter.innerHTML) - 1;
        //borrar el div
    }else{
        counter.innerHTML = parseInt(counter.innerHTML) - 1;
        var priceSum = $('#ShoppingCart > #'+id).children().last().children();
        var sum = parseFloat(priceSum.text()) - parseFloat(price.children().text());
        priceSum.text(sum.toFixed(2));
    }

    var total =  $(".total");
    var priceProducts =  $("#ShoppingCart > div > div > .price");
    var totalPrice = 0;
    priceProducts.each(function(){
        totalPrice = parseFloat($(this).text()) + totalPrice;
    });
    total.text(totalPrice.toFixed(2));
    $('.totalShopping').val(totalPrice.toFixed(2));

}

