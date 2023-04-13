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
'<figure class="col-md-3 img-hover hover-14" itemprop="associatedMedia" itemscope=""><a href="' + results.path + '" itemprop="contentUrl" data-size="' + results.width + 'x' + results.height + '" data-bs-original-title="" title="" >' +
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
  $('#image_user_upload').change(function () {
    file_upload('#image_user_upload', '#image_user_show', '#avatar_hidden', 'user');
  });
  $('#image_section_about_upload').change(function () {
    file_upload('#image_section_about_upload', '#image_show', '#image_hidden', 'section_about');
  });
  $('#image_product_group_upload').change(function () {
    file_upload('#image_product_group_upload', '#image_show', '#image_hidden', 'product_group');
  });
  $('#image_product_upload').change(function () {
    file_upload('#image_product_upload', '#image_show', '#image_hidden', 'product');
  });
  $('#image_special_upload').change(function () {
    file_upload('#image_special_upload', '#image_show', '#image_hidden', 'special');
  });
  $('#image_event_upload').change(function () {
    file_upload('#image_event_upload', '#image_show', '#image_hidden', 'event');
  });
  $('#image_news_upload').change(function () {
    file_upload('#image_news_upload', '#image_show', '#image_hidden', 'news');
  });
  $('#image_gallery_upload').change(function () {
    file_upload('#image_gallery_upload', '#image_show', '#image_hidden', 'gallery');
  });
  $('#image_about_upload').change(function () {
    file_upload('#image_about_upload', '#image_show', '#image_hidden', 'about');
  });
});