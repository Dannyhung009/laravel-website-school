<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all = News::all();
        // dd($all);
        $cols = ['最新消息內容', '顯示', '刪除', '編輯',];
        $rows = [];

        foreach ($all as $a) {
            $tmp = [

                [
                    'tag' => '',
                    'text' => mb_substr($a->text, 0, 50, 'utf8'),

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
        $this->view['header'] = '最新消息內容管理';
        $this->view['module'] = 'News';
        $this->view['cols'] = $cols;
        $this->view['rows'] = $rows;   
        return view('backend.module', $this->view);

        // $view = [
        //     'header' => '最新消息內容管理',
        //     'module' => 'News',
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
            'action' => "/admin/news",
            'modal_header' => "新增最新消息內容",
            'modal_body' => [
                // [
                //     'label' => '最新消息內容',
                //     'tag' => 'input',
                //     'style' => 'width:200px;height:100px',
                //     'type' => 'text',
                //     'name' => 'text',
                // ],
                [
                    'label' => '最新消息內容',
                    'tag' => 'textarea',
                    'style' => 'width:500px;height:300px',
                    'name' => 'text',
                    'type' => 'text',
                    // 'value' => '',
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
        $news = new News;
        $news->text = $request->input('text');
        $news->save();
        return redirect('/admin/news');


        // if ($request->hasFile('img') && $request->file('img')->isValid()) {
        //     $news = new News;
        //     $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

        //     $news->img = $request->file('img')->getClientOriginalName();
        //     $news->text = $request->input('text');
        //     $news->save();
        // }
        // return redirect('/admin/news');


        //第一版
        // dd($request);
        // if($request->hasFile('img') && $request->file('img')->isValid()){
        //     $filename=$request->file('img')->getClientOriginalName();
        //     $request->file('img')->storeAs('img',$filename);
        //     $text=$request->input('text');

        //     $news=new News;
        //     $news->img=$filename;
        //     $news->text=$text;

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
        $news = News::find($id);
        $view = [
            'action' => '/admin/news/' . $id,
            'method' => 'PATCH',
            'modal_header' => "編輯最新消息內容",
            'modal_body' => [


                [
                    'label' => '最新消息內容',
                    'tag' => 'textarea',
                    'style' => 'width:200px;height:100px;',
                    'name' => 'text',
                    'value' => $news->text
                ],
                // [
                //     'label' => '最新消息內容',
                //     'tag' => 'textarea',
                //     // 'style' => 'width:200px;height:100px;',
                //     'name' => 'text',
                //     'value' => $news->text
                // ],
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
        $news = News::find($id);
        // if ($request->hasFile('img') && $request->file('img')->isValid()) {

        //     $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

        //     $news->img = $request->file('img')->getClientOriginalName();
        // }

        if ($news->text != $request->input('text')) {
            $news->text = $request->input('text');
        }





        $news->save();
        // $news=News::where("id",$id)->get();

        return redirect('admin/news');
        // return redirect('/admin/news');
    }

    /**
     * 改變資料的顯示狀態
     * 
     */
    public function display($id)
    {
        $news = News::find($id);
        if ($news->sh == 1) {
            $news->sh = 0;
            $findDefault = News::where("sh", 0)->first();
            $findDefault->sh = 1;

            $news->save();
            $findDefault->save();
        } else {
            $news->sh = 1;
            $findShow = News::where("sh", 1)->first();
            $findShow->sh = 0;

            $news->save();
            $findShow->save();
        }
        // $news->save();
        // $news->save();



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
        $news = News::destroy($id);
    }
}
