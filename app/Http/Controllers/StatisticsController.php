<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search =  $request->input('q');
        if(isset($search) && !empty($search)){
            $statistics = Statistics::where(function ($query) use ($search) {
                $query->where('name', 'like', $search.'%')                
                    ->orWhere('email', 'like', $search.'%')
                    ->orWhere('mobile', 'like', $search.'%');
            })->paginate(25);
           $statistics->appends(['q' => $search]);
        } else {
            $statistics = Statistics::paginate(15);
        }

        return view('statistics.index', compact('statistics', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' =>'required|unique:statistics',
            'mobile' =>'required|unique:statistics',
            'profile' =>'required',
        ]);

        $statistics = new Statistics([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'profile' => $request->get('profile'),
            'followers' => $request->get('followers'),
            'following' => $request->get('following'),
            'posts' => $request->get('posts'),
            'engagement_rate' => $request->get('engagement_rate')
        ]);

        $statistics->save();
        return redirect('/statistics')->with('success', 'Statistic Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function show(Statistics $statistics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statistic = Statistics::find($id);
        return view('statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'mobile' =>'required',
            'profile' =>'required'
        ]);

        $statistics = Statistics::find($id);
        $statistics->name =  $request->get('name');
        $statistics->email = $request->get('email');
        $statistics->mobile = $request->get('mobile');
        $statistics->profile = $request->get('profile');
        $statistics->followers = $request->get('followers');
        $statistics->following = $request->get('following');
        $statistics->posts = $request->get('posts');
        $statistics->engagement_rate = $request->get('engagement_rate');
        $statistics->save();

        return redirect('/statistics')->with('success', 'Statistic updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statistics = Statistics::find($id);
        $statistics->delete();

        return redirect('/statistics')->with('success', 'Statistic deleted!');
    }
}
