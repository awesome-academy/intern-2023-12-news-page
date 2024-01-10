<!-- Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Report') }}: <span class="js-import-title"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="reason">{{ __('Reports') }}:</label>
                    <textarea name="content" class="form-control" placeholder="{{ __('Feedback content') }}"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="button" class="btn btn-primary js-submit-report" data-route="{{ route('report') }}"
                    data-validate-true="{{ __('Report successfully') }}" data-user-id="{{ Auth::user()->id ?? null }}"
                    data-validate-false="{{ __('Please do not leave it blank') }}">{{ __('Send') }}</button>
            </div>
        </div>
    </div>
</div>
