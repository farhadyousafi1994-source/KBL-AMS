@extends('layout.master')

@section('content')
<div class="x_title">
<div align="center">
  <table width="100%"  border="0">
 
    <td valign="top"><div align="right"> <img src="images\logo1.png" width="170" height="150" border="0"></a></div></td>
         <td align="center"   dir="rtl"><span class="style1">امارت اســـــــــلامی افغانســـــــتان</br>
 وزارت تحصیلات عالی</br>
  ریاست پوهنتون کابل</br>

معاونیت مالی اداری </br>
       آمریت تکانالوژی معلوماتی </br>
 
</span></td>
<td valign="top"><div align="left"> <img src="images/logo.png" width="120" height="120" border="0"></a></div></td>

  </tr>
  <tr align="center">

  </tr>

</table>
  <hr>
   

</div>
  <h2  >سیتم ثبت ذمت کارمندان
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
                 ذمت جدید
           </button>
           @endif
                        <table id="datatable-buttons" class="table table-striped table-bordered 13 col-sm-13 col-xs-13">
                        <thead>
              <tr>
              
  <th> نمبر هویت</th>
 <th>تحویل دهنده</th>
 <th>تحویل گیرنده</th>
<th>دیپارتمنت</th>
<th>نمبر سند</th>
 <th>تفصیلات</th>
<th>مقدار ورود</th>
<th>قیمت ورود</th>
<th> مقدار خروج</th>
<th>قیمت خروج</th>
<th> تاریخ</th>
<th>   حالت </th>
 
<th>تعدیلات</th>
 
</tr>
                </thead>
                <tbody> 
                    
                @foreach($info as $dabs) 
               
                <tr>
                  <td>{{$dabs->emp_id}}</td>
                  <td>{{$dabs->item_name}}</td>
                  
                  <td>
                  @if(Auth::user()->type == 'admin')
                  @if($dabs->status == 0)
                  
                  <a href="" class="btn btn-danger btn-xm fa fa-lock" data-toggle="modal" data-target="#statusmodal{{$dabs->id}}" title=" جهت انتقال جنس در ذمت کارمند جدید فشار دهید! "> خروج</a>
                  
                  
                  @elseif($dabs->status == 1)
                    <a href="{{route('statuszero',$dabs->id)}}" class="btn btn-success btn-xm fa fa-unlock " onclick="return confirm ( 'میخواهید از ذمت  خروج نماید؟')"  title="جهت خروج نمودن جنس از ذمت {{$dabs->emp_name}} فشار دهید! " >  <i id="icon_lock" class=""></i>در ذمت</a>
                 
                  @endif
                  @elseif(Auth::user()->type == 'user')
                  @if($dabs->status == 0)
                  
                  <a   class="btn btn-danger btn-xm fa fa-lock" > خروج</a>
                  
                  
                  @elseif($dabs->status == 1)
                    <a  class="btn btn-success btn-xm fa fa-unlock ">   <i id="icon_lock" class=""></i>در ذمت</a>
                 
                  @endif
                  @endif
                    
                </td>
               
           <td>  
              @if(Auth::user()->type != 'user')  
           <a href="" class="btn btn-info btn-xs" data-toggle="modal"  onclick="return confirm ('  میخواهید تغیرات وارد نماید؟')"  data-target="#editmodal{{$dabs->id}}"><i class="fa fa-edit"></i></a> 
                    |<a href="" class="fa fa-plus-square  fa-hover   btn btn-success btn-xs" data-toggle="modal" title="جهت اضافه نمودن جنس در ذمت {{$dabs->emp_name}}  فشار دهید!"    data-target="#addationmodal{{$dabs->id}}"> </a> 
                     @endif
                    
                    <a href = "delete/{{ $dabs->id }}" class="btn btn-danger btn-xs" data-toggle="modal" onclick="return confirm ('Are you sure to delete the data')"    ><i class="fa fa-trash"></i></a></td>
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
      <form action="{{route('editinfo',$dabs->id)}}" method="post">
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

     <input type="text" name="emp_id"   class="form-control" placeholder="اسم "  value="{{ $dabs->emp_id }}"  >
    </div>
    <div class="col">
    <label for="fullname"> تحویل دهنده   :</label>

     <input type="text" name="item_dep"   class="form-control" placeholder="اسم "  value="{{ $dabs->item_dep }}"  >
    </div>
    <div class="col">
    <label for="fullname"> تحویل گیرنده     :</label>

    <input type="text" name="emp_name"   class="form-control"  placeholder="مقام" value="{{ $dabs->emp_name }}" >
    </div>
    
    <div class="col">
    <label for="fullname">   دیپارتمنت <span class="required">*</span> :</label>

    <input type="text" name="item_dep"   class="form-control"  placeholder="مقام" value="{{ $dabs->item_dep }}" >
    </div>
   
    <div class="col">
    <label for="fullname">نمبر سند <span class="required">*</span> :</label>

    <input type="text" name="file"   class="form-control"  placeholder="دیپارتمنت "  value="{{ $dabs->file }}" >
    </div>
    <div class="col">
    <label for="fullname"> تفصیلات   <span class="required">*</span> :</label>

    <input type="text" name="item_detail"   class="form-control"  placeholder="تفصیلات" value="{{ $dabs->item_detail }}" >
    </div>
    <div class="col">
    <label for="fullname"> تعداد ورود  <span class="required">*</span> :</label>

    <input type="text" name="item_quantity"   class="form-control"  placeholder="تعدا ورد" value="{{ $dabs->item_quantity }}" >
    </div>
    <div class="col">
    <label for="fullname"> قیمت ورد   <span class="required">*</span> :</label>

    <input type="text" name="item_cost"   class="form-control"  placeholder="قیمت ورود" value="{{ $dabs->item_cost }}" >
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
     <input type="date" name="import_date"   class="form-control" placeholder=" تاریخ "     >
    </div>
   
   <div class="col">
     <input type="text" name="emp_id"   class="form-control" placeholder="نمبر هویت تحویل گیرنده جدید "     >
    </div>
    <div class="col">
    <label for="fullname"> تحویل دهنده   :</label>
     <input type="text" name=""   class="form-control" placeholder="اسم "  readonly="readonly"   value=" "  >
    </div>
    <div class="col">
    <input type="text" name=" "   class="form-control"  placeholder="اسم تحویل گیرنده جدید "    >
    </div>
    <div class="col">
    <label for="fullname">   دیپارتمنت <span class="required">*</span> :</label>
    <input type="text" name="item_dep"   class="form-control"  placeholder="دیپارتمنت تحویل گیرنده جدید "   >
    </div>
    <div class="col">
    <label for="fullname">نمبر سند <span class="required">*</span> :</label>
    <input type="text" name="file"   class="form-control"  placeholder="نمبر سند " readonly="readonly"   value="{{ $dabs->file }}" >
    </div>
    <div class="col">
    <label for="fullname"> تفصیلات   <span class="required">*</span> :</label>
    <input type="text" name="item_detail"   class="form-control"  placeholder="تفصیلات"readonly="readonly"       value="{{ $dabs->item_detail }}" >
    </div>
    <div class="col">
    <label for="fullname"> تعداد ورود  <span class="required">*</span> :</label>
    <input type="text" name=" "   class="form-control"  placeholder="تعدا ورد"   readonly="readonly"    >
    </div>
    <div class="col">
    <label for="fullname"> قیمت ورد   <span class="required">*</span> :</label>
    <input type="text" name="item_cost"   class="form-control"  placeholder="قیمت ورود"   readonly="readonly"    value="{{ $dabs->item_cost }}" >
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


<!--addation-->

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
   
     <input type="date" name="import_date"   class="form-control" placeholder=" تاریخ  "     >
    </div>
   
   <div class="col">
    <label for="fullname">   نمبر هویت   :</label>
     <input type="text" name="emp_id"   class="form-control required" placeholder="نمبر هویت تحویل گیرنده جدید " readonly="readonly" value="{{ $dabs->emp_id }}"    >
    </div>
    <div class="col">
    <label for="fullname"> تحویل دهنده   :</label>
     <input type="text" name="emp_dep"   class="form-control" placeholder="تحویل دهنده "        >
    </div>
    <div class="col">
    <label for="fullname"> تحویل گیرنده   :</label>
    
    <input type="text" name="emp_name"   class="form-control"  placeholder="اسم تحویل گیرنده جدید " readonly="readonly"  value="{{ $dabs->emp_name}}" >
    </div>
    <div class="col">
    <label for="position">    دیپارتمنت   :</label>
    <input type="text" name="item_dep"   class="form-control"  placeholder="دیپارتمنت تحویل گیرنده جدید "  readonly="readonly"  value="{{ $dabs->item_dep}}">
    </div>
    <div class="col">
  
    <input type="text" name="file"   class="form-control"  placeholder="نمبر سند "   >
    </div>
    <div class="col">
    
    <input type="text" name="item_detail"   class="form-control"  placeholder="تفصیلات"  >
    </div>
    <div class="col">
    
    <input type="text" name="item_quantity"   class="form-control"  placeholder="تعدا ورد"    >
    </div>
    <div class="col">
  
    <input type="text" name="item_cost"   class="form-control"  placeholder="قیمت ورود"     >
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
<!--end addation-->



                    @endforeach
             </tbody>
                <tfoot>
                <tr>
 <th> نمبر هویت</th>
 <th>تحویل دهنده</th>
<th>تحویل گیرنده</th>
<th>دیپارتمنت</th>
<th>نمبر سند</th>
 <th>تفصیلات</th>
<th>مقدار ورود</th>
<th>قیمت ورود</th>
<th> مقدار خروج</th>
<th>قیمت خروج</th>
<th>  تاریخ</th>
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
 <!--start add -->

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  >اضافه نمودن ذمت جدید</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <form action="{{action('AddinfoController@store')}} " method="POST">
       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
       {{ csrf_field() }}
        
       
      <div class="modal-body">
 
   <div class="formgroup">
    
   <div class="col">
      
      <input type="date" name="import_date"   class="form-control" placeholder="  تاریخ "  >
      </div>
   <div class="col">
      
    <input type="text" name="emp_id"   class="form-control" placeholder=" نمبر هویت "  >
    </div>
    <div class="col">
      
      <input type="text" name="item_dep"   class="form-control" placeholder="تحویل دهنده "  >
      </div>
    <div class="col"> <label>تحویل گیرنده</label>
    <input type="text" name="emp_name"   class="form-control"  placeholder="تحویل گیرنده" >
       
    </div>
    <div class="col">

    <input type="text" name="item_dep"   class="form-control"  placeholder="دیپارتمنت" >
    </div>
    <div class="col">
  
    <input type="text" name="file"   class="form-control"  placeholder=" نوعیت سند" >
    
  </div>
  <div class="col">
  
  <input type="text" name="item_detail"   class="form-control"  placeholder="تفصیلات " >
  
</div>
<div class="col">
  
  <input type="text" name="item_quantity"   class="form-control"  placeholder="مقدار ورود " >
  
</div>
<div class="col">
  
  <input type="text" name="item_cost"   class="form-control"  placeholder=" قیمت ورود" >
  
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