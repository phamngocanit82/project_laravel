<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <form form action="{{route('admin.about.post-edit')}}" method="POST" id="admin_about_edit">
          <div class="row g-3">
            <div class="col-md-12">
            <label class="form-label">Title</label>
              <input class="form-control" name="about_title" value="{{old('about_title') ?? $about->title}}">
              <div><span class="text-danger about_title_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12">
            <label class="form-label">Sub title</label>
              <input class="form-control" name="about_sub_title" value="{{old('about_sub_title') ?? $about->sub_title}}">
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <textarea class="form-control" style ="height:60px" name="about_description">{{old('about_description') ?? $about->description}}</textarea>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Image</label>
              <input class="form-control" type="file" name="file" id="image_about_upload" accept=".png, .jpg, .gif">
              <div id="image_show">
                <div class="row gallery my-gallery mt-4" id="aniimated-thumbnials13" itemscope="" data-pswp-uid="14">
                  <figure class="col-md-3 img-hover hover-14" itemprop="associatedMedia" itemscope=""><a href="{{$about->image}}" itemprop="contentUrl" data-size="{{$about->width}}x{{$about->height}}">
                    <div><img src="{{$about->thumb}}" itemprop="thumbnail" alt="Image description"></div></a>
                    <figcaption itemprop="caption description"></figcaption>
                  </figure>
                </div>
              </div>
              <input type="hidden" name="image_hidden" id="image_hidden" value="{{$about->image}}">
              <input type="hidden" name="thumb_hidden" id="thumb_hidden" value="{{$about->thumb}}">
              <input type="hidden" name="width_hidden" id="width_hidden" value="{{$about->width}}">
              <input type="hidden" name="height_hidden" id="height_hidden" value="{{$about->height}}">
            </div>
          </div>
          <div class="mt-4">
          <input class="form-check-input" type="checkbox" id="about_active" name="about_active" onclick="activeId(this)" {!!$about->active==1? 'checked':''!!}>
            <label class="form-label">Active</label>
          </div>
          <button class="btn btn-primary" type="submit" id="button_save" hidden>Update</button>
          <a class="ms-4 btn btn-primary" href="/admin/about/list" hidden>List</a>
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Root element of PhotoSwipe. Must have class pswp.-->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  <!--
  Background of PhotoSwipe.
  It's a separate element, as animating opacity is faster than rgba().
  -->
  <div class="pswp__bg"></div>
  <!-- Slides wrapper with overflow:hidden.-->
  <div class="pswp__scroll-wrap">
    <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory.-->
    <!-- don't modify these 3 pswp__item elements, data is added later on.-->
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed.-->
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <!-- Controls are self-explanatory. Order can be changed.-->
        <div class="pswp__counter"></div>
        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
        <button class="pswp__button pswp__button--share" title="Share"></button>
        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
        <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR-->
        <!-- element will get class pswp__preloader--active when preloader is running-->
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div>
@section('ajax')
<script src="/templates/admin/ajax_project_laravel/file_upload.js"></script>
<script src="/templates/admin/ajax_project_laravel/about.js"></script>
<script src="{{ asset('/templates/admin/ckeditor/ckeditor.js') }}"></script>
<script>
  CKEDITOR.replace( 'about_description' );
</script>
@endsection