@extends('/master/master-admin')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow" style="width: 18rem; margin-top: 100px;">
            <div class="text-center">
                <img class="card-img-top mt-3" src="{{ asset('images/symlendream-logo.png') }}" alt="Card image cap" style="width:200px;">
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input placeholder="Username" id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <input class="btn btn-primary btn-md btn-block" type="submit" name="login" value="Login">
                </form>
         </div>
    </div>
</div>
@endsection