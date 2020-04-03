$(".delete").click(function(){
    var confirmed = confirm('Are you sure you want to delete this business?');
    if (!confirmed) {
      return;
    }
    var tr = $(this).closest('tr');
    var id = tr.find('td:eq(1)').text();

    $.ajax(
    {
        url: "api/products/"+id,
        type: 'DELETE',
        success: function (res, textStatus, xhr) {
          if (xhr.status == 200) {
            tr.remove();
            createFlashAlert(res.msg, 'success');
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
