<fieldset class="d-flex flex-column gap-3 border p-2 w-100">
    <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">Profile</legend>

    <div class="form-check p-0">
        <input type="hidden" name="profile[show_money]" value="0">
        <div class="switcher">
            <small class="fw-bold fs-5">Show money on profile</small>
            <label for="profile-show-money">
                <input type="checkbox" id="profile-show-money" name="profile[show_money]" value="1" @checked(config('theme.profile.show_money', true))>
                <span><small></small></span>
            </label>
        </div>
        <small class="form-text text-muted">Hides only the Money: value points line on user profiles. Enabled by default.</small>
    </div>
</fieldset>
