<?php

namespace App\Http\Controllers;

use App\Http\Requests\SitePostRequest;
use App\Models\Site;
use App\Models\Utos;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function indexAction($method, SitePostRequest $request) {
        switch($method)
        {
            case 'add':
                $this->add($request);
                break;
            case 'get':
                $this->get($request);
                break;
        }
    }

    public function add(SitePostRequest $request) {
        $user_id = $request->input('user_id');
        $site = Site::firstOrCreate([
            'domain_name'=>$request->input('domain')
        ]);
        $utosKey = intval(''.$user_id.$site->id);
        $utos = Utos::firstOrCreate(
            ['utos_id' => $utosKey],
            ['site_id'=>$site->id, 'user_id'=>$user_id]
        );
        $data = [
            'domain' => $site->domain_name,
            'id' => $site->id
        ];
        echo json_encode($data);
    }

    public function get(SitePostRequest $request) {
        $sites = DB::table('sites')
            ->join('utos', 'utos.site_id', '=', 'sites.id')
            ->where('utos.user_id', '=', $request->input('user_id'))
            ->select('sites.domain_name', 'sites.id')
            ->orderBy('sites.id', 'asc')
            ->get();
        $data = [];
        foreach ($sites as $site){
            $data[$site->id] = [
                'domain' => $site->domain_name,
                'id' => $site->id
            ];
        }
        echo json_encode($data);
    }

}
