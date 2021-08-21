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
                                <h2 class="mb-0">Update a Role - {{ $role->name }}</h2>
                                <p class="text-sm mb-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('roles.update', $role->id) }}" enctype="multipart/form-data">
                            @method('PATCH') 
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name</label>
                                <input type="text" name="name" class="form-control form-control-alternative" id="name" value="{{ $role->name }}" >
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control form-control-alternative" id="slug" value="{{ $role->slug }}">
                            </div> 
                            <div class="text-right">
                                <button type="submit" class="btn btn-success mt-4">Update Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection