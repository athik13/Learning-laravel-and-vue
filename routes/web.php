<?php
use Illuminate\Http\Request;
use App\Ip;
use App\BrowserHeader;
use App\Locations;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/image');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/image', function (Request $request) {
    $user_userAgent = $request->userAgent();
    $user_ips = $request->ips();
    $user_ip = $user_ips[0];

    $old_ip = Ip::where('ip', $user_ip)->first();
    if (!$old_ip) {
        $ip = new Ip;
        $ip->ip = $user_ip;
        $ip->save();

        $userAgent = new BrowserHeader;
        $userAgent->ip_id = $ip->id;
        $userAgent->userAgent = $user_userAgent;
        $userAgent->save();
    } else {
        $old_userAgent = BrowserHeader::where('ip_id', $old_ip->id)->where('userAgent', $user_userAgent)->first();
        // dd($old_userAgent);
        
        if(!$old_userAgent) {
            $userAgent = new BrowserHeader;
            $userAgent->ip_id = $old_ip->id;
            $userAgent->userAgent = $user_userAgent;
            $userAgent->save();
        }
    }

    // dd($userAgent, $ip);
    return view('tracking.image.index');
});

Route::post('/image-post', function (Request $request) {
    $user_userAgent = $request->userAgent();
    $user_ips = $request->ips();
    $user_ip = $user_ips[0];
    // dd($userAgent, $ip);

    $old_ip = Ip::where('ip', $user_ip)->first();
    if (!$old_ip) {
        $ip = new Ip;
        $ip->ip = $user_ip;
        $ip->save();

        $userAgent = new BrowserHeader;
        $userAgent->ip_id = $ip->id;
        $userAgent->userAgent = $user_userAgent;
        $userAgent->save();
    } else {
        $old_userAgent = BrowserHeader::where('ip_id', $old_ip->id)->where('userAgent', $user_userAgent)->first();
        
        $location = new Locations;
        $location->userAgent_id = $old_userAgent->id;
        // dd($old_userAgent);
        
        if(!$old_userAgent) {
            $userAgent = new BrowserHeader;
            $userAgent->ip_id = $old_ip->id;
            $userAgent->userAgent = $user_userAgent;
            $userAgent->save();

            $location = new Locations;
            $location->userAgent_id = $userAgent->id;
        }
    }

    $location->latitude = $request->latitude;
    $location->longitude = $request->longitude;
    $location->accuracy = $request->accuracy;
    $location->altitude = $request->altitude;
    $location->altitudeAccuracy = $request->altitudeAccuracy;
    $location->heading = $request->heading;
    $location->speed = $request->speed;
    $location->request_timestamp = $request->request_timestamp;
    $location->save();

    return response()->json([ 'status' => 'success' ]);
    // dd($request);
});

Route::get('/map', function () {
    $locations = Locations::all();
    return view('tracking.map.index', compact('locations'));
});
