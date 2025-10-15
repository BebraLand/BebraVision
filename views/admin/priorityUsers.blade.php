<fieldset class="d-flex flex-column gap-3 border p-2 w-100">
    <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">Priority Users Configuration</legend>
    
    <div class="form-group">
        <label class="form-label fw-bold m-0" for="priorityUsers-list">Priority User Names</label>
        <small class="text-muted d-block mb-2">Enter usernames one per line. These users will be displayed first in the Discord member list.</small>
        <textarea 
            class="form-control @error('priorityUsers-list') is-invalid @enderror" 
            id="priorityUsers-list" 
            name="priorityUsers[list]" 
            rows="6"
            placeholder="placeholder"
            aria-describedby="priorityUsers-list-help">{{ old('priorityUsers-list', is_array(config('theme.priorityUsers.list')) ? implode("\n", config('theme.priorityUsers.list')) : (config('theme.priorityUsers.list'))) }}</textarea>
        @error('priorityUsers-list')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
        <small id="priorityUsers-list-help" class="form-text text-muted">
            Each line represents one priority username. Empty lines will be ignored. Users will be displayed in the order listed here.
        </small>
    </div>
    
    <div class="form-check p-0">
        <input type="hidden" name="priorityUsers[enabled]" value="0">
        <div class="switcher">
            <small class="fw-bold fs-5">Enable Priority Users Feature</small>
            <label for="priorityUsers-enabled">
                <input type="checkbox" id="priorityUsers-enabled" name="priorityUsers[enabled]" value="1" @if(config('theme.priorityUsers.enabled')) checked @endif @error('priorityUsers-enabled') is-invalid @enderror/>
                <span><small></small></span>
            </label>
        </div>
        @error('priorityUsers-enabled')
        <small class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></small>
        @enderror
    </div>
</fieldset>