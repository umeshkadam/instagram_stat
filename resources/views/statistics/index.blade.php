@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
    <div class="container-fluid mt--7">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}  
            </div>
        @endif

        @if(auth()->user()->hasRole('admin'))
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Statistics</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('statistics.create')}}" class="btn btn-sm btn-primary">Add Statistic</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12"> </div>
                        <div class="table-responsive">
                            <div class="row w-100">
                                <div class="col-sm-12 col-md-6">
                                    {{-- <div class="div ml-2">
                                        <label for="rate" class="form-label">Followers : </label>
                                        <input id="engagement_rate_range" type="range" class="form-range" min="0" max="50000" step="1">
                                        <span id="engagement_rate_range_count"></span>
                                    </div> --}}
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <form action="" role="search">
                                        <div id="datatable-basic_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" name="q" class="form-control form-control-sm" placeholder="Enter name, email or mobile" value="{{$search}}"></label>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Followers</th>
                                        <th scope="col">Following</th>
                                        <th scope="col">Engagement Rate</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($statistics as $statistic)
                                        <tr>
                                            <td>{{$statistic->id}}</td>
                                            <td>{{$statistic->name}}</td>
                                            <td> {{$statistic->email}}</td>
                                            <td> {{$statistic->mobile}}</td>
                                            <td> {{$statistic->followers}}</td>
                                            <td> {{$statistic->following}}</td>
                                            <td> {{$statistic->engagement_rate}}</td>
                                            <td class="text-left">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" href="{{ route('statistics.edit', $statistic->id) }}">Edit</a>
                                                        <form action="{{ route('statistics.destroy', $statistic->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="dropdown-item" onclick="return confirm('Are you sure to delete?')"> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @include('layouts.footers.auth')
    </div>

    <script>
        // var slider = document.getElementById("engagement_rate_range");
        // var output = document.getElementById("engagement_rate_range_count");
        // output.innerHTML = slider.value;

        // slider.oninput = function() {
        //     output.innerHTML = this.value;
        // }
    </script>
@endsection