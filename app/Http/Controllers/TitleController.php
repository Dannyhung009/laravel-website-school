<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all = Title::all();
        // dd($all);
        return view('backend.module', ['header' => '網站標題管理', 'module' => 'Title', 'rows' => $all]);
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
            'action' => "/admin/title",
            'modal_header' => "新增網站標題",
            'modal_body' => [
                [
                    'label' => '標題區圖片',
                    'tag' => 'input',
                    'type' => 'file',
                    'name' => 'img'
                ],
                [
                    'label' => '標題區替代文字',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'text'
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
            $title = new Title;
            $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

            $title->img = $request->file('img')->getClientOriginalName();
            $title->text = $request->input('text');
            $title->save();
        }
        return redirect('/admin/title');

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
        $title = Title::find($id);
        $view = [
            'action' => '/admin/title/'.$id,
            'method'=>'PATCH',
            'modal_header' => "編輯網站標題資料",
            'modal_body' => [
                [
                    'label' => '目前標題圖片',
                    'tag' => 'img',
                    'src' => $title->img,
                    'style' => 'width:300px;height:30px'
                ],
                [
                    'label' => '更換標題區圖片',
                    'tag' => 'input',
                    'type' => 'file',
                    'name' => 'img'
                ],
                [
                    'label' => '標題區替代文字',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'text',
                    'value' => $title->text
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
        $title=Title::find($id);
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            
            $request->file('img')->storeAs('public', $request->file('img')->getClientOriginalName());

            $title->img = $request->file('img')->getClientOriginalName();
            

        }

        if($title->text!=$request->input('text')){
            $title->text = $request->input('text');
        }




        
        $title->save();    
        // $title=Title::where("id",$id)->get();

        return redirect('admin/title');
        // return redirect('/admin/title');
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
        Title::destroy($id);

    }
}
