<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Link Generator</title>

    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}" defer></script>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body class="text-center">
<form class="form-signin">
    <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
    <h1 class="h3 mb-3 font-weight-normal">Please paste Link</h1>
    <label for="inputLink" class="sr-only">Link</label>
    <input type="text" id="inputLink" class="form-control" placeholder="Link" required autofocus>
    <p></p>
    <label for="inputShortLink" class="sr-only">Short Link</label>
    <input type="text" id="inputShortLink" class="form-control" placeholder="Short Link">
    <p></p>
    <div class="btn btn-lg btn-primary btn-block" onclick="sendLink()">Generate</div>
</form>

</body>
</html>
