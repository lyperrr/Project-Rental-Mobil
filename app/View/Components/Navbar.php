<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NavBar extends Component
{
    public $userProfile;

    public function __construct()
    {
        $this->userProfile = Auth::check() ? Auth::user()->userProfile : null;
    }

    public function render()
    {
        return view('components.navbar');
    }
}
