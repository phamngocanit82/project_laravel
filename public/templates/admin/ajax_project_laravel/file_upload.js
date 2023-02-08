function file_upload(id_image_upload, id_image_show, url_image_hidden, folder){
  var form = new FormData();
  form.append('file', $(id_image_upload)[0].files[0]);
  form.append('folder', folder);
  $.ajaxSetup({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
  });
  $.ajax({
    processData: false,
    contentType: false,
    type: 'POST',
    dataType: 'JSON',
    data:form,
    url: '/admin/upload-services',
    success: function (results) {
      if (results.error === false) {
          $(id_image_show).html('<div class="row gallery my-gallery mt-4" id="aniimated-thumbnials13" itemscope="" data-pswp-uid="1">' +
'<figure class="col-md-3 img-hover hover-14" itemprop="associatedMedia" itemscope=""><a href="" itemprop="contentUrl" data-size="' + results.width + 'x' + results.height + '" data-bs-original-title="" title="" >' +
'<div><img src="' + results.path + '" itemprop="thumbnail" alt="Image description"></div></a>' +
'<figcaption itemprop="caption description"></figcaption>' +
'</figure>' +
'</div>');

          $(url_image_hidden).val(results.path);
          $('#thumb_hidden').val(results.thumb);
          $('#width_hidden').val(results.width);
          $('#height_hidden').val(results.height);
      } else {
          alert('Upload File Lỗi');
      }
    }
  });
}

$(document).ready(function(){
  $('#thumb_upload').change(function () {
    file_upload('#thumb_upload', '#thumb_show', '#thumb_hidden' , 'product');
  });
  $('#image_upload').change(function () {
    file_upload('#image_upload', '#image_show', '#image_hidden', 'product');
  });
  $('#avatar_upload').change(function () {
    file_upload('#avatar_upload', '#avatar_show', '#avatar_hidden', 'avatar');
  });
});