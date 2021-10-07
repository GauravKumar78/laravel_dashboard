<x-loginlayout>
    <x-slot name="title">Register</x-slot>
    <x-slot name="content">
        <div class="container">
            <div class="row" style="margin-top: 80px">
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-10 offset-1 p-4 bg-transparent shadow shadow-lg text-dark">
                    <div class="d-flex justify-content-between">
                        <h3 class="text-uppercase">User Registration form</h3> 
                        @if (Session::has('userid'))
                            <a href="{{ route('auth_index') }}" class="btn text-white btn-sm  btn-outline-danger" style="height: 30px;">Back<i class="fa fa-arrow-right ml-1" aria-hidden="true"></i></a>
                        @endif
                                             
                    </div>
                    <hr class="mb-4">
                    <form action="{{ route('register') }}" method="POST" autocomplete="off">   
                        @if (Session::has('success'))
                        <div class="alert alert-danger">{{Session::get('success')}}</div>
                        @endif
                        @if (Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif                     
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control " placeholder="Enter your name">
                                    <span class="text-danger">@error('name') {{$message}} @enderror</span> 
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Father Name</label>
                                    <input type="text" name="fathername" value="{{old('fathername')}}" class="form-control " placeholder="Enter your fathername">
                                    <span class="text-danger">@error('fathername') {{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="mail" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter your mail">
                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Enter your password">
                                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Enter your phone number">
                                    <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" name="dob" value="{{old('dob')}}" class="form-control" placeholder="Enter your date of birth">
                                    <span class="text-danger">@error('dob') {{$message}} @enderror</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mt-3">
                            <input type="submit" name="registerform" class="btn btn-sm text-uppercase btn-primary mb-2" value="Register"> 
                            @if (!Session::has('userid'))
                                <a href="{{route('auth_login')}}" class="float-right text-dark" style="font-size: 16px">Already User,Login</a>
                             @endif                        
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-loginlayout>
