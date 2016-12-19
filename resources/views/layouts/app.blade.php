<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/add_config.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>

    </head>
    <body id="app-layout">

        <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="/">みんなの本棚</a>
            </div>

            <div class="navbar-header nav-right">

                @if (Auth::guest())
                    <a class="btn btn-primary" href="{{ url('/login') }}">ログイン</a>
                @else
                    <li class='dropdown btn btn-primary'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>アカウント <span class='caret'></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><%= link_to "マイ本棚", user_path(current_user) %></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                ログアウト
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif

            </div>
        </div>
    </div>

<div class="navbar-background">
</div>

@yield('content')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/js/add_config.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>
</html>