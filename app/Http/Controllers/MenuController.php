<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all = Menu::all();
        // dd($all);
        $cols = ['主選單名稱', '選單連結網址',  '次選單數', '顯示', '刪除', '操作', ''];
        $rows = [];

        foreach ($all as $a) {
            $tmp = [
                [
                    'tag' => '',
                    'text' => $a->text,

                ],
                [
                    'tag' => '',
                    'text' => $a->href,

                ],
                [
                    'tag' => '',
                    'text' => $a->subs->count(),

                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'btn_color' => 'btn-success',
                    'action' => 'show',
                    'id' => $a->id,
                    'text' => ($a->sh == 1) ? '顯示' : '隱藏',


                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'btn_color' => 'btn-danger',
                    'action' => 'delete',
                    'id' => $a->id,
                    'text' => '刪除',


                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'btn_color' => 'btn-info',
                    'action' => 'edit',
                    'id' => $a->id,
                    'text' => '編輯',

                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'btn_color' => 'btn-warning',
                    'action' => 'sub',
                    'id' => $a->id,
                    'text' => '次選單',

                ],
            ];

            $rows[] = $tmp;
        }

        // dd($rows);

        //使用物件導向繼承controller.php
        $this->view['header'] = '選單管理';
        $this->view['module'] = 'Menu';
        $this->view['cols'] = $cols;
        $this->view['rows'] = $rows;   
        return view('backend.module', $this->view);


        // $view = [
        //     'header' => '選單管理',
        //     'module' => 'Menu',
        //     'cols' => $cols,
        //     'rows' => $rows,
        // ];
        // return view('backend.module', $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $view = [
            'action' => "/admin/menu",
            'modal_header' => "新增主選單",
            'modal_body' => [
                [
                    'label' => '主選單名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'text'
                ],
                [
                    'label' => '主選單連結網址',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'href'
                ],
            ],
        ];
        return view(" modals.base_modal", $view);
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
        //
        $menu = new Menu;
        $menu->text = $request->input('text');
        $menu->href = $request->input('href');
        $menu->save();

        return redirect('/admin/menu');
        // if ($request->hasFile('img') && $request->file('img')->isValid()) {
        //     $menu = new Menu;
        //     $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

        //     $menu->img = $request->file('img')->getClientOriginalName();
        //     $menu->text = $request->input('text');
        //     $menu->save();
        // }
        // return redirect('/admin/menu');

        //第一版
        // dd($request);
        // if($request->hasFile('img') && $request->file('img')->isValid()){
        //     $filename=$request->file('img')->getClientOriginalName();
        //     $request->file('img')->storeAs('img',$filename);
        //     $text=$request->input('text');

        //     $menu=new Menu;
        //     $menu->img=$filename;
        //     $menu->text=$text;

        // }



        // return "儲存新資料";
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
        $menu = Menu::find($id);
        $view = [
            'action' => '/admin/menu/' . $id,
            'method' => 'PATCH',
            'modal_header' => "編輯主選單資料",
            'modal_body' => [
                // [
                //     'label' => '',
                //     'tag' => 'img',
                //     'src' => $menu->img,
                //     'style' => 'width:300px;height:30px'
                // ],
                // [
                //     'label' => '更換標題區圖片',
                //     'tag' => 'input',
                //     'type' => 'file',
                //     'name' => 'img'
                // ],
                [
                    'label' => '主選單名稱',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'text',
                    'value' => $menu->text
                ],
                [
                    'label' => '主選單連結網址',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'href',
                    'value' => $menu->href,
                ],
            ],
        ];
        return view(" modals.base_modal", $view);
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
        // $menu = Menu::find($id);
        // if ($request->hasFile('img') && $request->file('img')->isValid()) {

        //     $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

        //     $menu->img = $request->file('img')->getClientOriginalName();
        // }

        // if ($menu->text != $request->input('text')) {
        //     $menu->text = $request->input('text');
        // }
        // $menu->save();
        // return redirect('admin/menu');

        $menu = Menu::find($id);
        if ($menu->text != $request->input('text')) {
            $menu->text = $request->input('text');
            $menu->href = $request->input('href');
            $menu->save();
        }
        return redirect('admin/menu');





        // $menu=Menu::where("id",$id)->get();


        // return redirect('/admin/menu');
    }

    /**
     * 改變資料的顯示狀態
     * 
     */
    public function display($id)
    {
        // $menu = Menu::find($id);
        // if ($menu->sh == 1) {
        //     $menu->sh = 0;
        //     $findDefault = Menu::where("sh", 0)->first();
        //     $findDefault->sh = 1;

        //     $menu->save();
        //     $findDefault->save();
        // } else {
        //     $menu->sh = 1;
        //     $findShow = Menu::where("sh", 1)->first();
        //     $findShow->sh = 0;

        //     $menu->save();
        //     $findShow->save();
        // }
        // $menu->save();
        // $menu->save();

        $menu = Menu::find($id);
        $menu->sh = ($menu->sh + 1) % 2;
        $menu->save();
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
        $menu = Menu::destroy($id);
    }
}
