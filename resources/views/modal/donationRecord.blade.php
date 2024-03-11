<div class="modal fade" id="donationRecord" tabindex="-1" aria-labelledby="donationRecord" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{('Choose Donator')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="card-body">
                <form id="saveRecord">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="donotorName">Donator Name</label>
                            <select name="donotorName" id="donotorName" class="form-control">
                                <option selected disabled hidden>Choose Donator</option>
                                @if (!empty($donators))
                                    @foreach ($donators as $donator)
                                        <option value="{{ $donator->id }}">{{ $donator->name }}</option>
                                    @endforeach
                                @endif
                                <input type="hidden" name="date_donate" id="date_donate" value="@php
                                    echo date('Y-m-d');
                                @endphp">
                            </select>
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
