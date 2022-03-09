@extends("layouts.layout")

@section("main")
<!-- 寫主內容 -->
<div class="menu col-md-3">
    <!-- 選單 -->
    <div class="list-group text-center">
        <div class="border-bottom my-2 p-1 ">後台管理</div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/title"> 標題圖片管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/ad"> 動態文字廣告管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/image"> 校園映像圖片管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/mvim"> 動畫圖片管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/total"> 進站人數管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/bottom"> 頁尾版權管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/news"> 最新消息管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/admin"> 管理者帳號管理</a></div>
        <div class="list-group-item list-group-item-action px-0"><a class="d-block" href="/admin/menu"> 選單管理</a></div>

    </div>
    <div class="border text-center my-2">訪客人數:</div>
</div>
<div class="main col-md-9 p-0 d-flex flex-wrap align-items-start">
    <!-- 主內容區 -->

    <div class="col-8 border py-3 text-center">後台管理區</div>
    <button class="col-4 btn-light border py-3 text-center">管理登出</button>
    <div class="border w-100 p-1" style="height: 500px;">
        title
        {{ $header }}
    </div>
</div>
@endsection

@section("script")
<!-- 寫js -->
@endsection