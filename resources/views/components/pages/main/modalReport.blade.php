<!-- Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                    <label for="reason">{{ __('Reason') . " " . __('Report') }}</label>
                    <select class="form-control" name="reason">
                    	<option>{{ __('Pick one') }}</option>
                    	<option>{{ __('Offensive, harmful to others') }}</option>
                    	<option>{{ __("Off topic") }}</option>
                     	<option>{{ __('Legal violation') }}</option>
                    	<option>{{ __('Ethical or cultural violation') }}</option>
                     	<option>{{ __('False reporting') }}</option>
                    	<option>{{ __('Copyright infringement') }}</option>
                    	<option>{{ __('Disclosure of personal information') }}</option>
                    	<option>{{ __('Spam, junk') }}</option>
                    	<option>{{ __('Other reasons') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reason">{{ __('Opinion') }}:</label>
                    <textarea name="content" class="form-control"
                    	placeholder="{{ __('Other feedback content') }}"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="button" class="btn btn-primary">{{ __('Send') }}</button>
            </div>
        </div>
    </div>
</div>
