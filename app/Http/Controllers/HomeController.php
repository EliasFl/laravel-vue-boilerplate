<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Utils;
use Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app');
    }

    /**
     * Get initial data for Vue.js application
     */
    public function vue()
    {
        $homeItems = [
            [
                'name' => 'strings.users',
                'icon' => 'fa-users',
                'link' => 'users',
            ],
            [
                'name' => 'strings.messages',
                'icon' => 'fa-envelope',
                'link' => 'messages',
            ],
            [
                'name' => 'strings.example',
                'icon' => 'fa-lightbulb-o',
                'link' => 'example',
            ],
        ];

        $settingsFile = Utils::getSettingsFile();

        $settings = array();

        if (file_exists($settingsFile)) {
            $settings = json_decode(file_get_contents($settingsFile));
        }

        $data = [
            'homeItems' => $homeItems,
            'settings' => $settings,
        ];

        return $data;
    }
}
