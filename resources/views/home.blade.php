@extends("layouts.layout")

@section('main')
  <!-- 寫主內容 -->
  <div class="menu col-md-3">
    <div class="text-center py-2 border-bottom my-1">主選單區 @{{ hello }}</div>

    {{-- @isset($menus)
      <ul class="list-group">
        @foreach ($menus as $menu)
          <li class="list-group-item list-group-item-action py-1 bg-warning position-relative menu">
            <a href="{{ $menu->href }}">{{ $menu->text }}</a>
            @isset($menu->subs)
              <ul class="list-group position-absolute w-75 subs" style="z-index:99;display: none;left:100px;top:25px">
                @foreach ($menu->subs as $sub)
                  <li class="lis-gruop-item list-group-item-action bg-success py-1">
                    <a style="color: white" href="{{ $sub->href }}">{{ $sub->text }} </a>
                  </li>
                @endforeach

              </ul>
            @endisset

          </li>
        @endforeach
      </ul>
    @endisset --}}

    <ul class="list-group">
      <li class="list-group-item list-group-item-action py-1 bg-warning position-relative
       menu"
        v-for="menu in menus" @mouseover='menu.show=true' @mouseleave='menu.show=false'>
        <a v-bind:href="menu.href">@{{ menu.text }}</a>
        <ul class="list-group position-absolute w-75" style="z-index:99;display: none;left:100px;top:25px"
          v-if="menu.subs.length>0" v-show="menu.show">
          <li class="lis-gruop-item list-group-item-action bg-success py-1" v-for="sub in menu.subs">
            <a style="color: white" v-bind:href="sub.href">@{{ sub.text }}</a>
          </li>
        </ul>

      </li>
    </ul>


    <div class="viewer">
      進站總人數：@{{ total }}
    </div>
  </div>


  <div class="main col-md-6">
    @isset($ads)
      <marquee behavior="" direction="">@{{ adstr }}</marquee>
      {{-- <marquee behavior="" direction="">{{$ads}}</marquee> --}}
    @endisset
    @yield('center')
    {{-- 中間區塊 --}}
  </div>


  <div class="right col-md-3">
    @auth
      <a href="/admin" class="button btn btn-success py-3 w-100 my-2">返回管理({{ $user->acc }})</a>
    @endauth
    @guest
      <a href="/login" class="button btn btn-primary py-3 w-100 my-2">管理登入</a>
    @endguest
    <div class="text-center py-2 border-bottom my-1 ">校園映像區</div>
    <div class="up" @click="switchImg('up')"></div>

    <div class="img"  v-for="img in images" v-show="img.show"><img v-bind:src="img.img" alt=""></div>


    {{-- <div class="img" v-for="img in images"><img src="{{ asset('storage/' . $img->img) }}" alt=""></div> --}}

    {{-- @isset($images)
      @foreach ($images as $img)
        <div class="img"><img src="{{ $img->img }}" alt=""></div>
      @endforeach
    @endisset --}}

        {{-- @isset($images)
      @foreach ($images as $img)
        <div class="img"><img src="{{ asset('storage/' . $img->img) }}" alt=""></div>
      @endforeach
    @endisset --}}


    <div class="down" @click="switchImg('down')"></div>
  </div>
@endsection

@section('script')
  <!-- 寫js -->

  <script>
    const app = {
      data() {
        const hello = '哈囉';
        const adstr = '{{ $ads }}';
        const bottom = '{{ $bottom }}';
        const titleImg = "{{ asset('storage/' . $title->img) }}";
        const title = '{{ $title->text }}';
        const total = {{ $total }};
        // const menus='{!! $menus !!}';
        const menus = JSON.parse('{!! $menus !!}');
        const images = JSON.parse('{!! $images !!}');
        
        const ip=0;
        const mvims=JSON.parse( '{!! $mvims !!}' );
        const newss=JSON.parse( '{!! $news !!}' );
        @isset($more)
        const more='{{ $more }}';
        @endisset




        return {
          hello,
          adstr,
          titleImg,
          title,
          bottom,
          total,
          menus,
          images,
          ip,
          mvims,
          newss,
          @isset($more)
          more 
          @endisset,
        }
      },
      methods:{
        switchImg(type){
          switch(type){
            case 'up':
              this.ip=(this.ip>0)?--this.ip:this.ip;

            break;
            case 'down':
              this.ip=(this.ip<this.images.length-3)?++this.ip:this.ip;

            break;
          }

          this.images.map((img,idx)=>{
            if(idx>=this.ip && idx<=this.ip+2){
              img.show=true;
            }else{
              img.show=false;
            }
            return img;
          })


        }

      },
      mounted() {
        let m=1;
        setInterval(() => {
          this.mvims.map((mv,idx) =>{
            mv.show=(idx==m)?true:false
            return mv

            // if(idx==m){
            //   mv.show=true
            // }else{
            //   mv.show=false
            // }
            // return mv

          })
          m=(m+1)%this.mvims.length



          //初學者版
          // if(m>=4){
          //   m=0
          // }else{
          //   m++
          // }
          
        }, 3000);
      },


      //啟動按一下up
      // mounted(){
      //   this.switchImg('up')
      // }

    }

    Vue.createApp(app).mount('#app')

    //jquery程式碼區塊
    /* $(".menu").hover(
      function() {
        $(this).children('.subs').show();
      },
      function() {
        $(this).children('.subs').hide();

      }
    )

    圖片顯示功能
    let num = $(".img").length;
    let p = 0;

    $(".img").each((idx, dom) => {


      if (idx < 3) {
        $(dom).show()
      }
    })

    圖片上移下移  
    $(".up,.down").on("click", function() {
      $(".img").hide();
      // console.log($(this));

      switch ($(this).attr('class')) {
        case 'up':
          p = (p > 0) ? --p : p;
          break;
        case 'down':
          p = (p < num - 3) ? ++p : p;
          break;

      }

      $(".img").each((idx, dom) => {
        if (idx >= p && idx <= p + 2) {
          $(dom).show()
        }
      })

    })

    $(".mv").eq(0).show()
    let mvNum = $(".mv").length;
    let now = 0;
    setInterval(() => {
      $(".mv").hide();
      ++now;
      $(".mv").eq(now % mvNum).show();


    }, 3000);


    $(".new").hover(
      function() {
        $(this).children('div').show()


      },
      function() {
        $(this).children('div').hide()
      }
    ) */

  </script>
@endsection
