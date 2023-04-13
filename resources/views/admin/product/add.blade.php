<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <form form action="{{route('admin.product.post-add')}}" method="POST" id="admin_product_add">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Product group list</label>
              <div style="display: flex;">
                <select class="form-select" name="product_group_id" id="product_group_id">
                  <option value="0">Choose product group</option>
                  @if(!empty($productGroup = \App\Helpers\Functions::getAllProductGroup()))
                    @foreach($productGroup as $item)
                  <option value="{{$item->id}}" 
                      {{request()->product_group_id == $item->id?'selected':false}}>{{$item->name}}</option>
                    @endforeach
                  @endif 
                </select>
                <div class="mt-2 mx-2"><a class="text-dark" href="/admin/product-group/add"><i data-feather="file-plus"></i></a></div>
                <div class="mt-2 mx-2"><a class="text-dark" href="/admin/product-group/list"><i data-feather="layers"></i></a></div>
              </div>
              <div><span class="text-danger product_group_id_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6 mt-4">
              <label class="form-label">Name</label>
              <input class="form-control" name="product_name" value="{{old('product_name')}}">
              <div><span class="text-danger product_name_error"></span></div>
            </div>
            <div class="col-md-6 mt-4">
              <label class="form-label">Code</label>
              <input class="form-control" name="product_code" value="{{old('product_code')}}">
              <div><span class="text-danger product_code_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-6 mt-4">
              <label class="form-label">Price</label>
              <input class="form-control" name="product_price" value="{{old('product_price')}}">
            </div>
            <div class="col-md-6 mt-4">
              <label class="form-label">Sale</label>
              <input class="form-control" name="product_sale" value="{{old('product_sale')}}">
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <textarea class="form-control" style ="height:60px" name="product_description">{{old('product_description')}}</textarea>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Image</label>
              <input class="form-control" type="file" name="file" id="image_product_upload" accept=".png, .jpg, .gif">
              <div id="image_show"></div>
              <input type="hidden" name="image_hidden" id="image_hidden">
              <input type="hidden" name="thumb_hidden" id="thumb_hidden">
              <input type="hidden" name="width_hidden" id="width_hidden">
              <input type="hidden" name="height_hidden" id="height_hidden">
            </div>
          </div>
          <div class="mt-4">
            <input class="form-check-input" type="checkbox" id="product_active" name="product_active" checked>
            <label class="form-label">Active</label>
          </div>
          <button class="btn btn-primary" type="submit" id="button_save" hidden>Add</button>
          <a class="ms-4 btn btn-primary" href="/admin/product/list" hidden>List</a>
          @csrf
        </form>
      </div>
    </div>
  </div>
</div>
@section('ajax')
<script src="/templates/admin/ajax_project_laravel/file_upload.js"></script>
<script src="/templates/admin/ajax_project_laravel/product.js"></script>
@endsection