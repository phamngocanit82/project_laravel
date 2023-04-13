function resetFields(){
  $('input[name="why_us_title"]').val("");
  $('input[name="why_us_sub_title"]').val("");
  $('textarea[name="why_us_description"]').val("");
}
function resetErrorFields(){
  $('.why_us_title_error').text('');
  $('.why_us_title_error').text('');
}
function submitForm() {
  let button_save = document.getElementById("button_save");
  button_save.click();
}
$(document).ready(function(){
  $('#admin_why_us_add').on('submit', function(e){
    e.preventDefault();
    let why_us_title = $('input[name="why_us_title"]').val().trim();
    let why_us_sub_title = $('input[name="why_us_sub_title"]').val().trim();
    let why_us_description = $('textarea[name="why_us_description"]').val().trim();
    var why_us_active = $('#why_us_active');
    active = 0;
    if(why_us_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        why_us_title: why_us_title,
        why_us_sub_title: why_us_sub_title,
        why_us_description: why_us_description,
        why_us_active: active,
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

  $('#admin_why_us_edit').on('submit', function(e){
    e.preventDefault();
    let why_us_title = $('input[name="why_us_title"]').val().trim();
    let why_us_sub_title = $('input[name="why_us_sub_title"]').val().trim();
    let why_us_description = $('textarea[name="why_us_description"]').val().trim();
    var why_us_active = $('#why_us_active');
    active = 0;
    if(why_us_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        why_us_title: why_us_title,
        why_us_sub_title: why_us_sub_title,
        why_us_description: why_us_description,
        why_us_active: active,
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
      why_us_active: active
    },
    url: '/admin/why-us/active',
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
    url: '/admin/why-us/delete',
    success: function (result) {
      location.reload();
    }
  })
}