<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClickController extends Controller
{
    public function indexAction($method, Request $request) {
        switch ($method)
        {
            case 'add':
                $this->add($request);
                break;
        }
    }

    public function add(Request $request) {
        $site_id = $request->json('id');
        $click_info = $request->json('click_info');
        $arData = [];
        foreach ($click_info as $info) {
            $tempData = [];
            $tempData['site_id'] = $site_id;
            $tempData['cord_x'] = $info['cords']['x'];
            $tempData['cord_y'] = $info['cords']['y'];
            $date_str = strtotime($info['date']);
            $tempData['date'] = date("Y-m-d", $date_str);
            $tempData['hours'] = date("H", $date_str);
            $arData[] = $tempData;
        }
        DB::table('clicks')->insert($arData);
    }


}
