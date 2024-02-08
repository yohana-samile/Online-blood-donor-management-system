<div class="modal fade" id="registerDonar" tabindex="-1" aria-labelledby="registerDonar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerDonar">{{('Register new blood donar')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="" id="log_me_in">
                @csrf
                <div class="loader" hidden></div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" name="name" id="donarFullName" class="form-control" placeholder="Enter Donar Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" id="donarEmail" class="form-control" placeholder="Enter Donar Email">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="name" id="donarRoleId" value="1" class="form-control" placeholder="Enter donarRoleId">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{('Close')}}</button>
                    <button type="submit" class="log_me_in btn btn-danger">{{('Register')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
