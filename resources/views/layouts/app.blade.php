<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>みんなの本棚</title>

    <!-- Styles -->
    {{ HTML::style('css/app.css') }}
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/add_config.css') }}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">


    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/">みんなの本棚</a>
        </div>

        <div class="navbar-header nav-right">

<!--           <% if user_signed_in? %> -->
            <li class='dropdown btn btn-primary'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>アカウント <span class='caret'></span></a>
              <ul class='dropdown-menu' role='menu'>
<!--                 <li><%= link_to "マイ本棚", user_path(current_user) %></li>
                <li><%= link_to "プロフィール編集", edit_user_registration_path %></li>
                <li><%= link_to "ログアウト", destroy_user_session_path, :method => :delete %></li> -->
              </ul>
            </li>
<!--             <%= link_to "本を登録！", new_book_path ,class: "btn btn-success" %>
          <% else %>
            <%= link_to "ログイン", new_user_session_path, class: "btn btn-primary"  %>
          <% end %>
 -->
        </div>
      </div>
    </div>

    <div class="navbar-background">
    </div>

    @yield('content');

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{ HTML::script('js/add_config.js') }}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

</body>
</html>