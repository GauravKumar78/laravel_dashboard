<x-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <x-slot name="content">
        <!-- ============================================================== -->
        <!--  pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 my-3">
                <div class="page-header">
                    <h2>Welcome To  Dashboard</h2>          
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-responsive shadow shadow-sm p-3">
                    <div class="d-flex justify-content-between mb-4 h3">
                        <h3 class="text-center text-uppercase">Users Data</h3>
                        <div class="div">
                            {{-- <a href="{{ route('auth_usertrash') }}" class="btn btn-sm btn-outline-primary" style="height: 30px;">Go To Trash</a> --}}
                            <a href="{{ route('register') }}" class="btn btn-sm btn-outline-primary" style="height: 30px;"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Add</a>
                        </div>
                    </div>
                    @if(session()->has('msg'))
                    <div class="alert alert-dark">
                       {{ session('msg') }}
                    </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th style="min-width: 130px">Username</th>
                                <th style="min-width: 130px">Father Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $usr) 
                            <tr>
                                <td>{{ $usr->name }}</td>
                                <td>{{ $usr->fathername }}</td>
                                <td>{{ $usr->email }}</td>
                                <td>{{ $usr->phone }}</td>
                                <td>{{get_formetted_date($usr->dob,'d/M/Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('auth_edit' ,$usr->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <a href="{{ route('delete' , $usr->id) }}" class="btn btn-sm btn-outline-danger">Trash</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>   
                    <div class="d-flex justify-content-end">{{$user->links()}}</div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>