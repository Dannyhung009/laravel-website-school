<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Mvim;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use App\Models\Total;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->sideBar();

        // $ads = implode("　", AD::where("sh", 1)->get()->pluck('text')->toArray());
        $mvims = Mvim::select("id","img")-> where("sh", 1)->get()->map(function($val,$idx){
            $val->show=($idx==0)?true:false;
            // $val->show=false;
            $val->img=asset("storage/".$val->img);
            return $val;
            


        });

        // $mvims = Mvim::where("sh", 1)->get();
        $news = News::where("sh", 1)->get()->filter(function ($val, $idx) {
            if ($idx > 4) {
                $this->view['more'] = '/news';
                // return null;
            } else {
                return $val;
            }
        });

        // dd($news,$this->view);

        // $this->view['ads'] = $ads;
        $this->view['mvims'] = $mvims;
        $this->view['news'] = $news;

        //原生php做法
        // foreach($ads as $ad){

        // }

        return view('main', $this->view);
    }

    protected function sideBar()
    {

        $menus = Menu::select('id', 'text','href')->where("sh", 1)->get();
        $images = Image::select('id','img')-> where("sh", 1)-> get()->map(function($val,$idx){
            $val ->img=asset("storage/".$val->img);

            //在前端顯示3張圖片，其餘隱藏
            if($idx>2){
                $val->show=false;

            }else{
                $val->show = true;
            }

            // $val ->show=false;
            return $val;

        });
        $ads = implode("　", AD::where("sh", 1)->get()->pluck('text')->toArray());

        foreach ($menus as $key => $menu) {

            $subs = $menu->subs;
            //原本SQL builder語法
            // $subs=SubMenu::where("menu_id",$menu->id)->get();
            // dd($subs);
            $menu->subs = $subs;
            // dd($menu);
            $menu->show=false;
            $menus[$key] = $menu;
        }
        // dd($menus);

        if (Auth::user()) {
            $this->view['user'] = Auth::user();
        }

        // if(!session()->has('visiter')){
        //     $total=Total::first();
        //     $total->total++;
        //     $total->save();
        //     $this->view['total']=$total->total;
        //     // session(['visiter'=>$total->total]);
        //     session()->put('visiter',$total->total);
        // }


        $this->view['ads'] = $ads;
        $this->view['menus'] = $menus;
        $this->view['images'] = $images;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
