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
    <a href="/">Home</a>
    @endcomponent
    <main>
        <div class="container">
            @guest
            <h1>Acces denied</h1>
            @else
            <section>
                <div>
                    <div class="paste-container">
                        <div class="show-paste">
                            <p>My Paste</p>
                            @foreach($paste as $el)
                            <div class="all-paste">
                                <a href="{{route('showPaste',['link' => $el->link])}}">
                                    <p>{{$el->Title }}</p>
                                    <p>{{$el->Lang}}</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                   <div class="pagination">{{ $paste->links() }}</div> 
                    @endguest
                </div>
            </section>
        </div>
    </main>
</body>

</html>