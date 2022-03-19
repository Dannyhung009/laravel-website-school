@extends("layouts.layout")

@section("main")
<!-- 寫主內容 -->
<div class="menu col-md-3">選單</div>
<div class="main col-md-6">
  @yield('center')
</div>
<div class="right col-md-3">校園映像</div>
@endsection

@section("script")
<!-- 寫js -->
@endsection