@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>

<div class="container-fluid mt--7">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
        </ul>
    </div>
    <br /> 
    @endif

    @if(auth()->user()->hasRole('admin'))
        <div class="row">
            <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h2 class="mb-0">Update a User - {{ $user->name }}</h2>
                                <p class="text-sm mb-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                            @method('PATCH') 
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name</label>
                                <input type="text" name="name" class="form-control form-control-alternative" id="name" value="{{ $user->name }}" >
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input type="text" name="email" class="form-control form-control-alternative" id="email" value="{{ $user->email }}">
                            </div> 
                            <div class="form-group">
                                <label class="form-control-label" for="password">Password</label>
                                <input type="text" name="password" class="form-control form-control-alternative" id="password">
                            </div> 
                            <div class="form-group">
                                <label class="form-control-label" for="role">Role</label>
                                <select class="form-control form-control-alternative" id="role" name="role">
                                    <option value="0">Select a Option</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{ ( $role->id == $user->roles[0]->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="text-right">
                                <button type="submit" class="btn btn-success mt-4">Update User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection