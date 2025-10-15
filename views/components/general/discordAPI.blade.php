@php($onlyCounter = $onlyCounter ?? false)

<script defer data-cfasync="false">
    window.addEventListener("DOMContentLoaded", async (event) => {
        "use strict";

        function discordAPI() {
            let discord_key = "{{theme_config('block.discord.id') ?? 'placeholder'}}";
            let url = 'https://discordapp.com/api/guilds/' + discord_key + '/embed.json';
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
                    discordList_count.forEach(function(e) {
                        e.innerText.includes('{online}') ? e.innerText = e.innerText.replace('{online}', d.presence_count):'';
                    });
                    @if(!$onlyCounter)
                        // Exclude bots from the member list
                        // The Discord embed API does not provide a 'bot' property, so we filter by known bot names or if username contains 'bot'
                        const knownBotsConfig = `{{theme_config('block.discord.knownbots', '')}}`;
                        const knownBots = knownBotsConfig.split('\n').map(bot => bot.trim()).filter(bot => bot.length > 0);

                        // Separate priority user and other members
                        const priorityUser = `{{theme_config('block.discord.priorityuser', '')}}`.trim();
                        const priorityMembers = d.members
                            .filter(m =>
                                priorityUser && m.username === priorityUser &&
                                !knownBots.includes(m.username) &&
                                !/bot/i.test(m.username)
                            );
                        const otherMembers = d.members
                            .filter(m =>
                                (!priorityUser || m.username !== priorityUser) &&
                                !knownBots.includes(m.username) &&
                                !/bot/i.test(m.username)
                            )
                            .sort((a,b)=> (a.status>b.status)*2-1);

                        // Insert priority user first, then others
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