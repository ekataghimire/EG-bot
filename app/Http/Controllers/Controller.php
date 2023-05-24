<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        // Get the link to the image from the domain.yml file
        $imageLink = 'https://i.imgur.com/nGF1K8f.jpg';
        
        // Pass the link as a variable to the view
        return view('home', ['imageLink' => $imageLink]);
    }

}
