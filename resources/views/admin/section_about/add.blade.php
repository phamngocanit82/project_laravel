<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <form class="needs-validation" novalidate="">
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label">Title</label>
              <input class="form-control" name="section_about_title" value="{{old('section_about_title')}}">
              <div><span class="text-danger section_about_title_error"></span></div>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label">Description</label>
              <textarea class="form-control" style ="height:60px" name="section_about_description">{{old('section_about_description')}}</textarea>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-md-12 mt-4">
              <label class="form-label" for="validationCustom04">Image</label>
              <input class="form-control" id="validationCustom01" type="file" value="Password" required="">
              <div class="valid-feedback">Looks good!</div>
            </div>
          </div>
          <div class="mb-3 mt-2">
            <div class="form-check">
              <div class="checkbox p-0">
                <input class="form-check-input" id="invalidCheck" type="checkbox" required="">
                <label class="form-label" for="invalidCheck">Active</label>
              </div>
              <div class="invalid-feedback">You must agree before submitting.</div>
            </div>
          </div>
          <button class="btn btn-primary" type="submit">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>