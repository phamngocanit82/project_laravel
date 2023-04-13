<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <form action="{{route('admin.why-us.post-add')}}" method="POST" id="admin_why_us_add">
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Title</label>
              <input class="form-control" name="why_us_title" value="{{old('why_us_title')}}">
              <div><span class="text-danger why_us_title_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Sub title</label>
              <input class="form-control" name="why_us_sub_title" value="{{old('why_us_sub_title')}}">
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <textarea class="form-control" style ="height:60px" name="why_us_description">{{old('why_us_description')}}</textarea>
            </div>
          </div>
          <div class="mt-4">
            <input class="form-check-input" type="checkbox" id="why_us_active" name="why_us_active" checked>
            <label class="form-label">Active</label>
          </div>
          <button class="btn btn-primary" type="submit" id="button_save" hidden>Add</button>
          <a class="ms-4 btn btn-primary" href="/admin/why-us/list" hidden>List</a>
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
@section('ajax')
<script src="/templates/admin/ajax_project_laravel/file_upload.js"></script>
<script src="/templates/admin/ajax_project_laravel/why_us.js"></script>
@endsection