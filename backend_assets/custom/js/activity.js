
function act_show(e){
  $('#act_detail').html("");
  var detail    = $(e).data('detail');
  $('#act_detail').html(detail);
  $('#add-data').modal('show');
}
