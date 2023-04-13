<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <form form action="{{route('admin.user.post-edit')}}" method="POST" id="admin_user_edit">
          <div class="row g-3">
            <div class="col-md-9">
              <label class="form-label">User group list</label>
              <div style="display: flex;">
                <select class="form-select" name="user_group_id" id="user_group_id">
                  <option value="0">Choose user group</option>
                  @if(!empty($userGroup = \App\Helpers\Functions::getAllUserGroup()))
                    @foreach($userGroup as $item)
                  <option value="{{$item->id}}" 
                      {{request()->user_group_id ?? $user->user_group_id == $item->id?'selected':false}}>{{$item->name}}</option>
                    @endforeach
                  @endif 
                </select>
                <div class="mt-2 mx-2"><a class="text-dark" href="/admin/user-group/add"><i data-feather="file-plus"></i></a></div>
                <div class="mt-2 mx-2"><a class="text-dark" href="/admin/user-group/list"><i data-feather="layers"></i></a></div>
              </div>
              <div><span class="text-danger user_group_id_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-4 mt-4">
              <label class="form-label">First name</label>
              <input class="form-control" name="user_first_name" value="{{old('user_first_name') ?? $user->first_name}}">
              <div><span class="text-danger user_first_name_error"></span></div>
            </div>
            <div class="col-md-4 mt-4">
              <label class="form-label">Last name</label>
              <input class="form-control" name="user_last_name" value="{{old('user_last_name') ?? $user->last_name}}">
              <div><span class="text-danger user_last_name_error"></span></div>
            </div>
            <div class="col-md-4 mt-4">
              <label class="form-label">Middle name</label>
              <input class="form-control" name="user_middle_name" value="{{old('user_middle_name') ?? $user->middle_name}}">
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <textarea class="form-control" style ="height:60px" name="user_description">{{old('user_description') ?? $user->description}}</textarea>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Mobile phone</label>
              <input class="form-control" type="tel" name="user_mobile_phone" value="{{old('user_mobile_phone') ?? $user->mobile_phone}}">
              <div><span class="text-danger user_mobile_phone_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Email</label>
              <input class="form-control" type="email" name="user_email" value="{{old('user_email') ?? $user->email}}">
              <div><span class="text-danger user_email_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Password</label>
              <input class="form-control" type="password" disabled name="user_password" value="{{old('user_password') ?? $user->password}}">
              <div><span class="text-danger user_password_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Confirm Password</label>
              <input class="form-control" type="password" disabled name="user_confirm_password" value="{{old('user_password') ?? $user->password}}">
              <div><span class="text-danger user_confirm_password_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Avatar</label>
              <input class="form-control" type="file" name="file" id="image_user_upload" accept=".png, .jpg, .gif">
              <div id="image_user_show">
                <div class="row gallery my-gallery mt-4" id="aniimated-thumbnials13" itemscope="" data-pswp-uid="14">
                  <figure class="col-md-3 img-hover hover-14" itemprop="associatedMedia" itemscope=""><a href="{{$user->avatar}}" itemprop="contentUrl" data-size="{{$user->width}}x{{$user->height}}">
                    <div><img src="{{$user->thumb}}" itemprop="thumbnail" alt="Image description"></div></a>
                    <figcaption itemprop="caption description"></figcaption>
                  </figure>
                </div>
              </div>
              <input type="hidden" name="avatar_hidden" id="avatar_hidden" value="{{$user->avatar}}">
              <input type="hidden" name="thumb_hidden" id="thumb_hidden" value="{{$user->thumb}}">
              <input type="hidden" name="width_hidden" id="width_hidden" value="{{$user->width}}">
              <input type="hidden" name="height_hidden" id="height_hidden" value="{{$user->height}}">
            </div>
          </div>
          <div class="mt-4">
            <input class="form-check-input" type="checkbox" id="user_active" name="user_active" type="checkbox" onclick="activeId(this, {{$user->id}})" {!!$user->active==1? 'checked':''!!}>
            <label class="form-label">Active</label>
          </div>
          <button class="btn btn-primary" type="submit" id="button_save" hidden>Update</button>
          <a class="ms-4 btn btn-primary" href="/admin/user/list" hidden>List</a>
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
<script src="/templates/admin/ajax_project_laravel/user.js"></script>
@endsection