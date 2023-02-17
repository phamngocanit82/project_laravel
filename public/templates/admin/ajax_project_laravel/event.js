function resetFields(){
  $('input[name="event_title"]').val("");
  $('input[name="event_sub_title"]').val("");
  $('input[name="event_price"]').val("");
  $('textarea[name="event_description"]').val("");
  $('input[name="file"]').val("");
  $('input[name="image_hidden"]').val("");
  $('input[name="thumb_hidden"]').val("");
  $('input[name="width_hidden"]').val("");
  $('input[name="height_hidden"]').val("");
  $('#image_show').html('');
}
function resetErrorFields(){
  $('.event_title_error').text('');
  $('.event_title_error').text('');
}
$(document).ready(function(){
  $('#admin_event_add').on('submit', function(e){
    e.preventDefault();
    let event_title = $('input[name="event_title"]').val().trim();
    let event_sub_title = $('input[name="event_sub_title"]').val().trim();
    let event_price = $('input[name="event_price"]').val().trim();
    let event_description = $('textarea[name="event_description"]').val().trim();
    let image_hidden = $('input[name="image_hidden"]').val().trim();
    let thumb_hidden = $('input[name="thumb_hidden"]').val().trim();
    let width_hidden = $('input[name="width_hidden"]').val().trim();
    let height_hidden = $('input[name="height_hidden"]').val().trim();
    var event_active = $('#event_active');
    active = 0;
    if(event_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        event_title: event_title,
        event_sub_title: event_sub_title,
        event_price: event_price,
        event_description: event_description,
        image_hidden: image_hidden,
        thumb_hidden: thumb_hidden,
        width_hidden: width_hidden,
        height_hidden: height_hidden,
        event_active: active,
        _token: csrfToken
      },
      dataType: 'json',
      success: function(response){
        resetErrorFields();
        resetFields();
        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500
                            });
        Toast.fire({ 
          icon: 'success',  
          title:'Added successful!', 
          customClass: {
            title: 'mt-2',
          }
        })
      },
      error: function(error){
        resetErrorFields();
        let responseJSON = error.responseJSON.errors;
        if(Object.keys(responseJSON).length>0){
          for(let key in responseJSON){
            $('.'+key+'_error').text(responseJSON[key][0]);
          }
        }
      }
    });
  });

  $('#admin_event_edit').on('submit', function(e){
    e.preventDefault();
    let event_title = $('input[name="event_title"]').val().trim();
    let event_sub_title = $('input[name="event_sub_title"]').val().trim();
    let event_price = $('input[name="event_price"]').val().trim();
    let event_description = $('textarea[name="event_description"]').val().trim();
    let image_hidden = $('input[name="image_hidden"]').val().trim();
    let thumb_hidden = $('input[name="thumb_hidden"]').val().trim();
    let width_hidden = $('input[name="width_hidden"]').val().trim();
    let height_hidden = $('input[name="height_hidden"]').val().trim();
    var event_active = $('#special_active');
    active = 0;
    if(event_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        event_title: event_title,
        event_sub_title: event_sub_title,
        event_price: event_price,
        event_description: event_description,
        image_hidden: image_hidden,
        thumb_hidden: thumb_hidden,
        width_hidden: width_hidden,
        height_hidden: height_hidden,
        event_active: active,
        _token: csrfToken
      },
      dataType: 'json',
      success: function(response){
        resetErrorFields();
        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500
                            });
        Toast.fire({ 
          icon: 'success',  
          title:'Updated successful!', 
          customClass: {
            title: 'mt-2',
          }
        })
      },
      error: function(error){
        let responseJSON = error.responseJSON.errors;
        if(Object.keys(responseJSON).length>0){
          for(let key in responseJSON){
            $('.'+key+'_error').text(responseJSON[key][0]);
          }
        }
      }
    });
  });
});

function activeId(element, id){
  active = 0;
  if(element.checked)
    active = 1;
  $.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
  });
  $.ajax({
    type: 'POST',
    datatype: 'JSON',
    data: { 
      id: id,
      event_active: active
    },
    url: '/admin/event/active',
    success: function (result) {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500
        });
      Toast.fire({ 
        icon: 'success',  
        title:'Updated active successful!', 
        customClass: {
        title: 'mt-2',
        }
      })
    }
  })
}
function passIdDelete(id) {
  $('#modal_hidden_value').val(id);
}
function deleteRowId() {
  let modal_hidden_value = $('input[name="modal_hidden_value"]').val().trim();
  $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
      });
  $.ajax({
    type: 'DELETE',
    datatype: 'JSON',
    data: { 
      id: modal_hidden_value
    },
    url: '/admin/event/delete',
    success: function (result) {
      location.reload();
    }
  })
}