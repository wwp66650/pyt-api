@extends('web.layouts.com')

@section('title')
    限时抢购
    @stop

    @section('css')
    <link rel="stylesheet" href="/web/css/reset.css"/>

    <link rel="stylesheet" href="/web/css/flash_sale.css"/>
@stop


@section('main')
    <div class="container-fluid">
        @include('web.layouts.header')
                <!--搜索导航栏-->
        @include('web.layouts.search')
                <!--导航-->
        @include('web.layouts.navigation')
                <!--主题部分-->
        <seation class="pyt-seation container-fluid">
            <div class="row  container">
                @if(!empty($list))
                <!-- 中心内容-->
                <!--时间点-->
                <p class="left_arr">
                    <span class="glyphicon glyphicon-menu-left prev" aria-hidden="true"></span>
                </p>
                <lable class="col-sm-12 items" style="overflow: hidden; position: relative; visibility: visible; width: 100%; height: 40px;">
                    <ul class="rush_point scroll_demo" style="position: absolute; left: 0px;">
                        @foreach($time_step as $v)
                            <a href="{{url('/miaosha/goods').'?active_time='.$v['active_time']}}">
                                <li class="@if($v['active_time']==$active['active_time']) time_active @endif">
                                    <p>{{$v['active_time']}}</p>
                                    <p>{{$v['status']}}</p>
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </lable>
                <p class="right_arr">
                    <span class="glyphicon glyphicon-menu-right next" aria-hidden="true"></span>
                </p>
                @foreach($list as $key=>$val)
                    <lable class="col-sm-5">
                        <div class="img_left">
                            <a href="{{url('/goods/'. $val['id']).'?columnCode='.$active['active_column_code']}} "
                               target="_blank" class="click_open">
                                 <img src='/web/images/mrtp.jpg' data-img="{{$val['pic']}}.jpg" class="img_size lazy">
                            </a>
                        </div>
                        <div class="text_right">
                            <a href="{{url('/goods/'. $val['id']).'?columnCode='.$active['active_column_code']}} "
                               target="_blank" class="click_open">
                                <p class="title"> {{str_limit($val['short_title'], $limit = 39, $end = '...')}}</p>
                                <p class="full_name">{{str_limit($val['des'], $limit = 120, $end = '...')}}</p>
                            </a>
                             <p class="discount"><span class="coupun">券</span><span class='prc_pyt'>{{ $val['coupon_price']}}元</span></p>
                             <div class="pyt_price">
                               <p class="floor_price">
                                    <span class="floor_price_title">券后价</span>
                                    <span class="price ">￥{{ $val['price']}}</span>
                               </p>
                               <p class="floor_price floor_price_right ">
                                   <span class="floor_price_earnings">预计收益</span>
                                   <span class="price prices_right">￥{{ $val['commission_finally']}}</span>
                               </p>
                           </div>
                            <p class="quick">
                                <p class='replace'>
                                 <span class="sale_num">{{ $val['sell_num']}}</span>已售
                                </p>
                                <a href="{{url('/goods/'. $val['id']).'?columnCode='.$active['active_column_code']}}" target="_blank" class="click_open">
                                    <button class="sale_quick">马上推</button>
                                </a>
                            </p>
                        </div>
                    </lable>
                    @endforeach
                    @else
                    <!--时间点-->
                    <p class="left_arr">
                        <span class="glyphicon glyphicon-menu-left prev" aria-hidden="true"></span>
                    </p>
                    <lable class="col-sm-12 items" style="overflow: hidden; position: relative; visibility: visible; width: 100%; height: 40px;">
                        <ul class="rush_point scroll_demo" style="position: absolute; left: 0px;">
                            @foreach($time_step as $v)
                                <a href="{{url('/miaosha/goods').'?active_time='.$v['active_time']}}">
                                    <li class="">
                                        <p>{{$v['time']}}</p>
                                        <p>{{$v['status']}}</p>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </lable>
                    <p class="right_arr">
                        <span class="glyphicon glyphicon-menu-right next" aria-hidden="true"></span>
                    </p>
                    <div class="kong"><img src="/web/images/kong.png"></div>
                    @endif
            </div>
        </seation>
        <div class="clear"></div>
        <!--页脚-->
        @include('web.layouts.footer')
    </div>
@stop
@section('js')
    <script src="/js/imgLazy.js"></script>
    <script src="/web/js/zhengdianmiaosha.js"></script>
@stop
