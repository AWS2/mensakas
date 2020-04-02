$("#add").click(function() {
  var token = $('input[name=_token]').val();
  var name = $('input[name=name]');
  var phone = $('input[name=phone]');
  var street = $('input[name=street]');
  var number = $('input[name=number]');
  var city = $('input[name=city]');
  var zip_code = $('input[name=zip_code]');

  if (name.val() == '' || phone.val() == '' || street.val() == '' || number.val() == '' || city.val() == '' || zip_code.val() == '') {
    createFlashAlert('You can\'t create this business, there are empty fields.', 'danger');
    return;
  }

  $.ajax({
    type: 'post',
    url: window.origin+'/api/businesses',
    data: {
      '_token': token,
      'name': name.val(),
      'phone': phone.val(),
      'street': street.val(),
      'number': number.val(),
      'city': city.val(),
      'zip_code': zip_code.val()
    },
    success: function(res, textStatus, xhr) {
      if (xhr.status == 200) {
        name.val('');
        phone.val('');
        street.val('');
        number.val('');
        city.val('');
        zip_code.val('');
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
