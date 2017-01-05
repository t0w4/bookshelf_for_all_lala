@extends('layouts.app')

@section('content')
<div class="col-md-offset-4 col-md-4">
    <div class="thumbnail">
        <h4>プロフィール編集</h4>
        <div class="panel-body">
            {{ Form::open(['url' => "users/$user->id", 'method' => 'PUT', 'class' => 'form-horizontal']) }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">名前</label>

                    <div class="col-md-7">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">メールアドレス</label>

                    <div class="col-md-7">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">パスワード</label>

                    <div class="col-md-7">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif

                        @if (session('message'))
                            <span class="help-block">
                            <strong style="color: red">{{ session('message') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">パスワード確認</label>

                    <div class="col-md-7">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                    <label for="new_password" class="col-md-4 control-label">新しいパスワード</label>

                    <div class="col-md-7">
                        <input id="new_password" type="password" class="form-control" name="new_password" required>

                        @if ($errors->has('new_password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('new_password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-7 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            登録
                        </button>
                        <a href="/" class="btn btn-default" role="button">戻る</a>
                    </div>
                </div>
<!--             </form> -->
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
