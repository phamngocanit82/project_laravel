<div class="card card-solid">
  <div class="card-body pb-0">
    <div class="row">
    @if (!empty($user_list))
      @foreach ($user_list as $key => $item)
      <div class="col-xxl-4 col-lg-6">
        <div class="project-box mb-4">
          <div class="ribbon ribbon-clip-right ribbon-right ribbon-primary">{{$item->user_group_name}}</div>
          <div class="row gallery my-gallery" id="aniimated-thumbnials13" itemscope="" data-pswp-uid="14">
            <figure class="col-md-3 img-hover hover-14" itemprop="associatedMedia" itemscope=""><a href="{{$item->avatar}}" itemprop="contentUrl" data-size="{{$item->width}}x{{$item->height}}">
              <div><img class="img-65 me-1 rounded-circle" style="width:65px; height:65px; object-fit:cover;" src="{{$item->thumb}}" itemprop="thumbnail" alt="{{$item->first_name.' '.$item->last_name.' '.$item->middle_name.' - '.$item->user_group_name}}"></div></a>
              <figcaption itemprop="caption description">{{$item->first_name.' '.$item->last_name.' '.$item->middle_name.' - '.$item->user_group_name}}</figcaption>
            </figure>
          </div>
          <ul class="ms-0 mt-2 fa-ul">
            <li><div><span class="mt-2">{{$item->first_name.' '.$item->last_name.' '.$item->middle_name}}</span></div></li>
            <li><div class="mt-2"><span>{{$item->description}}</span></div></li>
          </ul>
          <ul class="ms-4 mt-2 fa-ul">
            <li><div><span class="small fa-li"><i class="fas fa-lg fa-phone"></i></span>{{$item->mobile_phone}}</div></li>
            <li><div class="mt-2"><span class="small fa-li"><i class="fas fa-lg fa-envelope"></i></span>{{$item->email}}</div></li>
          </ul>
          <div class="mt-4 float-end">
            <input class="form-check-input" type="checkbox" id="user_active" name="user_active" type="checkbox" onclick="activeId(this, {{$item->id}})" {!!$item->active==1? 'checked':''!!}>
            <a class="btn btn-info btn-xs" href="{{route('admin.user.edit', ['id'=>$item->id])}}"><i class="fas fa-pencil-alt me-1"></i>Edit</a>
            <a class="btn btn-danger btn-xs" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" onclick="passIdDelete({{$item->id}})"><i class="fas fa-trash me-1"></i>Delete</a>
          </div>
          <p class="mt-4">&nbsp;</p>
        </div>
      </div>
      @endforeach
    @endif
    </div>
  </div>
  @if ($user_list->lastPage()>1)
    <div class="d-flex justify-content-end mt-4 me-4 mb-4">{{$user_list->links()}}</div>
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
        <h5 class="modal-title" id="exampleModalLabel">Delete this user</h5>
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
<script src="/templates/admin/ajax_project_laravel/user.js"></script>
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
          title:'Error edit about user!', 
          customClass: {
            title: 'mt-2',
          }
        })
    }, 1);
</script>
@endif