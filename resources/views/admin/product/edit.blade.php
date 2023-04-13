<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <form form action="{{route('admin.product.post-edit')}}" method="POST" id="admin_product_edit">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Product group list</label>
              <div style="display: flex;">
                <select class="form-select" name="product_group_id" id="product_group_id">
                  <option value="0">Choose product group</option>
                  @if(!empty($productGroup = \App\Helpers\Functions::getAllProductGroup()))
                    @foreach($productGroup as $item)
                  <option value="{{$item->id}}" 
                      {{request()->product_group_id ?? $product->product_group_id == $item->id?'selected':false}}>{{$item->name}}</option>
                    @endforeach
                  @endif 
                </select>
                <div class="mt-2 mx-2"><a class="text-dark" href="/admin/product-group/add"><i data-feather="file-plus"></i></a></div>
                <div class="mt-2 mx-2"><a class="text-dark" href="/admin/product-group/list"><i data-feather="layers"></i></a></div>
              </div>
              <div><span class="text-danger product_group_id_error"></span></div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-md-6 mt-4">
              <label class="form-label">Name</label>
              <input class="form-control" name="product_name" value="{{old('product_name') ?? $product->name}}">
              <div><span class="text-danger product_name_error"></span></div>
            </div>
            <div class="col-md-6 mt-4">
              <label class="form-label">Code</label>
              <input class="form-control" name="product_code" value="{{old('product_code') ?? $product->code}}">
              <div><span class="text-danger product_code_error"></span></div>
            </div>
          </div>
          <div class="row g-2">
            <div class="col-md-6 mt-4">
              <label class="form-label">Price</label>
              <input class="form-control" name="product_price" value="{{old('product_price') ?? $product->price}}">
            </div>
            <div class="col-md-6 mt-4">
              <label class="form-label">Sale</label>
              <input class="form-control" name="product_sale" value="{{old('product_sale') ?? $product->sale}}">
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <textarea class="form-control" style ="height:60px" name="product_description">{{old('product_description') ?? $product->description}}</textarea>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Image</label>
              <input class="form-control" type="file" name="file" id="image_product_upload" accept=".png, .jpg, .gif">
              <div id="image_show">
                <div class="row gallery my-gallery mt-4" id="aniimated-thumbnials13" itemscope="" data-pswp-uid="14">
                  <figure class="col-md-3 img-hover hover-14" itemprop="associatedMedia" itemscope=""><a href="{{$product->image}}" itemprop="contentUrl" data-size="{{$product->width}}x{{$product->height}}">
                    <div><img src="{{$product->thumb}}" itemprop="thumbnail" alt="Image description"></div></a>
                    <figcaption itemprop="caption description"></figcaption>
                  </figure>
                </div>
              </div>
              <input type="hidden" name="image_hidden" id="image_hidden" value="{{$product->image}}">
              <input type="hidden" name="thumb_hidden" id="thumb_hidden" value="{{$product->thumb}}">
              <input type="hidden" name="width_hidden" id="width_hidden" value="{{$product->width}}">
              <input type="hidden" name="height_hidden" id="height_hidden" value="{{$product->height}}">
            </div>
          </div>
          <div class="mt-4">
            <input class="form-check-input" type="checkbox" id="product_active" name="product_active" type="checkbox" onclick="activeId(this, {{$product->id}})" {!!$product->active==1? 'checked':''!!}>
            <label class="form-label">Active</label>
          </div>
          <button class="btn btn-primary" type="submit" id="button_save" hidden>Update</button>
          <a class="ms-4 btn btn-primary" href="/admin/product/list" hidden>List</a>
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
<script src="/templates/admin/ajax_project_laravel/product.js"></script>
@endsection