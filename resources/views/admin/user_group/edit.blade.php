<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <form action="{{route('admin.user-group.post-edit')}}" method="POST" id="admin_user_group_edit">
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Name</label>
              <input class="form-control" name="user_group_name" value="{{old('user_group_name') ?? $user_group->name}}">
              <div><span class="text-danger user_group_name_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label" for="validationCustom04">Description</label>
              <textarea class="form-control" style ="height:60px" name="user_group_description">{{old('user_group_description') ?? $user_group->description}}</textarea>
            </div>
          </div>
          <div class="mt-4">
            <input class="form-check-input" type="checkbox" id="user_group_active" name="user_group_active" type="checkbox" onclick="activeId(this, {{$user_group->id}})" {!!$user_group->active==1? 'checked':''!!}>
            <label class="form-label">Active</label>
          </div>
          <button class="btn btn-primary" type="submit" id="button_save" hidden>Update</button>
          <a class="ms-4 btn btn-primary" href="/admin/user-group/list" hidden>List</a>
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
@section('ajax')
<script src="/templates/admin/ajax_project_laravel/user_group.js"></script>
@endsection