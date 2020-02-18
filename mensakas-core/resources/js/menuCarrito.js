$(document).ready(ready);

function ready(){

}

function addProduct(id){
    var divToClone = $('#'+id+' > #nameAndDescription');
    divToClone.clone().appendTo('#ShoppingCart');
}