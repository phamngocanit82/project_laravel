function resetFields(){
  $('input[name="product_name"]').val("");
  $('input[name="product_code"]').val("");
  $('input[name="product_price"]').val("");
  $('input[name="product_sale"]').val("");
  $('textarea[name="product_description"]').val("");
  $('input[name="file"]').val("");
  $('input[name="image_hidden"]').val("");
  $('input[name="thumb_hidden"]').val("");
  $('input[name="width_hidden"]').val("");
  $('input[name="height_hidden"]').val("");
  $('#image_show').html('');
}
function resetErrorFields(){
  $('.product_group_id_error').text('');
  $('.product_name_error').text('');
  $('.product_code_error').text('');
}
$(document).ready(function(){
  $('#admin_product_add').on('submit', function(e){
    e.preventDefault();
    let product_group_id = $( "#product_group_id").val();
    let product_name = $('input[name="product_name"]').val().trim();
    let product_code = $('input[name="product_code"]').val().trim();
    let product_price = $('input[name="product_price"]').val().trim();
    let product_sale = $('input[name="product_sale"]').val().trim();
    let product_description = $('textarea[name="product_description"]').val().trim();
    let image_hidden = $('input[name="image_hidden"]').val().trim();
    let thumb_hidden = $('input[name="thumb_hidden"]').val().trim();
    let width_hidden = $('input[name="width_hidden"]').val().trim();
    let height_hidden = $('input[name="height_hidden"]').val().trim();
    var product_active = $('#product_active');
    active = 0;
    if(product_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        product_group_id: product_group_id,
        product_name: product_name,
        product_code: product_code,
        product_price: product_price,
        product_sale: product_sale,
        product_description: product_description,
        image_hidden: image_hidden,
        thumb_hidden: thumb_hidden,
        width_hidden: width_hidden,
        height_hidden: height_hidden,
        product_active: active,
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

  $('#admin_product_edit').on('submit', function(e){
    e.preventDefault();
    let product_group_id = $( "#product_group_id").val();
    let product_name = $('input[name="product_name"]').val().trim();
    let product_code = $('input[name="product_code"]').val().trim();
    let product_price = $('input[name="product_price"]').val().trim();
    let product_sale = $('input[name="product_sale"]').val().trim();
    let product_description = $('textarea[name="product_description"]').val().trim();
    let image_hidden = $('input[name="image_hidden"]').val().trim();
    let thumb_hidden = $('input[name="thumb_hidden"]').val().trim();
    let width_hidden = $('input[name="width_hidden"]').val().trim();
    let height_hidden = $('input[name="height_hidden"]').val().trim();
    var product_active = $('#product_active');
    active = 0;
    if(product_active.prop('checked'))
      active = 1;
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        product_group_id: product_group_id,
        product_name: product_name,
        product_code: product_code,
        product_price: product_price,
        product_sale: product_sale,
        product_description: product_description,
        image_hidden: image_hidden,
        thumb_hidden: thumb_hidden,
        width_hidden: width_hidden,
        height_hidden: height_hidden,
        product_active: active,
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
    url: '/admin/product/active',
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
    url: '/admin/product/delete',
    success: function (result) {
      location.reload();
    }
  })
}