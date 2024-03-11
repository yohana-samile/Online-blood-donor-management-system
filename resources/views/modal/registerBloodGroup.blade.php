<div class="modal fade" id="registerBloodGroup" tabindex="-1" aria-labelledby="registerBloodGroup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerBloodGroup">{{('Register new blood group')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="card-body">
                <form method="POST" action="" id="register_blood_group">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bloodGroup">Enter Blood Group</label>
                            <input type="text" name="bloodGroup" id="bloodGroup" class="form-control" placeholder="Enter blood Group">
                        </div>
                        <div class="form-group">
                            <label for="bloodGroupInfo">Enter Blood Group Detail</label>
                            <textarea name="bloodGroupInfo" id="bloodGroupInfo" cols="10" rows="10" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{('Close')}}</button>
                        <button type="submit" class="register_blood_group btn btn-danger float-right">{{('Register Blood')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
