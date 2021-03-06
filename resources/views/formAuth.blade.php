<div class="signin">
    <div class="modal-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="">
                <label for="email" class="">Email</label>

                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong id="auth-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="">
                <label for="password" class="">Password</label>
                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong id="auth-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
            <div class="facebook">
            <a href="{{ url('/login/facebook') }}" class="btn btn-facebook"> Facebook</a>
            </div>
        </form>
    </div>
</div>