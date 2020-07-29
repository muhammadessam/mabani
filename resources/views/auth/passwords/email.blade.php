<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل الدخول</title>
    <style>
        html,
        body {
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
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 70%;
            height: 80%;
        }

        input[type='submit']:focus {
            outline: none;
            border: none;
        }

        input {
            margin: 10px;
            background-color: #DB906E;
            border: none;
            height: 30px;
            width: 100%;
            color: white;
            padding: 3px;
            padding-inline: 1px;
        }

        input:focus {
            border: none;
            outline: 0;
        }

        ::placeholder {
            color: white;
        }

        #main {
            width: 33%;
            background-color: rgb(127, 81, 63, .73);
            height: 450px;

        }

        @media only screen and (max-width: 2000px) {
            #main {
                width: 25%;
            }
        }

        @media only screen and (max-width: 1400px) {
            #main {
                width: 35%;
            }
        }

        @media only screen and (max-width: 1000px) {
            #main {
                width: 50%;
            }
        }

        @media only screen and (max-width: 800px) {
            #main {
                width: 70%;
            }
        }

        @media only screen and (max-width: 600px) {
            #main {
                width: 85%;
            }
        }

        @media only screen and (max-width: 400px) {
            #main {
                width: 100%;
            }
        }


    </style>
</head>

<body style="display: flex;justify-content: center;align-items: center">
<div id="main">
    <div
        style="height: 30%; background-color: rgb(127,81,63); color: white; display: flex ;justify-content: center;align-items: center; flex-direction: column">
        <h1 style="margin: 0px;">مباني</h1>
        <h4>نظام لادارة المباني</h4>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; height: 70%;color: white" dir="rtl">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">البريد الالكتروني</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6">
                    <button type="submit"  style="float: left" class="btn btn-primary">
                        ارسل الرابط
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>
