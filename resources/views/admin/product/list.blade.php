<div class="card card-solid">
  <div class="card-body pb-0">
    <div class="row">
    @if (!empty($product_list))
      @foreach ($product_list as $key => $item)
      <div class="col-xxl-4 col-lg-6">
        <div class="project-box mb-4">
          <div class="ribbon ribbon-clip-right ribbon-right ribbon-primary">{{$item->product_group_name}}</div>
          <div  class="gallery my-gallery mb-1" id="aniimated-thumbnials13" itemscope="" data-pswp-uid="14">
            <figure style="width:100px; height:100px;" class="col-md-3 img-hover hover-14" itemprop="associatedMedia" itemscope=""><a href="{{$item->image}}" itemprop="contentUrl" data-size="{{$item->width}}x{{$item->height}}">
              <div><img class="me-1 rounded-circle" style="width:100px; height:100px; object-fit:cover;" src="{{$item->thumb}}" itemprop="thumbnail" alt=""></div></a>
              <figcaption itemprop="caption description">{{$item->name.' - '.$item->product_group_name}}</figcaption>
            </figure>
          </div>
          <ul class="ms-0 fa-ul">
            <li><div><b><h5>{{$item->name}}</h5></b></div></li>
          </ul>
          <ul class="ms-0 fa-ul">
            <li><div><span class="small fa-li"></span>Code : <b><i>{{$item->code}}</i></b></div></li>
            <li><div><span class="small fa-li"></span>Price : <b><i>${{$item->price}}</i></b></div></li>
            <li><div><span class="small fa-li"></span>Sale : <b><i>${{$item->sale}}</i></b></div></li>
            <li><div><span class="small fa-li"></span>{{$item->description}}</div></li>
          </ul>
          <div class="mt-4 float-end">
            <input class="form-check-input" type="checkbox" id="product_active" name="user_active" onclick="activeId(this, {{$item->id}})" {!!$item->active==1? 'checked':''!!}>
            <a class="btn btn-info btn-xs" href="{{route('admin.product.edit', ['id'=>$item->id])}}"><i class="fas fa-pencil-alt me-1"></i>Edit</a>
            <a class="btn btn-danger btn-xs" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" onclick="passIdDelete({{$item->id}})"><i class="fas fa-trash me-1"></i>Delete</a>
          </div>
          <p class="mt-4">&nbsp;</p>
        </div>
      </div>
      @endforeach
    @endif
    </div>
  </div>
  @if ($product_list->lastPage()>1)
    <div class="d-flex justify-content-end mt-4 me-4 mb-4">{{$product_list->links()}}</div>
  @endif
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete this product</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Do you want to delete?</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-danger" type="button" onclick="deleteRowId()" data-bs-dismiss="modal">Delete</button>
        <input type="hidden" name="modal_hidden_value" id="modal_hidden_value">
      </div>
    </div>
  </div>
</div>
@section('ajax')
<script src="/templates/admin/ajax_project_laravel/product.js"></script>
@endsection
@if (session('msg'))
<script>
    setTimeout(function () { 
      var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500
                            });
        Toast.fire({ 
          icon: 'error',  
          title:'Error edit about product!', 
          customClass: {
            title: 'mt-2',
          }
        })
    }, 1);
</script>
@endif