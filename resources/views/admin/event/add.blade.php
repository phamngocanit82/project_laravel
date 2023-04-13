<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <form action="{{route('admin.event.post-add')}}" method="POST" id="admin_event_add">
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Title</label>
              <input class="form-control" name="event_title" value="{{old('event_title')}}">
              <div><span class="text-danger event_title_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Sub title</label>
              <input class="form-control" name="event_sub_title" value="{{old('event_sub_title')}}">
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Price</label>
              <input class="form-control" name="event_price" value="{{old('event_price')}}">
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <textarea class="form-control" style ="height:60px" name="event_description">{{old('event_description')}}</textarea>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Image</label>
              <input class="form-control" type="file" name="file" id="image_event_upload" accept=".png, .jpg, .gif">
              <div id="image_show"></div>
              <input type="hidden" name="image_hidden" id="image_hidden">
              <input type="hidden" name="thumb_hidden" id="thumb_hidden">
              <input type="hidden" name="width_hidden" id="width_hidden">
              <input type="hidden" name="height_hidden" id="height_hidden">
            </div>
          </div>
          <div class="mt-4">
            <input class="form-check-input" type="checkbox" id="event_active" name="event_active" checked>
            <label class="form-label">Active</label>
          </div>
          <button class="btn btn-primary" type="submit" id="button_save" hidden>Add</button>
          <a class="ms-4 btn btn-primary" href="/admin/event/list" hidden>List</a>
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
@section('ajax')
<script src="/templates/admin/ajax_project_laravel/file_upload.js"></script>
<script src="/templates/admin/ajax_project_laravel/event.js"></script>
@endsection