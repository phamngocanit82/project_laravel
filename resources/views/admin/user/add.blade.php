<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <form form action="{{route('admin.user.post-add')}}" method="POST" id="admin_user_add">
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">User group list</label>
              <select class="form-select" name="user_group_id" id="user_group_id">
                <option value="0">Choose user group</option>
                @if(!empty($userGroup = \App\Helpers\Functions::getAllUserGroup()))
                  @foreach($userGroup as $item)
                <option value="{{$item->id}}" 
                    {{request()->user_group_id == $item->id?'selected':false}}>{{$item->name}}</option>
                  @endforeach
                @endif 
              </select>
              <div><span class="text-danger user_group_id_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-4 mt-4">
              <label class="form-label">First name</label>
              <input class="form-control" name="user_first_name" value="{{old('user_first_name')}}">
              <div><span class="text-danger user_first_name_error"></span></div>
            </div>
            <div class="col-md-4 mt-4">
              <label class="form-label">Last name</label>
              <input class="form-control" name="user_last_name" value="{{old('user_last_name')}}">
              <div><span class="text-danger user_last_name_error"></span></div>
            </div>
            <div class="col-md-4 mt-4">
              <label class="form-label">Middle name</label>
              <input class="form-control" name="user_middle_name" value="{{old('user_middle_name')}}">
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <textarea class="form-control" style ="height:60px" name="user_description">{{old('user_description')}}</textarea>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Mobile phone</label>
              <input class="form-control" type="tel" name="user_mobile_phone" value="{{old('user_mobile_phone')}}">
              <div><span class="text-danger user_mobile_phone_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Email</label>
              <input class="form-control" type="email" name="user_email" value="{{old('user_email')}}">
              <div><span class="text-danger user_email_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Password</label>
              <input class="form-control" type="password" name="user_password" value="{{old('user_password')}}">
              <div><span class="text-danger user_password_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Confirm Password</label>
              <input class="form-control" type="password" name="user_confirm_password" value="{{old('user_confirm_password')}}">
              <div><span class="text-danger user_confirm_password_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Avatar</label>
              <input class="form-control" type="file" name="file" id="avatar_upload" accept=".png, .jpg, .gif">
              <div id="avatar_show"></div>
              <input type="hidden" name="avatar_hidden" id="avatar_hidden">
              <input type="hidden" name="thumb_hidden" id="thumb_hidden">
              <input type="hidden" name="width_hidden" id="width_hidden">
              <input type="hidden" name="height_hidden" id="height_hidden">
            </div>
          </div>
          <div class="mb-3 mt-2">
            <input class="form-check-input" type="checkbox" id="user_active" checked>
            <label class="form-label">Active</label>
          </div>
          <button class="btn btn-primary" type="submit">Add</button>
          <a class="ms-4 btn btn-primary" href="/admin/user/list">List</a>
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
@section('ajax')
<script src="/templates/admin/ajax_project_laravel/file_upload.js"></script>
<script src="/templates/admin/ajax_project_laravel/user.js"></script>
@endsection