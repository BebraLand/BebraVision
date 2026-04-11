<div class="d-flex flex-column gap-3">
    <fieldset class="d-flex flex-column gap-3 border p-2 w-100 mb-3">
        <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">{{trans('theme::admin.arrangement')}}</legend>
        <div class="d-flex flex-column gap-2">
            <small class="fw-bold">{{trans('theme::admin.component_order')}}</small>
            <div class="d-flex gap-2 flex-wrap">
                <div class="flex-fill">
                    <label class="form-label m-0" for="hero-arrangement-first">{{trans('theme::admin.first_component')}}</label>
                    <select class="form-select @error('hero-arrangement-first') is-invalid @enderror" id="hero-arrangement-first" name="hero[arrangement][first]">
                        <option value="server" @if(old('hero-arrangement-first', config('theme.hero.arrangement.first', 'server')) == 'server') selected @endif>{{trans('theme::admin.server')}}</option>
                        <option value="discord" @if(old('hero-arrangement-first', config('theme.hero.arrangement.first', 'server')) == 'discord') selected @endif>{{trans('theme::admin.discord')}}</option>
                        <option value="logo" @if(old('hero-arrangement-first', config('theme.hero.arrangement.first', 'server')) == 'logo') selected @endif>Logo</option>
                    </select>
                    @error('hero-arrangement-first')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="flex-fill">
                    <label class="form-label m-0" for="hero-arrangement-second">{{trans('theme::admin.second_component')}}</label>
                    <select class="form-select @error('hero-arrangement-second') is-invalid @enderror" id="hero-arrangement-second" name="hero[arrangement][second]">
                        <option value="server" @if(old('hero-arrangement-second', config('theme.hero.arrangement.second', 'discord')) == 'server') selected @endif>{{trans('theme::admin.server')}}</option>
                        <option value="discord" @if(old('hero-arrangement-second', config('theme.hero.arrangement.second', 'discord')) == 'discord') selected @endif>{{trans('theme::admin.discord')}}</option>
                        <option value="logo" @if(old('hero-arrangement-second', config('theme.hero.arrangement.second', 'discord')) == 'logo') selected @endif>Logo</option>
                    </select>
                    @error('hero-arrangement-second')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="flex-fill">
                    <label class="form-label m-0" for="hero-arrangement-third">{{trans('theme::admin.third_component')}}</label>
                    <select class="form-select @error('hero-arrangement-third') is-invalid @enderror" id="hero-arrangement-third" name="hero[arrangement][third]">
                        <option value="server" @if(old('hero-arrangement-third', config('theme.hero.arrangement.third', 'logo')) == 'server') selected @endif>{{trans('theme::admin.server')}}</option>
                        <option value="discord" @if(old('hero-arrangement-third', config('theme.hero.arrangement.third', 'logo')) == 'discord') selected @endif>{{trans('theme::admin.discord')}}</option>
                        <option value="logo" @if(old('hero-arrangement-third', config('theme.hero.arrangement.third', 'logo')) == 'logo') selected @endif>Logo</option>
                    </select>
                    @error('hero-arrangement-third')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <small class="text-muted">{{trans('theme::admin.arrangement_description')}}</small>
        </div>
    </fieldset>

    <fieldset class="d-flex flex-column gap-3 border p-2 w-100 mb-3">
        <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">{{trans('theme::admin.hide')}}</legend>
        <div class="form-check p-0">
            <div class="switcher">
                <small class="fw-bold fs-5">{{trans('theme::admin.disableInfosHero')}}</small>
                <label for="hero-appHide-toggle">
                    <input type="checkbox" id="hero-appHide-toggle" name="hero[appHide][toggle]" @if(config('theme.hero.appHide.toggle')) checked @endif @error('hero-appHide-toggle') is-invalid @enderror/>
                    <span><small></small></span>
                </label>
            </div>
            @error('hero-appHide-toggle')
            <small class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></small>
            @enderror
        </div>
    </fieldset>

        <fieldset class="d-flex flex-column gap-3 border p-2 w-100">
            <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">{{trans('theme::admin.server')}}</legend>
            <div class="d-flex gap-1">
                <div class=" w-100">
                    <label class="form-label m-0" for="hero-server-icon">{{trans('theme::admin.icon')}}</label>
                    <input type="icon" placeholder="bi bi-box-fill" class="form-control @error('hero-server-icon') is-invalid @enderror" id="hero-server-icon" name="hero[server][icon]" value="{{old('hero-server-icon', config('theme.hero.server.icon'))}}" aria-describedby="hero-server-icon-Label">
                    @error('hero-server-icon')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class=" w-100">
                    <label class="form-label m-0" for="hero-server-text">{{trans('theme::admin.text')}}</label>
                    <input type="text" class="form-control @error('hero-server-text') is-invalid @enderror" id="hero-server-text" name="hero[server][text]" value="{{old('hero-server-text', config('theme.hero.server.text'))}}" aria-describedby="hero-server-text-Label">
                    @error('hero-server-text')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class=" w-100">
                    <label class="form-label m-0" for="hero-server-ip">IP</label>
                    <input type="text" class="form-control @error('hero-server-ip') is-invalid @enderror" id="hero-server-ip" name="hero[server][ip]" value="{{old('hero-server-ip', config('theme.hero.server.ip'))}}" aria-describedby="hero-server-ip-Label">
                    @error('hero-server-ip')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class=" w-100">
                    <label class="form-label m-0" for="hero-server-textcopied">{{trans('theme::admin.ip_when_copied')}}</label>
                    <input type="text" class="form-control @error('hero-server-textcopied') is-invalid @enderror" id="hero-server-textcopied" name="hero[server][textcopied]" value="{{old('hero-server-textcopied', config('theme.hero.server.textcopied'))}}" aria-describedby="hero-server-textcopied-Label">
                    @error('hero-server-textcopied')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div>
                <i>{{trans('theme::admin.online_variable')}}</i>
            </div>
            <div class="form-check p-0">
                <div class="switcher">
                    <small class="fw-bold fs-5">{{trans('theme::admin.dont_show')}}</small>
                    <label for="hero-server-toggle">
                        <input type="checkbox" id="hero-server-toggle" name="hero[server][toggle]" @if(config('theme.hero.server.toggle')) checked @endif @error('hero-server-toggle') is-invalid @enderror/>
                        <span><small></small></span>
                    </label>
                </div>
                @error('hero-server-toggle')
                <small class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></small>
                @enderror
            </div>
        </fieldset>
        <fieldset class="d-flex flex-column gap-3 border p-2 w-100">
            <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">{{trans('theme::admin.discord')}}</legend>
            <div class="d-flex gap-1">
                <div class=" w-100">
                    <label class="form-label m-0" for="hero-discord-icon">{{trans('theme::admin.icon')}}</label>
                    <input type="icon" placeholder="bi bi-discord" class="form-control @error('hero-discord-icon') is-invalid @enderror" id="hero-discord-icon" name="hero[discord][icon]" value="{{old('hero-discord-icon', config('theme.hero.discord.icon'))}}" aria-describedby="hero-discord-icon-Label">
                    @error('hero-discord-icon')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class=" w-100">
                    <label class="form-label m-0" for="hero-discord-text">{{trans('theme::admin.text')}}</label>
                    <input type="text" class="form-control @error('hero-discord-text') is-invalid @enderror" id="hero-discord-text" name="hero[discord][text]" value="{{old('hero-discord-text', config('theme.hero.discord.text'))}}" aria-describedby="hero-discord-text-Label">
                    @error('hero-discord-text')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class=" w-100">
                    <label class="form-label m-0" for="hero-discord-url">{{trans('theme::admin.url')}}</label>
                    <input type="url" class="form-control @error('hero-discord-url') is-invalid @enderror" id="hero-discord-url" name="hero[discord][url]" value="{{old('hero-discord-url', config('theme.hero.discord.url'))}}" aria-describedby="hero-discord-url-Label">
                    @error('hero-discord-url')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="d-flex gap-1">
                <div class="w-100">
                    <label class="form-label m-0" for="hero-discord-display">{{trans('theme::admin.discord_display_mode')}}</label>
                    <select class="form-select @error('hero-discord-display') is-invalid @enderror" id="hero-discord-display" name="hero[discord][display]">
                        <option value="text" @if(old('hero-discord-display', config('theme.hero.discord.display', 'text')) == 'text') selected @endif>{{trans('theme::admin.discord_display_text')}}</option>
                        <option value="url" @if(old('hero-discord-display', config('theme.hero.discord.display', 'text')) == 'url') selected @endif>{{trans('theme::admin.discord_display_url')}}</option>
                    </select>
                    @error('hero-discord-display')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="w-100">
                    @php($discordSubtitleDefault = (config('theme.hero.discord.subtitle') && config('theme.hero.discord.subtitle') !== 'theme::theme.hero.discord_subtitle') ? config('theme.hero.discord.subtitle') : trans('theme::theme.hero.discord_subtitle'))
                    <label class="form-label m-0" for="hero-discord-subtitle">{{trans('theme::admin.discord_subtitle')}}</label>
                    <input type="text" class="form-control @error('hero-discord-subtitle') is-invalid @enderror" id="hero-discord-subtitle" name="hero[discord][subtitle]" value="{{old('hero-discord-subtitle', $discordSubtitleDefault)}}" aria-describedby="hero-discord-subtitle-Label">
                    @error('hero-discord-subtitle')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <small class="text-muted">{{trans('theme::admin.form.hero.discord_display_help')}}</small>
            <div>
                <i>{{trans('theme::admin.online_variable')}}</i><strong class="{{theme_config('block.discord.type') == 'custom' ? 'd-none':''}} text-info ms-1">{{trans('theme::admin.form.hero.discord_iframe')}}</strong><br/>
                <i class="fw-bold">{{trans('theme::admin.form.hero.discord_show_online')}}</i>
            </div>
            <div class="form-check p-0">
                <div class="switcher">
                    <small class="fw-bold fs-5">{{trans('theme::admin.dont_show')}}</small>
                    <label for="hero-discord-toggle">
                        <input type="checkbox" id="hero-discord-toggle" name="hero[discord][toggle]" @if(config('theme.hero.discord.toggle')) checked @endif @error('hero-discord-toggle') is-invalid @enderror/>
                        <span><small></small></span>
                    </label>
                </div>
                @error('hero-discord-toggle')
                <small class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></small>
                @enderror
            </div>
        </fieldset>
        <fieldset class="d-flex flex-column gap-3 border p-2 w-100">
            <legend class="float-none w-auto p-2 py-0 bg-dark text-white text-lg">Logo</legend>
            <div class="form-check p-0">
                <div class="switcher">
                    <small class="fw-bold fs-5">{{trans('theme::admin.dont_show')}}</small>
                    <label for="hero-logo-toggle">
                        <input type="checkbox" id="hero-logo-toggle" name="hero[logo][toggle]" @if(config('theme.hero.logo.toggle')) checked @endif @error('hero-logo-toggle') is-invalid @enderror/>
                        <span><small></small></span>
                    </label>
                </div>
                @error('hero-logo-toggle')
                <small class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></small>
                @enderror
            </div>
        </fieldset>

</div>
