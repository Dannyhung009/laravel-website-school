<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Title;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all = Ad::all();
        // dd($all);
        $cols = ['動態文字廣告', '顯示', '刪除',];
        $rows = [];

        foreach ($all as $a) {
            $tmp = [

                [
                    'tag' => '',
                    'text' => $a->text,

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

            ];

            $rows[] = $tmp;
        }

        // dd($rows);
            // $useTitle=Title::where("sh",1)->first();


        //使用物件導向繼承controller.php
        $this->view['header'] = '動態文字廣告管理';
        $this->view['module'] = 'Ad';
        $this->view['cols'] = $cols;
        $this->view['rows'] = $rows;   
        return view('backend.module', $this->view);



        //舊版
        // $view = [

        //     'header' => '動態文字廣告管理',
        //     'module' => 'Ad',
        //     'cols' => $cols,
        //     'rows' => $rows,
        //     'useTitle'=>$this->useTitle,
        // ];
        // return view('backend.module', $view);

        // $all = Ad::all();
        // return view('backend.module', ['header' => '動態文字廣告管理', 'module' => 'Ad','rows'=>$all]);
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
            'action' => '/admin/ad',
            'modal_header' => "新增動態廣告文字",
            'modal_body' => [
                [
                    'label' => '動態廣告文字',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'text',
                    'value' => '請輸入文字'
                ],

            ],
        ];
        return view(" modals.base_modal", $view);
        //
        // $view = [
        //     'action' => "/admin/ad",
        //     'modal_header' => "新增網站標題",
        //     'modal_body' => [
        //         [
        //             'label' => '標題區圖片',
        //             'tag' => 'input',
        //             'type' => 'file',
        //             'name' => 'img'
        //         ],
        //         [
        //             'label' => '標題區替代文字',
        //             'tag' => 'input',
        //             'type' => 'text',
        //             'name' => 'text'
        //         ],
        //     ],
        // ];
        // return view(" modals.base_modal", $view);
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
        // if ($request->hasFile('img') && $request->file('img')->isValid()) {
        $ad = new Ad;
        // $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

        // $title->img = $request->file('img')->getClientOriginalName();
        $ad->text = $request->input('text');
        $ad->save();
        // }
        return redirect('/admin/ad');

        //第一版
        // dd($request);
        // if($request->hasFile('img') && $request->file('img')->isValid()){
        //     $filename=$request->file('img')->getClientOriginalName();
        //     $request->file('img')->storeAs('img',$filename);
        //     $text=$request->input('text');

        //     $title=new Title;
        //     $title->img=$filename;
        //     $title->text=$text;

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
        $ad = Ad::find($id);
        $view = [
            'action' => '/admin/ad/' . $id,
            'method' => 'PATCH',
            'modal_header' => "編輯動態廣告文字資料",
            'modal_body' => [

                [
                    'label' => '動態廣告文字',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'text',
                    'value' => $ad->text
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
        $ad = Ad::find($id);
        // if ($request->hasFile('img') && $request->file('img')->isValid()) {

        //     $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

        //     $title->img = $request->file('img')->getClientOriginalName();
        // }

        if ($ad->text != $request->input('text')) {
            $ad->text = $request->input('text');
            $ad->save();
        }






        // $title=Title::where("id",$id)->get();

        return redirect('admin/ad');
        // return redirect('/admin/title');
    }

    /**
     * 改變資料的顯示狀態
     * 
     */
    public function display($id)
    {
        //複選
        $ad = Ad::find($id);
        $view = [
            'action' => '/admin/ad/' . $id,
            'method' => 'PATCH',
            'modal_header' => "編輯動態廣告文字資料",
            'modal_body' => [

                [
                    'label' => '動態廣告文字',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'text',
                    'value' => $ad->text
                ],
            ],
        ];

        $ad->sh = ($ad->sh + 1) % 2;


        $ad->save();

        //單選
        // $title = Ttile::find($id);
        // if ($title->sh == 1) {
        //     $title->sh = 0;
        //     $findDefault = Title::where("sh", 0)->first();
        //     $findDefault->sh = 1;

        //     $title->save();
        //     $findDefault->save();
        // } else {
        //     $title->sh = 1;
        //     $findShow = Title::where("sh", 1)->first();
        //     $findShow->sh = 0;

        //     $title->save();
        //     $findShow->save();
        // }
        // $title->save();





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
        $ad = Ad::destroy($id);
    }
}
