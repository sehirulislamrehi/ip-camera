@extends("backend.template.layout")

@section('per_page_css')
<link href="{{ asset('backend/css/video-js.css') }}" rel="stylesheet">
<style>
    .small-box .inner h3 {
        font-size: 18px;
    }
    .vjs-default-skin{
        width: 100%;
        height: 300px;
    }
</style>
@endsection

@section('body-content')
<div class="br-mainpanel">
    <div class="br-pagetitle">
    </div>

    <div class="br-pagebody">
        <div class="row row-sm">

            <!-- item card start -->
            <div class="col-sm-6 col-xl-3">
                <div class="rounded overflow-hidden" style="background: #127383">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <div class="mg-l-20">
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">1</p>
                            <span class="tx-11 tx-roboto tx-white-8">Total Order</span>
                        </div>
                    </div>
                    <div id="ch1" class="ht-50 tr-y-1"></div>
                </div>
            </div>
            <!-- item card end -->

            <!-- item card start -->
            <div class="col-sm-6 col-xl-3">
                <div class="rounded overflow-hidden" style="background: #6c6c6c">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <div class="mg-l-20">
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">1</p>
                            <span class="tx-11 tx-roboto tx-white-8">Todays Order Collection</span>
                        </div>
                    </div>
                    <div id="ch2" class="ht-50 tr-y-1"></div>
                </div>
            </div>
            <!-- item card end -->

            <!-- item card start -->
            <div class="col-sm-6 col-xl-3">
                <div class="rounded overflow-hidden" style="background: #703146">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <div class="mg-l-20">
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">1</p>
                            <span class="tx-11 tx-roboto tx-white-8">Todays Order Delivery</span>
                        </div>
                    </div>
                    <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
            </div>
            <!-- item card end -->

            <!-- item card start -->
            <div class="col-sm-6 col-xl-3">
                <div class="rounded overflow-hidden" style="background: #4f52a7">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <div class="mg-l-20">
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">1</p>
                            <span class="tx-11 tx-roboto tx-white-8">Total Earning</span>
                        </div>
                    </div>
                    <div id="ch4" class="ht-50 tr-y-1"></div>
                </div>
            </div>
            <!-- item card end -->

        </div>

        <div class="row row-sm charts mt-5">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <video-js id="my_video_1" class="vjs-default-skin" controls preload="auto" width="640" height="268">
                            <source src="http://127.0.0.1:8000/videos/172.17.107.24/stream.m3u8" type="application/x-mpegURL">
                        </video-js>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <video-js id="my_video_2" class="vjs-default-skin" controls preload="auto" >
                            <source src="http://127.0.0.1:8000/videos/172.17.107.25/stream.m3u8" type="application/x-mpegURL">
                        </video-js>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <video-js id="my_video_3" class="vjs-default-skin" controls preload="auto" >
                            <source src="http://127.0.0.1:8000/videos/172.17.140.91/stream.m3u8" type="application/x-mpegURL">
                        </video-js>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section("per_page_js")
<script src="{{ asset('backend/js/video.js') }}"></script>
<script src="{{ asset('backend/js/videojs-http-streaming.js') }}"></script>
<script>
    var player_1 = videojs('my_video_1');
    var player_2 = videojs('my_video_2');
    var player_2 = videojs('my_video_3');
</script>
@endsection