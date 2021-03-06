<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Paste</title>
    <link rel="stylesheet" href="/css/app.css">
    </link>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="/js/ajax.js"></script>

</head>

<body>
    @component('header')
    @endcomponent
    <main>
        <div class="container">
            <section>
                <div>

                    <h3>New Paste</h3>

                    <div class="paste-container">
                        <textarea class="input-paste" name="" id="" cols="" rows=""></textarea>
                        <div class="show-paste">
                            <p>All Paste</p>
                            @foreach($paste as $el)
                            <div>
                                <a href="{{route('showPaste',['link' => $el->link])}}">
                                    <p>{{$el->Title }}</p>
                                    <p>{{$el->Lang}}</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @guest
                        
                        @else
                        <div class="show-paste">
                            <p>My Paste</p>
                            @foreach($mypaste as $el)
                            <div>
                                <a href="{{route('showPaste',['link' => $el->link])}}">
                                    <p>{{$el->Title }}</p>
                                    <p>{{$el->Lang}}</p>
                                </a>
                            </div>
                            @endforeach
                            <a class="all-page" href="/allPastes">Show all</a>
                        </div>
                        @endguest
                    </div>


                </div>
                <div>
                    <h3>Options</h3>
                    <div class="options"><label for="name">Paste Name / Title: </label>
                        <input id="title" type="text">
                    </div>
                    <div class="options"><label for="name">Syntax Highlighting: </label>
                        <select name="" id="lang">
                            <option value="none">None</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="CSS">CSS</option>
                            <option value="PHP">PHP</option>
                        </select>
                    </div>
                    <div class="options"><label for="name">Paste Expiration: </label>
                        <select name="" id="DateOfExist">
                            <option value="1">10 Минут</option>
                            <option value="2">1 Час</option>
                            <option value="3">1 День</option>
                            <option value="4">1 Неделя</option>
                            <option value="5">1 Месяц</option>
                            <option value="6">Без ограничений</option>
                        </select>
                    </div>
                    <div class="options"><label for="name">Paste Exposure: </label>
                        <select name="" id="access">
                            <option value="0">public</option>
                            <option value="1">unlisted</option>
                            @guest
                            <option value="2" disabled>private</option>
                            @else
                            <option value="2" >private</option>
                            @endguest
                        </select>
                    </div>
                </div>
                <div class="create-paste">
                    <button id="sendPaste">Create new paste</button>
                </div>
            </section>
        </div>
    </main>

</body>

</html>