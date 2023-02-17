<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-striped" id="custom-button" role="grid" aria-describedby="custom-button_info">
          <thead>
            <tr role="row">
              <th class="w-10">No</th>
              <th class="w-25">Name</th>
              <th class="w-25">Description</th>
              <th class="text-center w-15">Active</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @if (!empty($user_group_list))
              @foreach ($user_group_list as $key => $item)
            <tr role="row" class="odd">
              <td class="">{{$key + 1 + ($user_group_list->currentPage()-1)*$num_page}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->description}}</td>
              <td class="text-center"><input class="form-check-input" type="checkbox" id="user_group_active" name="user_group_active" onclick="activeId(this, {{$item->id}})" {!!$item->active==1? 'checked':''!!}></td>
              <td>
                <div class="float-start">
                  <a class="btn btn-info btn-xs" href="{{route('admin.user-group.edit', ['id'=>$item->id])}}"><i class="fas fa-pencil-alt me-1"></i>Edit</a>
                  <a class="btn btn-danger btn-xs" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" onclick="passIdDelete({{$item->id}})"><i class="fas fa-trash me-1"></i>Delete</a>
                </div>
              </td>
            </tr>
              @endforeach
            @endif
          </tbody>
        </table>
        @if ($user_group_list->lastPage()>1)
          <div class="d-flex justify-content-end mt-4 me-4 mb-4">{{$user_group_list->links()}}</div>
        @endif
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete this user group</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Do you want to delete?</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-danger" type="button" onclick="deleteRowId()" data-bs-dismiss="modal">Delete</button>
        <input type="hidden" name="modal_hidden_value" id="modal_hidden_value">
      </div>
    </div>
  </div>
</div>
@section('ajax')
<script src="/templates/admin/ajax_project_laravel/user_group.js"></script>
@endsection

@if (session('msg'))
<script>
    setTimeout(function () { 
      var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500
                            });
        Toast.fire({ 
          icon: 'error',  
          title:'Error edit about user groups!', 
          customClass: {
            title: 'mt-2',
          }
        })
    }, 1);
</script>
@endif