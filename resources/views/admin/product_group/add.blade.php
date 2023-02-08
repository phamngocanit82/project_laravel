<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <form action="{{route('admin.product-group.post-add')}}" method="POST" id ="admin_product_group" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Name</label>
              <input class="form-control" type="text" name="product_name" value="{{old('product_name')}}">
              <div><span class="text-danger product_name_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <textarea class="form-control" style ="height:60px" name="product_desc">{{old('product_desc')}}</textarea>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Thumb</label>
              <input class="form-control" type="file" name="file" id="thumb_upload" accept=".png, .jpg, .gif">
              <div id="thumb_show"></div>
              <input type="hidden" name="thumb_hidden" id="thumb_hidden">
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Image</label>
              <input class="form-control" type="file" name="file" id="image_upload" accept=".png, .jpg, .gif">
              <div id="image_show"></div>
              <input type="hidden" name="image_hidden" id="image_hidden">
            </div>
          </div>
          <div class="mb-3 mt-2">
            <div class="form-check">
              <div class="checkbox p-0">
                <input class="form-check-input" type="checkbox">
                <label class="form-label">Active</label>
              </div>
            </div>
          </div>
          <button class="btn btn-primary" type="submit">Add</button>
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
@section('ajax')
<script src="/templates/admin/ajax_project_laravel/file_upload.js"></script>
<script src="/templates/admin/ajax_project_laravel/product_group.js"></script>
@endsection