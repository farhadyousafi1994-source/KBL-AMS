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
  <h2  >سیستم ثبت ذمت کارمندان
  </h2>
 
  <div class="clearfix"></div>
</div>
<!--start content here-->




    @if(count($errors)>0)
           
                </div class="alert alert-danger">
              <ul>
                  @foreach($errors->all() as  $error)

           <li>{{$error}}</li>
           @endforeach
           </ul>
                </div>
                @endif
           @if(\Session::has('success')) 
           <div class="alert alert-success" >
           <p>{{\Session::get('success')}}</p><script> setInterval(function() {
                    location.reload(true);
                },3000);</script>
           
           </div>
           @endif
           @if(Auth::user()->type != 'user') 
           <button type="button" class="fa fa-plus-square  fa-hover   btn btn-success" data-skin="light"  data-toggle="modal" data-target="#exampleModal" title="   جهت وارد نمودن ذمت جدید فشار دهید  !">
              جنس جدید
           </button>
           @endif
                        <table id="datatable-buttons" class="table table-striped table-bordered 13 col-sm-13 col-xs-13">
                        <thead>
              <tr>
              
  <th> شماره</th>
 <th>اسم معتمد </th>

 <th>اسم جنس</th>
<th> دیپارتمنت  </th>
<th> تفصیلات</th>
<th> تعداد </th>
 <th> قیمت</th>
<th>   تاریخ ورد</th>
 
<th>  حالت</th>
 
<th>تعدیلات</th>
 
 
 
</tr>
                </thead>
                <tbody> 
                    
                @foreach($info as $dabs) 
               
                <tr>
                  <td>{{$dabs->id}}</td>
                  <td>{{$dabs->account_pay}}</td>

                  <td>{{$dabs->item_name}}</td>
                  <td>{{$dabs->item_dep}}</td>
                  <td>{{$dabs->item_detail}}</td>
                  <td>{{$dabs->item_quantity}}</td>
                  <td>{{$dabs->item_cost}}</td>
                  <td>{{$dabs->import_date}}</td>
                  
               
                  <td>
                  @if(Auth::user()->type == 'admin')
                  @if($dabs->status == 0)
                  
                  <a href="" class="btn btn-danger btn-xm fa fa-lock" data-toggle="modal" data-target="#statusmodal{{$dabs->id}}" title=" جهت انتقال جنس در ذمت کارمند جدید فشار دهید! "> خروج</a>
                  
                  
                  @elseif($dabs->status == 1)
                    <a href="{{route('statuszero',$dabs->id)}}" class="btn btn-success btn-xm fa fa-unlock " onclick="return confirm ( 'میخواهید از ذمت  خروج نماید؟')"  title="جهت خروج نمودن جنس از ذمت {{$dabs->account_receive}} فشار دهید! " >  <i id="icon_lock" class=""></i> ثبت  </a>
                 
                  @endif
                  @elseif(Auth::user()->type == 'user')
                  @if($dabs->status == 0)
                  
                  <a   class="btn btn-danger btn-xm fa fa-lock" > خروج</a>
                  
                  
                  @elseif($dabs->status == 1)
                    <a  class="btn btn-success btn-xm fa fa-unlock ">   <i id="icon_lock" class=""></i>   ثبت</a>
                 
                  @endif
                  @endif
                    
                </td>
               
           <td>  
              @if(Auth::user()->type != 'user')  
           <a href="" class="btn btn-info btn-xs" data-toggle="modal"  onclick="return confirm ('  میخواهید تغیرات وارد نماید؟')"  data-target="#editmodal{{$dabs->id}}"><i class="fa fa-edit"></i></a> 
                     @endif
                    
                     <a href = "delete3/{{ $dabs->id }}" class="btn btn-danger btn-xs" data-toggle="modal" onclick="return confirm ('Are you sure to delete the data')"    ><i class="fa fa-trash"></i></a></td>
                   </tr>
               
   <div class="modal fade" id="editmodal{{$dabs->id}}" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ایجاد تغیرات </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('editinfo2',$dabs->id)}}" method="post">
         @csrf
       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
     
         
         
       
      <div class="modal-body">
     
   <div class="formgroup">
   <div class="col">
    <label for="date">تاریخ <span class="required">*</span> :</label>
     <input type="date" name="import_date"   class="form-control" placeholder="تاریخ "  value="{{ $dabs->import_date }}"  >
    </div>
   
   <div class="col">
    <label for="fullname">   نمبر هویت <span class="required">*</span> :</label>

     <input type="text" name="id"   class="form-control" placeholder="اسم "  value="{{ $dabs->id }}"  >
    </div>
    <div class="col">
    <label for="fullname"> تحویل دهنده   :</label>

     <input type="text" name="account_pay"   class="form-control" placeholder="اسم "  value="{{ $dabs->account_pay }}"  >
    </div>
    <div class="col">
    <label for="fullname">    اسم جنس     :</label>

    <input type="text" name=" item_name"   class="form-control"  placeholder="مقام" value="{{ $dabs->item_name }}" >
    </div>
    
    <div class="col">
    <label for="fullname">   نوع جنس <span class="required">*</span> :</label>

    <input type="text" name="item_dep"   class="form-control"  placeholder="مقام" value="{{ $dabs->item_dep }}" >
    </div>
   
    <div class="col">
    <label for="fullname">  مشخصات جنس <span class="required">*</span> :</label>

    <input type="text" name="item_detail"   class="form-control"  placeholder="دیپارتمنت "  value="{{ $dabs->item_detail }}" >
    </div>
 
    <div class="col">
    <label for="fullname"> تعداد    <span class="required">*</span> :</label>

    <input type="text" name="item_quantity"   class="form-control"  placeholder="تعدا  " value="{{ $dabs->item_quantity }}" >
    </div>
    <div class="col">
      <div class="col">
    <label for="fullname"> قیمت   <span class="required">*</span> :</label>

    <input type="text" name="item_cost"   class="form-control"  placeholder="تفصیلات" value="{{ $dabs->item_cost }}" >
    </div>
    <div class="col">
  
  <input type="text" name="status"   class="form-control" readonly="readonly"  placeholder="حالت " value="1">
  
</div>
     
 
    </div>

         </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" value = "Update addinfo">ثبت</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">نخیر</button>
       
      </div>
      </form>
    </div>
  </div>
</div>

<!--status-->

<div class="modal fade" id="statusmodal{{$dabs->id}}" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافه نمودن ذمت جدید</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{action('AddinfoController@store')}} " method="POST">
       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
       {{ csrf_field() }}
        
       
      <div class="modal-body" >
     
   <div class="row">
   <div class="col">
     <input type="date" name="file_date"   class="form-control" placeholder=" تاریخ "     >
    </div>
   
   <div class="col">
     <input type="text" name="emp_id"   class="form-control" placeholder="نمبر هویت تحویل گیرنده جدید "     >
    </div>
    <div class="col">
    <label for="fullname"> تحویل دهنده   :</label>
     <input type="text" name="account_pay"   class="form-control" placeholder="اسم "  readonly="readonly"   value="{{ $dabs->account_receive }}"  >
    </div>
    <div class="col">
    <input type="text" name="account_receive"   class="form-control"  placeholder="اسم تحویل گیرنده جدید "    >
    </div>
    <div class="col">
    <label for="fullname">   دیپارتمنت <span class="required">*</span> :</label>
    <input type="text" name="position"   class="form-control"  placeholder="دیپارتمنت تحویل گیرنده جدید "   >
    </div>
    <div class="col">
    <label for="fullname">نمبر سند <span class="required">*</span> :</label>
    <input type="text" name="file_type"   class="form-control"  placeholder="نمبر سند " readonly="readonly"   value="{{ $dabs->file_type }}" >
    </div>
    <div class="col">
    <label for="fullname"> تفصیلات   <span class="required">*</span> :</label>
    <input type="text" name="item"   class="form-control"  placeholder="تفصیلات"readonly="readonly"       value="{{ $dabs->item }}" >
    </div>
    <div class="col">
    <label for="fullname"> تعداد ورود  <span class="required">*</span> :</label>
    <input type="text" name="in_qty"   class="form-control"  placeholder="تعدا ورد"   readonly="readonly"   value="{{ $dabs->in_qty }}" >
    </div>
    <div class="col">
    <label for="fullname"> قیمت ورد   <span class="required">*</span> :</label>
    <input type="text" name="in_cost"   class="form-control"  placeholder="قیمت ورود"   readonly="readonly"    value="{{ $dabs->in_cost }}" >
    </div>
    <div class="col">
    <label for="fullname">   تعداد خروج <span class="required">*</span> :</label>
    <input type="text" name="out_qty"   class="form-control"  placeholder="تعداد خروج"   readonly="readonly"   value="{{ $dabs->out_qty }}" >
    </div>
    <div class="col">
    <label for="fullname">    قیمت خروج <span class="required">*</span> :</label>
    <input type="text" name="out_cost"   class="form-control"  placeholder="قیمت خروج"  readonly="readonly"    value="{{ $dabs->out_cost }}" >
    </div>
    <div class="col">
    <input type="text" name="status"   class="form-control"  placeholder="حالت "  readonly="readonly"  placeholder="حالت " value="1">
    </div>
 
    </div>

         </div>
      <div class="modal-footer"> 
        <button type="submit" class="btn btn-primary" value = "Update addinfo">ثبت</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">نخیر</button>
       
      </div>
      </form>
    </div>
  </div>
</div>
<!--endstatus-->


<!-- addation

<div class="modal fade" id="addationmodal{{$dabs->id}}" tabindex="0" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافه نمودن ذمت جدید</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{action('AddinfoController@store')}} " method="POST">
       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
       {{ csrf_field() }}
        
       
      <div class="modal-body" >
     
   <div class="row">
   <div class="col">
   
     <input type="date" name="file_date"   class="form-control" placeholder=" تاریخ  "     >
    </div>
   
   <div class="col">
    <label for="fullname">   نمبر هویت   :</label>
     <input type="text" name="emp_id"   class="form-control required" placeholder="نمبر هویت تحویل گیرنده جدید " readonly="readonly" value="{{ $dabs->emp_id }}"    >
    </div>
    <div class="col">
    <label for="fullname"> تحویل دهنده   :</label>
     <input type="text" name="account_pay"   class="form-control" placeholder="تحویل دهنده "        >
    </div>
    <div class="col">
    <label for="fullname"> تحویل گیرنده   :</label>
    
    <input type="text" name="account_receive"   class="form-control"  placeholder="اسم تحویل گیرنده جدید " readonly="readonly"  value="{{ $dabs->account_receive}}" >
    </div>
    <div class="col">
    <label for="position">    دیپارتمنت   :</label>
    <input type="text" name="position"   class="form-control"  placeholder="دیپارتمنت تحویل گیرنده جدید "  readonly="readonly"  value="{{ $dabs->position}}">
    </div>
    <div class="col">
  
    <input type="text" name="file_type"   class="form-control"  placeholder="نمبر سند "   >
    </div>
    <div class="col">
    
    <input type="text" name="item"   class="form-control"  placeholder="تفصیلات"  >
    </div>
    <div class="col">
    
    <input type="text" name="in_qty"   class="form-control"  placeholder="تعدا ورد"    >
    </div>
    <div class="col">
  
    <input type="text" name="in_cost"   class="form-control"  placeholder="قیمت ورود"     >
    </div>
    <div class="col">
    
    <input type="text" name="out_qty"   class="form-control"  placeholder="تعداد خروج"     >
    </div>
    <div class="col">
    
    <input type="text" name="out_cost"   class="form-control"  placeholder="قیمت خروج"    >
    </div>
    <div class="col">
    <input type="text" name="status"   class="form-control"  placeholder="حالت "  readonly="readonly"  placeholder="حالت " value="1">
    </div>
 
    </div>

         </div>
      <div class="modal-footer"> 
        <button type="submit" class="btn btn-primary" value = "Update addinfo">ثبت</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">نخیر</button>
       
      </div>
      </form>
    </div>
  </div>
</div> 
end addation-->



                   @endforeach
             </tbody>
                <tfoot>
                <tr>
 <th> شماره</th>
 <th>اسم معتمد </th>
 
 <th>اسم جنس</th>
 
<th> دیپارتمنت  </th>
<th> تفصیلات</th>
<th> تعداد </th>
 <th> قیمت</th>
<th>   تاریخ ورد</th>
 
<th>  حالت</th>
 
<th>تعدیلات</th>
</tr>
                </tfoot>
           </table> 
                    </div>
                </div>
            </div>
       </div>

 
    </div>
  </div>
</div>
 <!-- start add -->

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  >اضافه نمودن ذمت جدید</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <form action="{{action('StockController@store')}} " method="POST">
       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
       {{ csrf_field() }}
        
       
      <div class="modal-body">
 
   <div class="formgroup">
    
   <div class="col">
      
      <input type="date" name="import_date"   class="form-control" placeholder="  تاریخ ورد"  >
      </div>
   <div class="col">
      
    <input type="text" name="account_pay"   class="form-control" placeholder="  اسم  معتمد "  >
    </div>
      <div class="col">

      
    <input type="text" name="item_name"   class="form-control" placeholder="  اسم جنس "  >
    </div>
    <div class="col">
      
      <input type="text" name="item_dep"   class="form-control" placeholder="   دیپارتمنت "  >
      </div>
    <div class="col">  
    <input type="text" name="item_detail"   class="form-control"  placeholder="   تفصیلات" >
       
    </div>
    <div class="col">

    <input type="text" name="item_quantity"   class="form-control"  placeholder="تعداد" >
    </div>
    <div class="col">
  
    <input type="number" name="item_cost"   class="form-control"  placeholder="    قیمت" >
    
  </div>
 
 
 
 
 
<div class="col">
  
  <input type="text" name="status"   class="form-control" readonly="readonly"  placeholder="حالت " value="1">
  
</div>
  </div>

         </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" value = "Update student">ثبت</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">نخیر</button>
       
      </div>
      </form>
    </div>
  </div>
</div>
 <!--end add -->
 <!--end content-->
 @endsection