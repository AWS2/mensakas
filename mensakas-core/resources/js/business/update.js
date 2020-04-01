const _ID = window.location.pathname.split('/')[2];
const _URL = window.location.origin+'/api/businesses/'+_ID;
const _YELLOW = '#fff3cd';
const _RED = '#f8d7da';
const _PARAMS = ['name', 'phone', 'street', 'number', 'city', 'zip_code'];

$(document).ready(main);

function main() {
  $('#update').click(updateBusiness);
  var inputs = $('input.form-control');
  inputs.on('input', onUpdateValues);
  inputs.each(function() {
    var input = $(this);
    input.data('old', input.val());
  });
}

function updateBusiness() {
  var objParams = {}, intUpdated = 0, intNull = 0;
  var inputs = $('input.form-control');
  inputs.each(setParams);
  if (intNull > 0) {
    createFlashAlert('You can\'t update this business, there are empty fields.', 'danger');
    return;
  }
  if (intUpdated == 0) {
    createFlashAlert('To update a business, at least update one value.', 'warning');
    return;
  }
  $('#loadingModal').modal('show');

  $.ajax({
    url: _URL,
    method: 'PUT',
    data: JSON.stringify(objParams),
    contentType: 'application/json',
    dataType: 'json',
    success: onSucess,
    error: onError
  });

  function setParams(index) {
    var input = $(this);
    var value = input.val();
    var key = _PARAMS[index];
    objParams[key] = value;

    var backgroundColor = input.attr('color');
    if (backgroundColor == _YELLOW) {
      intUpdated++;
    }
    else if (backgroundColor == _RED) {
      intNull++;
    }
  }

  function onSucess(res, textStatus, xhr) {
    $('#loadingModal').modal('hide');
    var type = 'danger';
    if (xhr.status == 200) {
      $('input.form-control').each(function() {
        var input = $(this);
        input.data('old', input.val());
        input.css('background-color', '');
        input.removeAttr('color');
      });
      type = 'success';
    }
    createFlashAlert(res.message, type);
  }

  function onError(xhr, textStatus, error) {
    $('#loadingModal').modal('hide');
    createFlashAlert(textStatus, 'danger');
  }
}

function createFlashAlert(msg, type) {
  $('div.alert').remove();
  var alert = '<div class="alert alert-'+type+' alert-dismissible fade show" role="alert">' + msg +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                  '<span aria-hidden="true">&times;</span>' +
                '</button>' +
              '</div>';
  $('main').before(alert);
}

function onUpdateValues() {
  var input = $(this);
  var oldValue = input.data('old');
  var value = input.val();
  if (value == null || value == '') {
    input.css('background-color', _RED);
    input.attr('color', _RED);
    return;
  }
  if (oldValue != value) {
    input.css('background-color', _YELLOW);
    input.attr('color', _YELLOW);
  } else {
    input.css('background-color', '');
    input.removeAttr('color');
  }
}
