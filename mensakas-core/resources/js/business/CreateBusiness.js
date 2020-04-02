
$("#add").click(function() {
$.ajax({
        type: 'post',
        url: window.location.origin+'/api/businesses',
        data: {
            '_token': $('input[id=_token]').val(),
            'name': $('input[name=name]').val(),
            'phone': $('input[phone=phone]').val(),
            'street': $('input[street=street]').val(),
            'number': $('input[number=number]').val(),
            'city': $('input[city=city]').val(),
            'zip_code':$('input[zip_code=zip_code]').val()
        },
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.name);
            } else {
                $('.error').remove();
                $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Destroy</button></td></tr>");
            }
        },
    });
}); 
