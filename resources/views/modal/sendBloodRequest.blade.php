<div class="modal fade" id="request" tabindex="-1" aria-labelledby="request" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{('Now You Can Request For Blood')}}</h5>
                <button type="button" class="btn-danger text-white btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="sendBloodRequest">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="blood_group_id">Blood Group</label>
                        <select name="blood_group_id" id="blood_group_id" class="form-control">
                            <option selected disabled hidden>Choose Blood Group</option>
                            @if (!empty($bGroups))
                                @foreach ($bGroups as $bGroup)
                                    <option value="{{ $bGroup->id }}">{{ $bGroup->bloodGroup }}</option>
                                @endforeach
                            @endif
                            <input type="hidden" name="date_requested" id="date_requested" value="@php
                                echo date('Y-m-d');
                            @endphp">
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amountInLtr">Enter Amount In Ltr</label>
                        <input type="number" name="amountInLtr" id="amountInLtr" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{('Close')}}</button>
                    <button type="submit" class="csvFile btn btn-danger">{{__('Send')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
