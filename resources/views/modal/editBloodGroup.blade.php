{{-- edit --}}
<div class="modal fade" id="editBloodGroup{{ $blood_group->id }}" tabindex="-1" aria-labelledby="editBloodGroup{{ $blood_group->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBloodGroup">{{('Edit This Blood Group')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="/blood/editBloodGroup" id="edit_blood_group">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="EditBloodGroupName">Edit Blood Group</label>
                        <input type="hidden" name="id" id="id" value="{{ $blood_group->id }}" class="form-control" placeholder="">
                        <input type="text" name="bloodGroup" id="EditBloodGroupName" value="{{ $blood_group->bloodGroup }}" class="form-control" placeholder="Enter blood Group">
                    </div>
                    <div class="form-group">
                        <label for="bloodGroupInfo">Enter Blood Group Detail</label>
                        <textarea name="bloodGroupInfo" id="bloodGroupInfo" cols="10" rows="10" class="form-control">{{ $blood_group->bloodGroupInfo }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{('Close')}}</button>
                    <button type="submit" class="edit_blood_group btn btn-success">{{__('Edit Blood')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
