<!-- Vertically centered modal -->
<!-- <div class="modal-dialog modal-dialog-centered">
    ...
</div> -->

<!-- Vertically centered scrollable modal -->
<!-- <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    ...
</div> -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="baseModal" tabindex="-1" aria-labelledby="ModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="w-100">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalCenter">{{ $modal_header }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @isset($method)
                    @method($method)

                    @endisset
                    <table class="m-auto">
                        @isset($modal_body)
                        @foreach($modal_body as $row)
                        <tr>
                            <td class="text-right"> {{$row['label']}} </td>
                            <td>
                                @switch($row['tag'])
                                @case('input')
                                @include("layouts.input",$row)
                                @break

                                @case('embed')
                                @include('layouts.embed',$row)
                                @break

                                @case('textarea')
                                @include('layouts.textarea',$row)
                                @break

                                @case('img')
                                @include('layouts.img',$row)

                                @break
                                @endswitch
                            </td>
                        </tr>

                        @endforeach
                        @endisset
                        <!-- <tr>
                        <td>標題區圖片</td>
                        <td>@include('layouts.input',['type'=>'file','name'=>'img'])</td>
                    </tr>
                    <tr>
                        <td>標題區替代文字</td>
                        <td><input type="text" name="" id=""></td>
                    </tr> -->
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">重置</button>
                    <button type="submit" class="btn btn-primary">儲存</button>
                </div>
            </div>
        </form>
    </div>
</div>