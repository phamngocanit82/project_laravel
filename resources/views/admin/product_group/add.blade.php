<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <form action="{{route('admin.product-group.post-add')}}" method="POST" id="admin_product_group_add">
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Name</label>
              <input class="form-control" name="product_group_name" value="{{old('product_group_name')}}">
              <div><span class="text-danger product_group_name_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <textarea class="form-control" style ="height:60px" name="product_group_description">{{old('product_group_description')}}</textarea>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Image</label>
              <input class="form-control" type="file" name="file" id="image_product_group_upload" accept=".png, .jpg, .gif">
              <div id="image_show"></div>
              <input type="hidden" name="image_hidden" id="image_hidden">
              <input type="hidden" name="thumb_hidden" id="thumb_hidden">
              <input type="hidden" name="width_hidden" id="width_hidden">
              <input type="hidden" name="height_hidden" id="height_hidden">
            </div>
          </div>
          <div class="mt-4">
            <input class="form-check-input" type="checkbox" id="product_group_active" name="product_group_active" checked>
            <label class="form-label">Active</label>
          </div>
          <button class="btn btn-primary" type="submit" id="button_save" hidden>Add</button>
          <a class="ms-4 btn btn-primary" href="/admin/product-group/list" hidden>List</a>
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