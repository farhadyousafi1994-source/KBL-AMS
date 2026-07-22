@extends('layout.master')

@section('content')
<div class="x_title">
<div align="center">
        <table class="w-100 border-0"  width="100%"  border="0">
            <tr>
                <td align="right" valign="top">
                    <img src="{{ asset('images/logo.png') }}"  width="120" height="120">
                </td>
                <td align="center" dir="rtl">
                    <strong>
                        <div>امارت اسلامی افغانستان</div>
                        <div>وزارت تحصیلات عالی</div>
                        <div>ریاست پوهنتون کابل</div>
                        <div>معاونیت مالی اداری</div>
                        <div>آمریت تکنالوژی معلوماتی</div>
                    </strong>
                </td>
                <td align="left" valign="top">
                    <img src="{{ asset('images/gov.jpg') }}" width="120" height="120">
                </td>
            </tr>
        </table>
  <hr>

</div>
  <h2   ><a  href="{{url('report')}}"   >        راپور ها     </a>   </h2>
  
  <ul class="nav navbar-right panel_toolbox">
    
       
  </ul>
  <div class="clearfix"></div>
</div>

                    <div class="col-xs-13" role="main" allign="cente">
                    <div class="row tile_count">
      
    
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>  مجموع کارمندان  </span>
            <div class="count green">{{$countemploy}}</div>
     
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> مجموع  کاربران</span>
            <div class="count">{{$usercount}}</div>
 
        </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>  تعداد اجناس</span>
            <div class="count">{{$item_quantity}}</div>
 
 
        </div>
               <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-money"></i>     مجموع مبلغ اجناس</span>
            <div class="count">{{$item_cost}}</div>
 
 
        </div>
 
    </div>
    <!-- /top tiles -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
