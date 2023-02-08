$(document).ready(function(){
  $('#admin_product_group').on('submit', function(e){
    e.preventDefault();
    let product_name = $('input[name="product_name"]').val().trim();
    let product_desc = $('textarea[name="product_desc"]').val().trim();
    let action_url = $(this).attr('action');
    let csrfToken = $(this).find('input[name="_token"]').val().trim();
    console.log(csrfToken);
    $.ajax({
      url: action_url,
      type: 'POST',
      data: {
        product_name: product_name,
        product_desc: product_desc,
        _token: csrfToken
      },
      dataType: 'json',
      success: function(response){
        $('.product_name_error').text('');
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