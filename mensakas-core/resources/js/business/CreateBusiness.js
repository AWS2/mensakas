
$("#add").click(function() {
$.ajax({
        type: 'post',
        url: '/business',
        data: {
            '_token': $('input[id=_token]').val(),
            'name': $('input[name=name]').val(),
            'phone': $('input[phone=phone]').val(),
            'logo': $('input[logo=logo]').val(),
            'image': $('input[image=image]').val(),
            'active': $('input[active=active]').val()
        },
        success: function(data) {
            if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.name);
            } else {
                $('.error').remove();
                $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.phone + "</td><td>" + data.logo + "</td><td>" + data.image + "</td><td>" + data.active + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Destroy</button></td></tr>");
            }
        },
    });
   $('#name').val('');
   $('#phone').val('');
   $('#logo').val('');
   $('#image').val('');
   $('#active').val('');
});