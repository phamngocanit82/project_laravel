function resetFields(){
  /*$('input[name="about_title"]').val("");
  $('input[name="about_sub_title"]').val("");
  $('textarea[name="about_description"]').val("");
  $('input[name="file"]').val("");
  $('input[name="image_hidden"]').val("");
  $('input[name="thumb_hidden"]').val("");
  $('input[name="width_hidden"]').val("");
  $('input[name="height_hidden"]').val("");
  $('#image_show').html('');*/
}
function resetErrorFields(){
  $('.about_title_error').text('');
  $('.about_title_error').text('');
}
function submitForm() {
  let button_save = document.getElementById("button_save");
  button_save.click();
}
$(document).ready(function(){
  $('#admin_about_add').on('submit', function(e){
    e.preventDefault();
    let about_title = $('input[name="about_title"]').val().trim();
    let about_sub_title = $('input[name="about_sub_title"]').val().trim();
    let about_description = CKEDITOR.instances.about_description.getData();
    let image_hidden = $('input[name="image_hidden"]').val().trim();
    let thumb_hidden = $('input[name="thumb_hidden"]').val().trim();
    let width_hidden = $('input[name="width_hidden"]').val().trim();
    let height_hidden = $('input[name="height_hidden"]').val().trim();
    var about_active = $('#about_active');
    active = 0;
    if(about_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        about_title: about_title,
        about_sub_title: about_sub_title,
        about_description: about_description,
        image_hidden: image_hidden,
        thumb_hidden: thumb_hidden,
        width_hidden: width_hidden,
        height_hidden: height_hidden,
        about_active: active,
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

  $('#admin_about_edit').on('submit', function(e){
    e.preventDefault();
    let about_title = $('input[name="about_title"]').val().trim();
    let about_sub_title = $('input[name="about_sub_title"]').val().trim();
    let about_description = CKEDITOR.instances.about_description.getData();
    let image_hidden = $('input[name="image_hidden"]').val().trim();
    let thumb_hidden = $('input[name="thumb_hidden"]').val().trim();
    let width_hidden = $('input[name="width_hidden"]').val().trim();
    let height_hidden = $('input[name="height_hidden"]').val().trim();
    var about_active = $('#about_active');
    active = 0;
    if(about_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        about_title: about_title,
        about_sub_title: about_sub_title,
        about_description: about_description,
        image_hidden: image_hidden,
        thumb_hidden: thumb_hidden,
        width_hidden: width_hidden,
        height_hidden: height_hidden,
        about_active: active,
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

function activeId(element){
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
      about_active: active
    },
    url: '/admin/about/active',
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
    url: '/admin/about/delete',
    success: function (result) {
      location.reload();
    }
  })
}