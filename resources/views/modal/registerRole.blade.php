<div class="modal fade" id="registerRole" tabindex="-1" aria-labelledby="registerRole" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerRole">{{('Register new role')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="" id="register_role">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="role_name"> Enter Role Name</label>
                        <input type="text" name="role_name" id="role_name" class="form-control" placeholder="Enter role name">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{('Close')}}</button>
                    <button type="submit" class="register_role btn btn-danger">{{('Register Role')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
