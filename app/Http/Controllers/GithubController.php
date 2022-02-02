<?php

namespace App\Http\Controllers;

use App\VersionControl\Version1Handler;
use App\VersionControl\Version2Handler;
use App\VersionControl\Version3Handler;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

use App\Requests\StarredRepositoriesRequest;
use App\Requests\UserRequest;

class GithubController extends Controller
{
    public function __construct()
    {
        // You'd move this into its own class but... lack of time.
        $version1 = new Version1Handler();
        $version2 = new Version2Handler();
        $version3 = new Version3Handler();

        // Build the chain, we'll keep proceeding down the chain until we get the right version number
        // Version number is defined in the .env file (GITHUB_API_VERSION = 3)
        $version1->setNext($version2)->setNext($version3);

        $currentVersion = (int)env('GITHUB_API_VERSION');

        $this->version = $version1->handle($currentVersion);
    }
    public function index(Request $request)
    {
        $username = $request->input('username', null);
        $userInfo = [];
        $starredRepositories = [];

        if (!empty($username)) {

            // Limit the number of requests to 5 per minute from given IP.
            $key = 'github-request-' . $request->server('REMOTE_ADDR');
            if (RateLimiter::remaining($key, 5)) {
                RateLimiter::hit($key);

                $userInfo = (new UserRequest())
                    ->parameters(['username' => $username])
                    ->request();

                $starredRepositories = (new StarredRepositoriesRequest())
                    ->parameters(['username' => $username])
                    ->request();
            } else {
                throw new \Exception('Too many request sent, try again in a minute!');
            }
        }

        return view('github-search',
            [
                'username' => $username,
                'userInfo' => $userInfo,
                'starredRepositories' => $starredRepositories,
                'version' => $this->version
            ]
        );
    }
}
