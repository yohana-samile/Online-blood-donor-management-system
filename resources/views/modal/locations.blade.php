{{-- locations --}}
<div class="modal fade" id="locations" tabindex="-1" aria-labelledby="locations" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{('Import CV File For All Locations')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="card-body">
                <form method="POST" action="" id="saveLocations">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="csvFile">Import CV File</label>
                            <input type="file" name="csvFile" id="csvFile" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{('Close')}}</button>
                        <button type="submit" class="csvFile btn btn-success float-right">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- regions --}}
<div class="modal fade" id="regionsModal" tabindex="-1" aria-labelledby="regionsModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{('Import CV File For Regions')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="card-body">
                <form method="POST" action="" id="saveRegions">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="csvFile">Import CV File</label>
                            <input type="file" name="csvFile" id="csvFile" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{('Close')}}</button>
                        <button type="submit" class="csvFile btn btn-success float-right">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
