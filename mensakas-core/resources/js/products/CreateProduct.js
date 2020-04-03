$("#create").click(function() {
  var token = $('input[name=_token]').val();
  var business_id = $('input[name=business_id"]');
  var price = $('input[name=price]');
  var avalible = $('input[name=avalible]');
  var language_id = $('input[name=language_id]');
  var name = $('input[name=name]');
  var description = $('input[name=description]');
  var category = $('input[name=category]');
  var mainProduct = $('input[name=mainProduct]');

  if (business_id.val() == '' || price.val() == '' || avalible.val() == '' || language_id.val() == '' || name.val() == '' || description.val() == '' || category.val() == '' || mainProduct.val() == '') {
    createFlashAlert('You can\'t create this business, there are empty fields.', 'danger');
    return;
  }

  $.ajax({
    type: 'post',
    url: window.origin+'/api/products',
    data: {
      '_token': token,
      'business_id': business_id.val(),
      'price': price.val(),
      'avalible': avalible.val(),
      'language_id': language_id.val(),
      'name': name.val(),
      'description': description.val(),
      'category': category.val(),
      'mainProduct': mainProduct.val()

    },
    success: function(res, textStatus, xhr) {
      if (xhr.status == 200) {
        business_id.val('');
        price.val('');
        avalible.val('');
        language_id.val('');
        name.val('');
        description.val('');
        category.val('');
        mainProduct.val('');
        createFlashAlert(res.message, 'success');
      }
    }
  });
});

function createFlashAlert(msg, type) {
  $('div.alert').remove();
  var alert = '<div class="alert alert-'+type+' alert-dismissible fade show" role="alert">' + msg +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                  '<span aria-hidden="true">&times;</span>' +
                '</button>' +
              '</div>';
  $('main').before(alert);
}
