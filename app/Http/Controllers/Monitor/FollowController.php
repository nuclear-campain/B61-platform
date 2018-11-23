<?php

namespace App\Http\Controllers\Monitor;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

/**
 * CLass FollowController
 * 
 * @package App\Http\Controllers\Monitor
 */
class FollowController extends Controller
{
    /**
     * FollowController constructor
     * 
     * @return void
     */
    public function __construct() 
    {
        parent::__construct();
        $this->middleware(['auth']);
    }

    /**
     * 
     */
    public function index(City $city): View
    {
        $cities = $this->auth->user()->followings($city)->simplePaginate();
        return view('monitor.index', compact('cities'));
    }

    /**
     * Method for following a city in the monitor. 
     * 
     * @param  City $city The resource entity from the city in the storage. 
     * @return RedirectResponse
     */
    public function follow(City $city): RedirectResponse
    {
        if (! $this->auth->user()->isFollowing($city)) {
            $this->auth->user()->follow($city); 
            $this->flashMessage->success("U started following the city <strong>{$city->name}</strong>!");
        }

        return redirect()->back();
    }

    /**
     * Method your unfollowing a city in the application. 
     * 
     * @param  City $city The resource entity from the city in the storage. 
     * @return RedirectResponse
     */
    public function unfollow(City $city): RedirectResponse 
    {
        if ($this->auth->user()->isFollowing($city)) {
            $this->auth->user()->unfollow($city); 
            $this->flashMessage->info("Your not following the city <strong>{$city->name}</strong> anymore!");
        }

        return redirect()->back();
    }
}
