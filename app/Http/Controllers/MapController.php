<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use Inertia\Inertia;
use App\Models\Click;

class MapController extends Controller
{
    public function indexAction($id) {
        $site = Site::find($id);
        $url = $site->domain_name;
        $src = $this->getImage($url);
        $cords = Click::where(['site_id'=>$id])
            ->select('cord_x', 'cord_y')
            ->get();
        return Inertia::render('Map', ["src"=>$src, "cords" => $cords]);
    }

    public function getImage($url) {
        $src="https://mini.s-shot.ru/1920/PNG/1920/Z100/?$url";
        return $src;
    }
}
