<div class="modal fade" id="news_and_update" tabindex="-1" aria-labelledby="news_and_update" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="news_and_update">{{('add new or update')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="" id="add_news_and_update">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="new_title">{{__('Enter news title')}}</label>
                        <input type="text" name="new_title" id="new_title" class="form-control" placeholder="Enter new title">
                    </div>
                    <div class="mb-3">
                        <label for="new_postacl_card">{{__('Choose Postal Card')}}</label>
                        <input type="file" name="new_postacl_card" id="new_postacl_card" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control" placeholder="updated_by">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{('Close')}}</button>
                    <button type="submit" class="add_news_and_update btn btn-danger">{{('Save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>