<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mvim;

class MvimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all = Mvim::all();
        // dd($all);
        $cols = ['動畫圖片', '顯示', '刪除', '更換動畫'];
        $rows = [];

        foreach ($all as $a) {
            $tmp = [
                [
                    'tag' => 'embed',
                    // 參照前端模板{{asset('storage/'.$row->img)}}
                    'src' => $a->img,

                    'style' => 'width:300px;height:auto;',
                    // 'style' => 'width:100%;height:100%',
                    // 'style' => 'width:50%,height:30px',

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
            ];

            $rows[] = $tmp;
        }

        // dd($rows);

        //使用物件導向繼承controller.php
        $this->view['header'] = '動畫圖片管理';
        $this->view['module'] = 'Mvim';
        $this->view['cols'] = $cols;
        $this->view['rows'] = $rows;   
        return view('backend.module', $this->view);


        // $view = [
        //     'header' => '動畫圖片管理',
        //     'module' => 'Mvim',
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
            'action' => "/admin/mvim",
            'modal_header' => "新增動畫圖片",
            'modal_body' => [
                [
                    'label' => '動畫圖片管理',
                    'tag' => 'input',
                    'type' => 'file',
                    'name' => 'img'
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
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $mvim = new Mvim;
            $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

            $mvim->img = $request->file('img')->getClientOriginalName();
            // $title->text = $request->input('text');
            $mvim->save();
        }
        return redirect('/admin/mvim');

        //第一版
        // dd($request);
        // if($request->hasFile('img') && $request->file('img')->isValid()){
        //     $filename=$request->file('img')->getClientOriginalName();
        //     $request->file('img')->storeAs('img',$filename);
        //     $text=$request->input('text');

        //     $title=new Mvim;
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
        $mvim = Mvim::find($id);
        $view = [
            'action' => '/admin/mvim/' . $id,
            'method' => 'PATCH',
            'modal_header' => "編輯動畫圖片",
            'modal_body' => [
                [
                    'label' => '目前動畫圖片',
                    'tag' => 'img',
                    'src' => $mvim->img,
                    // 'style' => 'width:100%;height:100%;',
                    'style' => 'width:300px;height:auto;',
                ],
                [
                    'label' => '更換動畫圖片',
                    'tag' => 'input',
                    'type' => 'file',
                    'name' => 'img'
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
        $mvim = Mvim::find($id);
        if ($request->hasFile('img') && $request->file('img')->isValid()) {

            $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

            $mvim->img = $request->file('img')->getClientOriginalName();
            $mvim->save();
        }

        // if ($mvim->text != $request->input('text')) {
        //     $mvim->text = $request->input('text');
        // }






        // $title=Mvim::where("id",$id)->get();

        return redirect('admin/mvim');
        // return redirect('/admin/title');
    }

    /**
     * 改變資料的顯示狀態
     * 
     */
    public function display($id)
    {
        $mvim = Mvim::find($id);
        $mvim->sh = ($mvim->sh + 1) % 2;
        $mvim->save();
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
        Mvim::destroy($id);
    }
}
