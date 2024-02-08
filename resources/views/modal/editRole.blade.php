{{-- edit --}}
<div class="modal fade" id="editRole{{ $role->id }}" tabindex="-1" aria-labelledby="editRole" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRole">{{('Edit This Role')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="" id="editRole">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editRole">Edit Role Name</label>
                        <input type="hidden" name="id" id="id" value="{{ $role->id }}" class="form-control" placeholder="">
                        <input type="text" name="role_name" id="editRole" value="{{ $role->role_name }}" class="form-control" placeholder="Enter role name">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{('Close')}}</button>
                    <button type="submit" class="editRole btn btn-success">{{__('Edit Role')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
