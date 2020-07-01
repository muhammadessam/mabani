<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل الدخول</title>
    <style>
        html, body {
            height: 100%;
            margin: 0px;
            background-image: url("{{asset('img/background.png')}}");
            background-repeat: no-repeat;
            background-size: cover;
        }

        button[type='submit'] {
            background-color: #DB906E;
            border-radius: 20px;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            border: none;
            padding: 10px 20px;
            text-align: center;
            width: 100px;
        }

        a {
            color: white;
            border-radius: 20px;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            border: none;
            padding: 10px 20px;
            text-align: center;
            width: 100px;

        }

        .input-container {
            height: 80%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        input{
            margin: 10px;
            background-color:#DB906E;
            border: none;
            height: 30px;
            width: 100%;
            color: white;
            padding: 3px;
            padding-inline: 1px;
        }
        input:focus{
            border: none;
            outline: 0;
        }
        ::placeholder{
            color: white;
        }
    </style>
</head>
<body style="display: flex;justify-content: center;align-items: center">
<div style="width: 20%;background-color: rgb(127,81,63,.73); height: 450px; ">
    <div style="height: 30%; background-color: rgb(127,81,63); color: white; display: flex ;justify-content: center;align-items: center; flex-direction: column">
        <h1 style="margin: 0px;">مباني</h1>
        <h4>نظام لادارة المباني</h4>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; height: 70%;color: white" dir="rtl">
        <form method="POST" action="{{ route('login') }}" style="width: 100%;height: 100%; display: flex; justify-content: center;align-items: center;flex-direction: column">
            @csrf
            <div class="input-container">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="اسم المستخدم">
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="كلمة المرور">
            </div>
            <div style="display: flex; justify-content: space-between; margin-top: auto; width: 90%;margin-bottom: 3%">
                <a href="{{ route('password.request') }}">نسيت كلمة المرور</a>
                <button type="submit">دخول</button>
            </div>
        </form>
    </div>
</body>
</html>