@extends("layouts.layout")

@section("main")
<!-- 寫主內容 -->
<div class="menu col-md-3">
  <div class="text-center py-2 border-bottom my-1">主選單區</div>
  <ul class="list-group">
    <li class="list-group-item list-group-item-action py-1"><a href="">a</a> </li>
    <li class="list-group-item list-group-item-action py-1"><a href="">b</a> </li>
    <li class="list-group-item list-group-item-action py-1"><a href="">c</a> </li>
  </ul>
</div>
<div class="main col-md-6">
  @yield('center')
</div>
<div class="right col-md-3">校園映像</div>
@endsection

@section("script")
<!-- 寫js -->
@endsection