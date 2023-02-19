function resetFields(){
  $('input[name="section_about_title"]').val("");
  $('textarea[name="section_about_description"]').val("");
  $('input[name="file"]').val("");
  $('input[name="image_hidden"]').val("");
  $('input[name="thumb_hidden"]').val("");
  $('input[name="width_hidden"]').val("");
  $('input[name="height_hidden"]').val("");
  $('#image_show').html('');
}
function resetErrorFields(){
  $('.section_about_title_error').text('');
}
function submitForm() {
  let button_save = document.getElementById("button_save");
  button_save.click();
}
$(document).ready(function(){
  $('#admin_section_about_add').on('submit', function(e){
    e.preventDefault();
    let section_about_title = $('input[name="section_about_title"]').val().trim();
    let section_about_description = $('textarea[name="section_about_description"]').val().trim();
    let image_hidden = $('input[name="image_hidden"]').val().trim();
    let thumb_hidden = $('input[name="thumb_hidden"]').val().trim();
    let width_hidden = $('input[name="width_hidden"]').val().trim();
    let height_hidden = $('input[name="height_hidden"]').val().trim();
    var section_about_active = $('#section_about_active');
    active = 0;
    if(section_about_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        section_about_title: section_about_title,
        section_about_description: section_about_description,
        image_hidden: image_hidden,
        thumb_hidden: thumb_hidden,
        width_hidden: width_hidden,
        height_hidden: height_hidden,
        section_about_active: active,
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

  $('#admin_section_about_edit').on('submit', function(e){
    e.preventDefault();
    let section_about_title = $('input[name="section_about_title"]').val().trim();
    let section_about_description = $('textarea[name="section_about_description"]').val().trim();
    let image_hidden = $('input[name="image_hidden"]').val().trim();
    let thumb_hidden = $('input[name="thumb_hidden"]').val().trim();
    let width_hidden = $('input[name="width_hidden"]').val().trim();
    let height_hidden = $('input[name="height_hidden"]').val().trim();
    var section_about_active = $('#section_about_active');
    active = 0;
    if(section_about_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        section_about_title: section_about_title,
        section_about_description: section_about_description,
        image_hidden: image_hidden,
        thumb_hidden: thumb_hidden,
        width_hidden: width_hidden,
        height_hidden: height_hidden,
        section_about_active: active,
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
      section_about_active: active
    },
    url: '/admin/section-about/active',
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
    url: '/admin/section-about/delete',
    success: function (result) {
      location.reload();
    }
  })
}