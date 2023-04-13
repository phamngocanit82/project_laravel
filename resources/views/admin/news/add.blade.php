<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <form action="{{route('admin.news.post-add')}}" method="POST" id="admin_news_add">
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Title</label>
              <input class="form-control" name="news_title" value="{{old('news_title')}}">
              <div><span class="text-danger news_title_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Sub title</label>
              <input class="form-control" name="news_sub_title" value="{{old('news_sub_title')}}">
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <div><textarea class="form-control" id="news_description" name="news_description">{{old('news_description')}}</textarea><div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Image</label>
              <input class="form-control" type="file" name="file" id="image_news_upload" accept=".png, .jpg, .gif">
              <div id="image_show"></div>
              <input type="hidden" name="image_hidden" id="image_hidden">
              <input type="hidden" name="thumb_hidden" id="thumb_hidden">
              <input type="hidden" name="width_hidden" id="width_hidden">
              <input type="hidden" name="height_hidden" id="height_hidden">
            </div>
          </div>
          <div class="mt-4">
            <input class="form-check-input" type="checkbox" id="news_active" name="news_active" checked>
            <label class="form-label">Active</label>
          </div>
          <button class="btn btn-primary" type="submit" id="button_save" hidden>Add</button>
          <a class="ms-4 btn btn-primary" href="/admin/news/list" hidden>List</a>
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
@section('ajax')
<script src="/templates/admin/ajax_project_laravel/file_upload.js"></script>
<script src="/templates/admin/ajax_project_laravel/news.js"></script>
<script src="{{ asset('/templates/admin/ckeditor/ckeditor.js') }}"></script>
<script>
  CKEDITOR.replace( 'news_description' );
</script>
@endsection