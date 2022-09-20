<x-layout>
    <main>
        <h1>All Blacks Rugby</h1>
        <div class="grid">
            <div class="card">
                <img src="/images/teams/allblacks.png" alt="All blacks logo" class="logo" />
                <div class="name">
                    <em>#{{ $number }}</em>
                    <h2>{{ $first_name }} <strong>{{ $last_name }}</strong></h2>
                </div>
                <div class="profile">
                    <img src="/images/players/allblacks/{{ $image }}" alt="{{ $first_name }} {{ $last_name }}" class="headshot" />
                    <div class="features">
                        @foreach ($featured as $statistic)
                            <div class="feature">
                                <h3>{{ $statistic['label'] }}</h3>
                                {{ $statistic['value'] }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="bio">
                    <div class="data">
                        <strong>Position</strong>
                        {{ $position }}
                    </div>
                    <div class="data">
                        <strong>Weight</strong>
                        {{ $weight }}KG
                    </div>
                    <div class="data">
                        <strong>Height</strong>
                        {{ $height }}CM
                    </div>
                    <div class="data">
                        <strong>Age</strong>
                        {{ $age }} years
                    </div>
                </div>
            </div>
            <nav class="grid-item">
                <ul>
                    <li class="vertical-text"><a href="#" id="prev">Player Name</a></li>
                    <li class="vertical-text active"><a href="#" id="current">{{ $first_name }} {{ $last_name }}</li>
                    <li class="vertical-text"><a href="#" id="next">Player Name</a></li>
                </ul>
            </nav>
        </div>  
    </main>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $.get('https://www.zeald.com/developer-tests-api/x_endpoint/allblacks?API_KEY=few823mv__570sdd0342', function(data, status) {
            let players = JSON.parse(data);
            let playerIndex = Number(window.location.href.substring(window.location.href.lastIndexOf('/')+1) -1);
            playerIndex = isNaN(playerIndex) ? 0 : playerIndex;
            console.log(playerIndex);
            let numberOfPlayers = players.length;

            if(playerIndex != 0) {
                document.getElementById('prev').innerHTML = players[playerIndex-1].name;
                $('#prev').attr('href', `http://127.0.0.1:8000/allblacks/${playerIndex}`);
            } else {
                document.getElementById('prev').innerHTML = players[numberOfPlayers-1].name;
                $('#prev').attr('href', `http://127.0.0.1:8000/allblacks/${numberOfPlayers}`);
            }

            if(playerIndex + 1 == numberOfPlayers) {
                document.getElementById('next').innerHTML = players[0].name;
                $('#next').attr('href', `http://127.0.0.1:8000/allblacks/1`);
            } else {
                document.getElementById('next').innerHTML = players[playerIndex+1].name;
                $('#next').attr('href', `http://127.0.0.1:8000/allblacks/${playerIndex + 2 }`);
            }
        });
    </script>

</x-layout>
