<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Click;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ChartController extends Controller
{
    public function indexAction($id) {
        $data = $this->prepareData($this->getData($id));
        return Inertia::render('Chart', ['data' => $data]);
    }

    public function getData($id) {
        $data = DB::select('SELECT count(*) as count, hours FROM `clicks` WHERE `site_id`=:id GROUP BY hours',['id'=>$id]);
        return $data;
    }

    public function prepareData(array $arrData) {
        $data["count"] = [];
        $data["hours"] = [];
        foreach ($arrData as $value) {
            $data["count"][] = $value->count;
            $data["hours"][] = $value->hours;
        }
        return $data;
    }
}
