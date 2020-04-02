$(".delete").click(function(){

    var tr = $(this).closest('tr');
    var id = tr.find('td:eq(1)').text();
   
    $.ajax(
    {
        url: "api/businesses/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
            tr.remove()
        }
    });
   
});
