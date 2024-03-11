<div class="modal fade" id="replayToNormalSmS{{ $query->id }}" tabindex="-1" aria-labelledby="replayToNormalSmS" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replayToNormalSmS">{{('Replay Message To Be Sent As Normal Text To')}} <br> <span class="badge badge-primary"> {{ $query->full_name }}</span></h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="card-body">
                <form id="send_sms_replay">
                    @csrf
                    <div class="loader" style="display: none;"></div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="{{ $query->id }}">
                            <input type="hidden" name="user_phone" id="user_phone" class="form-control" value="{{ $query->phone_number }}">
                        </div>
                        <div class="form-group">
                            <label for="message_replay">Enter Replay</label>
                            <textarea name="message_replay" id="message_replay" class="form-control" placeholder="Enter Replay" cols="10" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{('Close')}}</button>
                        <button type="submit" class="btn btn-danger float-right">{{('send')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
