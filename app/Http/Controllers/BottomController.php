<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bottom;

class BottomController extends Controller
{
    //
    public function index()
    {
        //
        $bottom = Bottom::first();
        // dd($all);
        $cols = ['頁尾版權文字管理'];
        $rows =
            [
                [
                    'text' => $bottom->bottom,
                ],

                [
                    'tag' => 'button',
                    'type' => 'button',
                    'btn_color' => 'btn-info',
                    'action' => 'edit',
                    'id' => $bottom->id,
                    'text' => '編輯',

                ],
            ];



        // dd($rows);

        //使用物件導向繼承controller.php
        $this->view['header'] = '頁尾版權文字管理';
        $this->view['module'] = 'Bottom';
        $this->view['cols'] = $cols;
        $this->view['rows'] = $rows;   
        return view('backend.module', $this->view);


        // $view = [
        //     'header' => '頁尾版權文字管理',
        //     'module' => 'Bottom',
        //     'cols' => $cols,
        //     'rows' => $rows,
        // ];
        // return view('backend.module', $view);
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
        $bottom = Bottom::find($id);
        $view = [
            'action' => '/admin/bottom/' . $id,
            'method' => 'PATCH',
            'modal_header' => "編輯頁尾版權文字",
            'modal_body' => [

                [
                    'label' => '頁尾版權文字',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'bottom',
                    'value' => $bottom->bottom
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
        $bottom = Bottom::find($id);
        // if ($request->hasFile('img') && $request->file('img')->isValid()) {

        //     $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

        //     $title->img = $request->file('img')->getClientOriginalName();
        // }

        if ($bottom->bottom != $request->input('bottom')) {
            $bottom->bottom = $request->input('bottom');
            $bottom->save();
        }






        // $title=Title::where("id",$id)->get();

        return redirect('admin/bottom');
        // return redirect('/admin/title');
    }








}
