<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AppHero;
use App\Models\CmsApp;
use App\Models\Event;
use App\Models\Media;
use App\Models\Solution;
use App\Models\Team;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class IziklaimController extends Controller
{
    public function index(){
        $hero       = AppHero::where('app_id',3)->first();
        $heroMini   = json_decode($hero->extend,true);
        $visiMisi   = VisiMisi::where('app_id',3)->first();
        $teamUp     = Team::where('up_lv',1)->get();
        $teamDown   = Team::where('up_lv',0)->get(); 
        $team       = [];
        $team2       = [];
        foreach ($teamUp as $value) {
            $team[] = [
                'image' => asset($value->image),
                'name'  => $value->name,
                'title' => $value->title
            ];
        }
        foreach ($teamDown as $value) {
            $team2[] = [
                'image' => asset($value->image),
                'name'  => $value->name,
            ];
        }
        $sol = Solution::where('app_id',3)->get();
        $solution = [];

      foreach ($sol as $s) {
            $extend   = json_decode($s->extend,true);
            if(isset($extend['button'])){
                $button = [
                    'name'  => $extend['button']['name'],
                    'val'   => $extend['button']['val'] 
                ];
            }else{
                $button =  false;
            }

            $solution[] = [
                'title' => $s->title,
                'sub_title' => $s->sub_title,
                'image' => asset($extend['image']),
                'miniImg' => isset($extend['mini_image']) ? asset($extend['mini_image']) : null,
                'icon'    => isset($extend['icon']) ? asset($extend['icon']) : null,
                'position'  => ($extend['img_postion']),
                'default'  => ($extend['defauult']),
                'button'    => $button
                
            ];
        }

        $provider = [];
        $prov = Media::whereIn('mark',['provider'])->get();
        foreach ($prov as $key => $value) {
            $provider[] = [
                'mark'  => $value->mark,
                'title' => $value->title,
                'value' => num($value->text)
            ];
        }
        $providerImg = [];
        $provimg = Media::whereIn('title',['provider','client','maps'])->where(['mark'=>'slider'])->get();
        foreach ($provimg as $key => $value) {
            $providerImg[$value->title][] = [
                'images' => asset($value->images),
            ];
        }
        $event = [];
        $evt    = Event::where('app_id',3)->get();
        foreach ($evt as $val) {
            $event[] = [
                'name'  => $val->name,
                'image' => asset($val->image)
            ];
        }
        $contact = CmsApp::find(3);
        $data['hero']  = [
            'image'         => asset($hero->image),
            'title'         => $hero->title,
            'image_mini'    => asset($heroMini['sub_image'])
        ];
        $data['visiMisi']  = [
            'visi'  => $visiMisi->visi,
            'misi'  => $visiMisi->misi
        ]; 
        $data['team'] = ['up'=>$team,'down'=>$team2];
        $data['solution'] = $solution;
        $data['provider'] =  ['text'=>$provider,'slider'=>$providerImg];
        $data['event']  = $event;
        $data['app'] = [
            'name'  => $contact->app_name,
            'url'   => $contact->app_url,
            'logo'  => $contact->logo,
            'address'   => $contact->app_address,
            'mail'  => $contact->app_mail,
            'phone' => $contact->app_phone,
            'wa'    => $contact->app_wa,
            'gmaps' => $contact->app_gmaps
        ];

        return response()->json([
            'status' => 200,
            'message'   => 'Iziklaim Landing API',
            'data'      => $data
        ]);
    }
}