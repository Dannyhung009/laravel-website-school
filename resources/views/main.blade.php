@extends('home')


@section('center')
  {{-- 中間區塊 --}}
  <div class="mvims" style="height: 265px;">
    {{-- 動畫 --}}
    <div class="mv text-center" v-for="mv in mvims" v-show="mv.show">
      <img v-bind:src="mv.img" alt="" class="mx-auto">
    </div>




    {{-- 舊版 --}}
    {{-- @foreach ($mvims as $mv)
        <div class="mv text-center">
            <img src="{{ asset('storage/'.$mv->img) }}" alt="">
        </div>
    @endforeach --}}
  </div>
  <div class="news" style="height: 265px;">
    {{-- 新聞 --}}
    <div class="text-center py-2 border-bottom my-1">最新消息
      @isset($more)
      <a class="float-right" href="{{ $more }}">More...</a>
      @endisset


    </div>
    <ul class="list-group" style="position: relative" >

      <li class="list-group-item list-group-item-action p-1 new" style="position:unset" v-for="news in newss"
      @mouseover="news.show=true" @mouseleave="news.show=false">
        @{{ news.short }}
        <div
          style="border:1px solid orange;box-shadow:1px 1px 5px #ccc;background:yellow;
                    width:75%;position: absolute;top:0;right:0;
                    font-size:87%;padding:10px" v-show="news.show" v-html="news.text">
                    
        </div>
      </li>

    </ul>


  </div>
@endsection
