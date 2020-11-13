<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Paste</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.3.2/build/styles/default.min.css">
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.3.2/build/highlight.min.js"></script>
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
                        </div>
                        @endguest
                    </div>


                </div>
            </section>
        </div>
    </main>

</body>

</html>