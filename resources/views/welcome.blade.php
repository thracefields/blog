<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test 123</title>


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

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .green-success-title {
                color: #38c172;
                margin-top: 60px;
                border: 3px solid #ff3200;
                padding: 10px;
            }

            .success {
                width: 600px;
                height: 600px;
                background-color: yellowgreen;
                border: 1px solid green;
                color: #fff;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum tempore nulla hic distinctio veniam, magnam nisi impedit beatae rem dolor deleniti eos adipisci ex, non, odit tenetur possimus provident. Labore.</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum tempore nulla hic distinctio veniam, magnam nisi impedit beatae rem dolor deleniti eos adipisci ex, non, odit tenetur possimus provident. Labore.</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum tempore nulla hic distinctio veniam, magnam nisi impedit beatae rem dolor deleniti eos adipisci ex, non, odit tenetur possimus provident. Labore.</p>

        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum tempore nulla hic distinctio veniam, magnam nisi impedit beatae rem dolor deleniti eos adipisci ex, non, odit tenetur possimus provident. Labore.</p>

        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum tempore nulla hic distinctio veniam, magnam nisi impedit beatae rem dolor deleniti eos adipisci ex, non, odit tenetur possimus provident. Labore.</p>

        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum tempore nulla hic distinctio veniam, magnam nisi impedit beatae rem dolor deleniti eos adipisci ex, non, odit tenetur possimus provident. Labore.</p>

        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum tempore nulla hic distinctio veniam, magnam nisi impedit beatae rem dolor deleniti eos adipisci ex, non, odit tenetur possimus provident. Labore.</p>


        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum tempore nulla hic distinctio veniam, magnam nisi impedit beatae rem dolor deleniti eos adipisci ex, non, odit tenetur possimus provident. Labore.</p>
        <h2>TEST 123</h2>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>

                <h1 class="green-success-title">????????, ????????????????????! ?????? ?? ?????????????????</h1>
                <div style="border: 1px solid red; margin: 20px; padding: 50px; font-size: 40px; color: red">?????????? ??????????!</div>
                <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                <div class="success">??????????!</div>
            </div>
        </div>
    </body>
</html>
