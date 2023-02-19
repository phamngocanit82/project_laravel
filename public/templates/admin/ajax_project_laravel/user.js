function resetFields(){
  $('input[name="user_first_name"]').val("");
  $('input[name="user_last_name"]').val("");
  $('input[name="user_middle_name"]').val("");
  $('textarea[name="user_description"]').val("");
  $('input[name="user_mobile_phone"]').val("");
  $('input[name="user_email"]').val("");
  $('input[name="user_password"]').val("");
  $('input[name="user_confirm_password"]').val("");
  $('input[name="file"]').val("");
  $('input[name="avatar_hidden"]').val("");
  $('input[name="thumb_hidden"]').val("");
  $('input[name="width_hidden"]').val("");
  $('input[name="height_hidden"]').val("");
  $('#image_user_show').html('');
}
function resetErrorFields(){
  $('.user_group_id_error').text('');
  $('.user_first_name_error').text('');
  $('.user_first_name_error').text('');
  $('.user_last_name_error').text('');
  $('.user_mobile_phone_error').text('');
  $('.user_email_error').text('');
  $('.user_password_error').text('');
  $('.user_confirm_password_error').text('');
}
function submitForm() {
  let button_save = document.getElementById("button_save");
  button_save.click();
}
$(document).ready(function(){
  $('#admin_user_add').on('submit', function(e){
    e.preventDefault();
    let user_group_id = $( "#user_group_id").val();
    let user_first_name = $('input[name="user_first_name"]').val().trim();
    let user_last_name = $('input[name="user_last_name"]').val().trim();
    let user_middle_name = $('input[name="user_middle_name"]').val().trim();
    let user_description = $('textarea[name="user_description"]').val().trim();
    let user_mobile_phone = $('input[name="user_mobile_phone"]').val().trim();
    let user_email = $('input[name="user_email"]').val().trim();
    let user_password = $('input[name="user_password"]').val().trim();
    let user_confirm_password = $('input[name="user_confirm_password"]').val().trim();
    let avatar_hidden = $('input[name="avatar_hidden"]').val().trim();
    let thumb_hidden = $('input[name="thumb_hidden"]').val().trim();
    let width_hidden = $('input[name="width_hidden"]').val().trim();
    let height_hidden = $('input[name="height_hidden"]').val().trim();
    var user_active = $('#user_active');
    active = 0;
    if(user_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        user_group_id: user_group_id,
        user_first_name: user_first_name,
        user_last_name: user_last_name,
        user_middle_name:user_middle_name,
        user_description: user_description,
        user_mobile_phone: user_mobile_phone,
        user_email: user_email,
        user_password: user_password,
        user_confirm_password: user_confirm_password,
        avatar_hidden: avatar_hidden,
        thumb_hidden: thumb_hidden,
        width_hidden: width_hidden,
        height_hidden: height_hidden,
        user_active: active,
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

  $('#admin_user_edit').on('submit', function(e){
    e.preventDefault();
    let user_group_id = $( "#user_group_id").val();
    let user_first_name = $('input[name="user_first_name"]').val().trim();
    let user_last_name = $('input[name="user_last_name"]').val().trim();
    let user_middle_name = $('input[name="user_middle_name"]').val().trim();
    let user_description = $('textarea[name="user_description"]').val().trim();
    let user_mobile_phone = $('input[name="user_mobile_phone"]').val().trim();
    let user_email = $('input[name="user_email"]').val().trim();
    let user_password = $('input[name="user_password"]').val().trim();
    let user_confirm_password = $('input[name="user_confirm_password"]').val().trim();
    let avatar_hidden = $('input[name="avatar_hidden"]').val().trim();
    let thumb_hidden = $('input[name="thumb_hidden"]').val().trim();
    let width_hidden = $('input[name="width_hidden"]').val().trim();
    let height_hidden = $('input[name="height_hidden"]').val().trim();
    var user_active = $('#user_active');
    active = 0;
    if(user_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        user_group_id: user_group_id,
        user_first_name: user_first_name,
        user_last_name: user_last_name,
        user_middle_name:user_middle_name,
        user_description: user_description,
        user_mobile_phone: user_mobile_phone,
        user_email: user_email,
        user_password: user_password,
        user_confirm_password: user_confirm_password,
        avatar_hidden: avatar_hidden,
        thumb_hidden: thumb_hidden,
        width_hidden: width_hidden,
        height_hidden: height_hidden,
        user_active: active,
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
      user_active: active
    },
    url: '/admin/user/active',
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
    url: '/admin/user/delete',
    success: function (result) {
      location.reload();
    }
  })
}