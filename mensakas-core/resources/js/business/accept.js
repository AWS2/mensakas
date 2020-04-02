const _BID = window.location.pathname.split('/')[3];
const _OID = window.location.pathname.split('/')[5];
const _URL = window.origin+'/api/businesses/'+_BID+'/order/'+_OID;

$(document).ready(main);

function main() {
  $('#acceptBtn').click(accept);
}

function accept() {
  var strMsg = prompt('Additional message (optional): ');
  if (strMsg === null) {
    // User clicked on cancel button
    return;
  }
  var strTime = $('input[name="time"]').val();
  if (strTime) {
    $('#loadingModal').modal('show');
    $.ajax({
      url: _URL+'?time='+strTime+'&message='+strMsg,
      method: 'PATCH',
      contentType: 'application/json',
      dataType: 'json',
      success: onSucess,
      error: onError
    });
  } else {
    var msg = 'You can\'t accept this order, you didn\'t set a delivery time.';
    var type = 'danger';
    createFlashAlert(msg, type);
  }

  function onSucess(res, textStatus, xhr) {
    var type = 'danger';
    if (res.status == 200) {
      type = 'success';
      $('#status').text(res.new_status);
      $('#message').text(res.new_message);
      $('#time').text(res.delivery_time);
      var form = $('#acceptForm');
      form.after('<p id="waiting">'+res.text+'</p>');
      form.remove();
    }
    $('#loadingModal').modal('hide');
    createFlashAlert(res.msg, type);
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
