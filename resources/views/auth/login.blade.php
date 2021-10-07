<x-loginlayout>
    <x-slot name="title">Login</x-slot>
    <x-slot name="content">
        <div class="container login">
            <div class="row" style="margin-top: 150px">
                <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-8 offset-2 p-4 bg-transparent shadow shadow-lg text-dark">
                    <h4 class="text-uppercase">User login form</h4><hr>
                    <form action="{{ route('login_user') }}" method="POST">  
                        @if (Session::has('success'))
                        <div class="alert alert-danger">{{Session::get('success')}}</div>
                        @endif
                        @if (Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif                        
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="mail" name="email"  value="{{ old('email') }}" class="form-control" placeholder="Enter your mail">
                            <span class="text-danger"> @error('email'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            <span class="text-danger"> @error('password'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="save" class="btn btn-primary btn-sm text-uppercase mb-2" value="Login">
                            <a href="{{ route('auth_register') }}" class="float-right text-dark" style="font-size: 16px">New User,Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-loginlayout>