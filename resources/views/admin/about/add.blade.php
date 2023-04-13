<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <form action="{{route('admin.about.post-add')}}" method="POST" id="admin_about_add">
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Title</label>
              <input class="form-control" name="about_title" value="{{old('about_title')}}">
              <div><span class="text-danger about_title_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Sub title</label>
              <input class="form-control" name="about_sub_title" value="{{old('about_sub_title')}}">
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <div><textarea class="form-control" id="about_description" name="about_description">{{old('about_description')}}</textarea><div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Image</label>
              <input class="form-control" type="file" name="file" id="image_about_upload" accept=".png, .jpg, .gif">
              <div id="image_show"></div>
              <input type="hidden" name="image_hidden" id="image_hidden">
              <input type="hidden" name="thumb_hidden" id="thumb_hidden">
              <input type="hidden" name="width_hidden" id="width_hidden">
              <input type="hidden" name="height_hidden" id="height_hidden">
            </div>
          </div>
          <div class="mt-4">
            <input class="form-check-input" type="checkbox" id="about_active" name="about_active" checked>
            <label class="form-label">Active</label>
          </div>
          <button class="btn btn-primary" type="submit" id="button_save" hidden>Add</button>
          <a class="ms-4 btn btn-primary" href="/admin/about/list" hidden>List</a>
          @csrf
        </form>
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