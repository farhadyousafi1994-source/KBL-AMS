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
  <h2>  راپور ها   </h2>
  
  <ul class="nav navbar-right panel_toolbox">
    
       
  </ul>
  <div class="clearfix"></div>
</div>

            <table   class="table table-striped table-bordered 13 col-sm-13 col-xs-13">
<thead>
    <th> مجموعه کارمندان  </th>
    <th> مجموعه تعداد اجناس  </th>
    <th> مجموعه کاربران  </th>
    <th> مجموعه مبلغ اجناس  </th>
          
           <tbody> <tr> 
                <td> {{$countemploy}}   </td>
                <td>  {{$item_quantity}}</td>
                <td>{{$usercount}}</td>
                <td>{{$item_cost}}</td>
              </tr>

        </tbody>
           
       
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
