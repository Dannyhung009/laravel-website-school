<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Ad;
use App\Models\Mvim;
use App\Models\News;
use Illuminate\Http\Request;

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

        $ads=implode("　",AD::where("sh",1)->get()->pluck('text')->toArray()) ;
        // dd($ads);
        $this->view['ads']=$ads;

        //原生php做法
        // foreach($ads as $ad){

        // }
        


        return view('main', $this->view);
    }

    protected function sideBar()
    {
        $menus = Menu::where("sh", 1)->get();
        $images = Image::where("sh", 1)->get();

        foreach ($menus as $key => $menu) {

            $subs = $menu->subs;
            //原本SQL builder語法
            // $subs=SubMenu::where("menu_id",$menu->id)->get();
            // dd($subs);
            $menu->subs = $subs;
            // dd($menu);
            $menus[$key] = $menu;
        }
        // dd($menus);
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
