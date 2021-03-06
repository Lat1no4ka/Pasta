<div class="signup">
    <div class="modal-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="name">Name</label>
                <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong id="reg-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
               
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong id="reg-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div>
                <div>
                    <label for="password-confirm">Confirm password</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="reg-btn">
                <button type="submit" id="reg-btn" class="">
                    {{ __('Register') }}
                </button>
            </div>
            <div class="facebook">
            <a href="{{ url('/login/facebook') }}" class="btn btn-facebook"> Facebook</a>
            </div>
        </form>
    </div>
</div>