@extends('home')


@section('center')
  {{-- 登入區塊 --}}
  @if(!empty(session('error')))
    <div class="alert alert-danger w-50 m-auto">{{session('error')}}</div>

    {{-- <script>
      alert("帳號或密碼錯誤");
    </script> --}}
  @endif
 <form action="/login" method="post">
  @csrf
   <p class="text-center my-3">帳號：<input class="border-bottom py-2" type="text" name="acc" id=""></p>
   <p class="text-center my-3">密碼：<input class="border-bottom py-2" type="text" name="pw" id=""></p>
   <p class="text-center my-3">
     <input type="submit" value="登入" class="btn btn-primary">
     <input type="reset" value="重置" class="btn btn-warning">
    </p>
 </form> 

@endsection
