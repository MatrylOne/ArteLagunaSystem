<?php

namespace App\Http\Controllers;

use App\Award;
use App\Work;
use Illuminate\Http\Request;

/**
 * Public page controller
 * @package App\Http\Controllers
 */
class PublicController extends Controller
{

    /**
     * Renders index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('public.home');
    }

    /**
     * Renders public award page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function awards()
    {
        $awards = Award::all();
        return view('public.awards', ['awards' => $awards]);
    }

    /**
     * Renders public policy page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function policy()
    {
        return view('public.policy');
    }

    /**
     * Renders public works page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function works(){
        $works = Work::all();
        return view('public.works', ['works' => $works]);
    }
}
