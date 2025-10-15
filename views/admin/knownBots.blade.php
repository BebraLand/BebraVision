<fieldset class="d-flex flex-column gap-3 border p-2 w-100">
    <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">Known Bots Configuration</legend>
    
    <div class="form-group">
        <label class="form-label fw-bold m-0" for="knownBots-list">Known Bot Names</label>
        <small class="text-muted d-block mb-2">Enter bot names one per line. These bots will be recognized by the system.</small>
        <textarea 
            class="form-control @error('knownBots-list') is-invalid @enderror" 
            id="knownBots-list" 
            name="knownBots[list]" 
            rows="8"
            placeholder="placehoder"
            aria-describedby="knownBots-list-help">{{ old('knownBots-list', is_array(config('theme.knownBots.list')) ? implode("\n", config('theme.knownBots.list')) : (config('theme.knownBots.list'))) }}</textarea>
        @error('knownBots-list')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
        <small id="knownBots-list-help" class="form-text text-muted">
            Each line represents one known bot name. Empty lines will be ignored.
        </small>
    </div>
    
    <div class="form-check p-0">
        <input type="hidden" name="knownBots[enabled]" value="0">
        <div class="switcher">
            <small class="fw-bold fs-5">Enable Known Bots Feature</small>
            <label for="knownBots-enabled">
                <input type="checkbox" id="knownBots-enabled" name="knownBots[enabled]" value="1" @if(config('theme.knownBots.enabled')) checked @endif @error('knownBots-enabled') is-invalid @enderror/>
                <span><small></small></span>
            </label>
        </div>
        @error('knownBots-enabled')
        <small class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></small>
        @enderror
    </div>
</fieldset>