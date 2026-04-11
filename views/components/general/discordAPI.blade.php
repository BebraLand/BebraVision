@php($onlyCounter = $onlyCounter ?? false)

<script defer data-cfasync="false">
    window.addEventListener("DOMContentLoaded", async (event) => {
        "use strict";

        function discordAPI() {
            let discord_key = "{{theme_config('block.discord.id') ?? 'placeholder'}}";
            let url = 'https://discordapp.com/api/guilds/' + discord_key + '/embed.json';
            let enableKnownBotsFilter = {{ config('theme.knownBots.enabled') ? 'true' : 'false' }};
            const knownBots = {!! json_encode(config('theme.knownBots.list') ?? []) !!};
            @if(!$onlyCounter)
                let discordList = document.querySelector('.discord-list');
            @endif
            let discordList_count = document.querySelectorAll('.discord-list_count');
            var init = {
                method: 'GET',
                mode: 'cors',
                cache: 'reload'
            }
            fetch(url, init).then(function (response) {
                @if(!$onlyCounter)
                    if (response.status != 200) {
                        discordList.style.height = "auto";
                        discordList.innerHTML = "Error, please config 'block > discord > id' in this theme config. ("+response+")";
                        return
                    }
                @endif
                response.json().then(function (d) {
                    // Normalize bot names from admin textarea/string config into an array.
                    const knownBotsList = Array.isArray(knownBots)
                        ? knownBots
                        : String(knownBots)
                            .split(/\r?\n/)
                            .map(name => name.trim())
                            .filter(Boolean);

                    // Use a filtered online count so configured bot names are not included.
                    const filteredPresenceCount = d.members.filter(m =>
                        !(enableKnownBotsFilter && knownBotsList.includes(m.username)) &&
                        !/bot/i.test(m.username)
                    ).length;

                    discordList_count.forEach(function(e) {
                        e.innerText.includes('{online}') ? e.innerText = e.innerText.replace('{online}', filteredPresenceCount):'';
                    });

                    // Keep backward compatibility with {online}, but also support plain labels like "Online"
                    // for the Discord block counter by prefixing the live presence count.
                    document.querySelectorAll('.discord-online-count').forEach(function (e) {
                        if (!e.innerText.includes('{online}')) {
                            const label = e.innerText.trim();
                            e.innerText = label.length > 0 ? `${filteredPresenceCount} ${label}` : `${filteredPresenceCount}`;
                        }
                    });

                    @if(!$onlyCounter)
                        // Exclude bots from the member list
                        // The Discord embed API does not provide a 'bot' property, so we filter by known bot names or if username contains 'bot'
                        // Priority users configuration
                        let enablePriorityUsers = {{ config('theme.priorityUsers.enabled') ? 'true' : 'false' }};
                        const priorityUsers = {!! json_encode(config('theme.priorityUsers.list') ?? []) !!};
                        
                        // Separate priority users and other members
                        const priorityMembers = enablePriorityUsers ? d.members
                            .filter(m =>
                                priorityUsers.includes(m.username) &&
                                !(enableKnownBotsFilter && knownBotsList.includes(m.username)) &&
                                !/bot/i.test(m.username)
                            )
                            .sort((a, b) => {
                                // Sort by priority order (index in priorityUsers array)
                                const aIndex = priorityUsers.indexOf(a.username);
                                const bIndex = priorityUsers.indexOf(b.username);
                                return aIndex - bIndex;
                            }) : [];
                            
                        const otherMembers = d.members
                            .filter(m =>
                                !(enablePriorityUsers && priorityUsers.includes(m.username)) &&
                                !(enableKnownBotsFilter && knownBotsList.includes(m.username)) &&
                                !/bot/i.test(m.username)
                            )
                            .sort((a,b)=> (a.status>b.status)*2-1);
                        
                        // Insert priority users first, then others
                        [...priorityMembers, ...otherMembers].forEach(function (m) {
                            discordList.insertAdjacentHTML('beforeend', `
                                <li class="d-flex align-items-center gap-1 my-2">
                                    <div class="position-relative rounded-circle" style="background: url('${m.avatar_url}') center / cover no-repeat;width: 30px;height: 30px">
                                        <span class="position-absolute bottom-0 end-0 rounded-circle discord-status-${m.status}" style="width: 8px;height: 8px"></span>
                                    </div>
                                    ${m.username}
                                </li>
                            `);
                        });
                    @endif
                })
            }).catch(function (err) {
                @if(!$onlyCounter)
                    discordList.style.height = "auto";
                    discordList.innerHTML = "Error, please config 'discord_key' in this theme config. ("+err+")";
                    discordList_count.parentElement.innerHTML = "X";
                @endif
            })
        }
        discordAPI();
    })
</script>