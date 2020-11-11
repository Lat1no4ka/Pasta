<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Paste</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="/js/ajax.js"></script>
    </link>
</head>

<body>
    <header>
        <div class="container">
            <div class="header-item">
                <a href="javascript:void(0);">sign in</a>
                <a href="javascript:void(0);">sign up</a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <section>
                <div>
                    <h3>New Paste</h3>
                    <div class="paste-container">
                        <textarea class="input-paste" name="" id="" cols="" rows=""></textarea>
                        <div class="show-paste">
                        </div>
                    </div>
                </div>
                <div>
                    <h3>Options</h3>
                    <div class="options"><label for="name">Paste Name / Title: </label>
                        <input id="title" type="text">
                    </div>
                    <div class="options"><label for="name">Syntax Highlighting: </label>
                        <select name="" id="lang">
                            <option value="1">None</option>
                            <option value="2">Js</option>
                            <option value="3">CSS</option>
                            <option value="4">PHP</option>
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
                            <option value="1">public</option>
                            <option value="2">unlisted</option>
                        </select>
                    </div>
                </div>
                <div class="create-paste">
                    <button id="sendPaste" disabled>Create new paste</button>
                </div>
            </section>
        </div>
    </main>

</body>

</html>