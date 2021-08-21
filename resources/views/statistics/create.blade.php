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
                                <h2 class="mb-0">New Statistic</h2>
                                <p class="text-sm mb-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
    
                        <form method="post" action="{{ route('statistics.store') }}" id="role-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name</label>
                                <input type="text" name="name" class="form-control form-control-alternative" id="name">
                            </div> 

                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input type="text" name="email" class="form-control form-control-alternative" id="email">
                            </div> 

                            <div class="form-group">
                                <label class="form-control-label" for="mobile">Mobile</label>
                                <input type="text" name="mobile" class="form-control form-control-alternative" id="mobile">
                            </div> 

                            <div class="form-group">
                                <label class="form-control-label" for="profile">Profile</label>
                                <input type="text" name="profile" class="form-control form-control-alternative" id="profile">
                            </div> 

                            <div class="form-group">
                                <label class="form-control-label" for="followers">Followers</label>
                                <input type="text" name="followers" class="form-control form-control-alternative" id="followers">
                            </div> 

                            <div class="form-group">
                                <label class="form-control-label" for="following">Following</label>
                                <input type="text" name="following" class="form-control form-control-alternative" id="following">
                            </div> 

                            <div class="form-group">
                                <label class="form-control-label" for="posts">Posts</label>
                                <input type="text" name="posts" class="form-control form-control-alternative" id="posts">
                            </div> 

                            <div class="form-group">
                                <label class="form-control-label" for="engagement_rate">Engagement Rate</label>
                                <input type="text" name="engagement_rate" class="form-control form-control-alternative" id="engagement_rate">
                            </div> 
                            
                            <div class="text-right">
                                <button type="submit" class="btn btn-success mt-4">Add Statistic</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection