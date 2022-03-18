<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all = Admin::all();
        // dd($all);
        $cols = ['帳號', '密碼', '刪除', '編輯'];
        $rows = [];

        foreach ($all as $a) {
            $tmp = [

                [
                    'tag' => 'text',
                    'text' => $a->acc,

                ],
                [
                    'tag' => 'text',
                    'text' => $a->pw,

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
        $this->view['header'] = '網站管理者管理';
        $this->view['module'] = 'Admin';
        $this->view['cols'] = $cols;
        $this->view['rows'] = $rows;   
        return view('backend.module', $this->view);


        // $view = [
        //     'header' => '網站管理者管理',
        //     'module' => 'Admin',
        //     'cols' => $cols,
        //     'rows' => $rows,
        //     'useTitle'=>$this->useTitle,
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
            'action' => "/admin/admin",
            'modal_header' => "新增管理者",
            'modal_body' => [
                [
                    'label' => '帳號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'acc'
                ],
                [
                    'label' => '密碼',
                    'tag' => 'input',
                    'type' => 'password',
                    'name' => 'pw'
                ],
                [
                    'label' => '確認密碼',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'pw2'
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
        $admin = new Admin;
        $admin->acc = $request->input('acc');
        $admin->pw = $request->input('pw');
        $admin->save();

        return redirect('/admin/admin');
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
        $admin = Admin::find($id);
        $view = [
            'action' => '/admin/admin/' . $id,
            'method' => 'PATCH',
            'modal_header' => "修改管理者密碼",
            'modal_body' => [

                [
                    'label' => '帳號',
                    'tag' => '',
                    'text' => $admin->acc,
                ],
                [
                    'label' => '密碼',
                    'tag' => 'input',
                    'type' => 'password',
                    'name' => 'pw',
                    'value' => $admin->pw,
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
        $admin = Admin::find($id);
        // if ($request->hasFile('img') && $request->file('img')->isValid()) {

        //     $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

        //     $admin->img = $request->file('img')->getClientOriginalName();
        // }

        if ($admin->pw != $request->input('text')) {
            $admin->pw = $request->input('text');
            $admin->save();
        }






        // $admin=Admin::where("id",$id)->get();

        return redirect('admin/admin');
        // return redirect('/admin/admin');
    }

    /**
     * 改變資料的顯示狀態
     * 
     */
    public function display($id)
    {
        // $admin = Admin::find($id);
        // if ($admin->sh == 1) {
        //     $admin->sh = 0;
        //     $findDefault = Admin::where("sh", 0)->first();
        //     $findDefault->sh = 1;

        //     $admin->save();
        //     $findDefault->save();
        // } else {
        //     $admin->sh = 1;
        //     $findShow = Admin::where("sh", 1)->first();
        //     $findShow->sh = 0;

        //     $admin->save();
        //     $findShow->save();
        // }
        // $admin->save();
        // $admin->save();



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
        $admin = Admin::destroy($id);
    }
}
