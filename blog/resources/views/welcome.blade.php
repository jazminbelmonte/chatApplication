<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chat</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                margin-top: 0px;
                margin-bottom: 5px;
            }

            #chat_box {
                height: 600px;
                padding: 10px;
                background-color: gray;
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
            <div class="content">
                <h1 class="title">Chat</h1>

                <!-- this is where messages will appear -->
                <div id="container">
                    <div id="chat_box">
                        @foreach($messages as $message)
                        <span style="color:black; font-size:18px;">{{$message->user}}: </span>
                        <span style="color:white; font-size:18px;">{{$message->message}}</span>
                        <span style="color:red; font-size:12px;">{{$message->created_at}}</span>
                            <br>
                        @endforeach
                    </div>
                </div>

                <h2>Please enter a username and a message to continue</h2>
                <form action="store" method="POST">
                    <label for="chat_user">username:</label>
                    <input type="text" name="chat_user" id="chat_user" size="30">
                    <label for="chat_message">message:</label>
                    <input type="text" name="chat_message" id="chat_message" size="50">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" name="submit" id="submit">
                </form>
            </div>
        </div>
    </body>
</html>
