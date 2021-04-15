<div>
    <form wire:submit.prevent="submit" class="form-signin">
        @if (session('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" wire:model="email" class="form-control" placeholder="Email address" autofocus="">
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" wire:model="password" id="inputPassword" class="form-control" placeholder="Password">
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
    </form>
</div>