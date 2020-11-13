<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Paste</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.3.2/build/styles/default.min.css">
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.3.2/build/highlight.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="/js/ajax.js"></script>
    <script type='text/javascript'>
        hljs.initHighlightingOnLoad();
    </script>
    <link rel="stylesheet" href="/css/app.css">
    </link>
</head>

<body>
    @component('header')
    <a href="/">Home</a>
    @endcomponent
    <main>
        @guest
        @if($Data->Access == 2)
        <h1>Access denied</h1>
        @else
        <div class="container">
            <section>
                <div>
                    <h3>{{$Data->Title}}</h3>
                    <div class="paste-container">
                        <div class="detail-text">
                            <pre><code class="{{$Data->lang}}">{{$Data->Text}}</code></pre>
                            <textarea class="input-paste" name="" id="" cols="" rows="" readonly>{{$Data->Text}}</textarea>
                        </div>
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

                    </div>
            </section>
        </div>
        @endif
        @else
        <div class="container">
            <section>
                <div>
                    <h3>{{$Data->Title}}</h3>
                    <div class="paste-container">
                        <div class="detail-text">
                            <pre><code class="{{$Data->lang}}">{{$Data->Text}}</code></pre>
                            <textarea class="input-paste" name="" id="" cols="" rows="" readonly>{{$Data->Text}}</textarea>
                        </div>
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
                        </div>

                    </div>

                    @if($Data->Email == Auth::user()->email)
                    <div>
                        <input type="text" id="id" value="{{$Data->id}}" hidden>
                        <div class="create-paste">
                            <button id="editPasteEnable">Edit paste</button>
                        </div>
                        <div id="edit" style="display: none;">
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
                                    <option value="2">private</option>

                                </select>
                            </div>
                            <div class="create-paste">
                                <button id="editPaste">Confirm</button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </section>
        </div>
        @endif
        @endguest
    </main>