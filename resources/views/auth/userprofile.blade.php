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
      <div id="success" class="alert alert-success" >
      <p>{{\Session::get('success')}}</p>
        <script> setInterval(function() {
                    location.reload(true);
                },3000);</script>
      </div>
      @endif
      @if(Auth::user()->type !='user' ) 
    
       
      @endif

<div class="x_content">
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
           @if(Auth::user()->type != 'user') 
           <button type="button" class="fa fa-plus-square  fa-hover   btn btn-success" data-skin="light"  data-toggle="modal" data-target="#exampleModal" title="   جهت وارد نمودن ذمت جدید فشار دهید  !">
                 کارمند جدید
           </button>
           @endif
                        <p class="text-muted font-13 m-b-30">
               
                        <table id="datatable-fixed-header" class="table table-striped table-bordered">
                            <thead>
                            
                            <tr>
                <th style="width: 1%">#</th>

                            <th>   اسم کاربر  </th>
                             <th>   ایمیل  </th>
                             <th>   صلاحیت  </th>
                      
                            
                             <th> تغیر صلاحیت</th>
                           </tr>
                            </thead>


                            <tbody>
                        
                          <?php $count = 1;?>
                        
                            @foreach($info as $dabs) 
               
               <tr>
               <td>{{$count++}}</td>
               <td>{{$dabs->name}}</td>
               <td>{{$dabs->email}}</td>
               <td>{{$dabs->type}}</td>
            
             
             

                  
                  
           
                 

                    
          <td>  
             @if(Auth::user()->type != 'user')  
              <a href="" class="btn btn-info btn-xs" data-toggle="modal"  onclick="return confirm ('  میخواهید تغیرات وارد نماید؟')"  data-target="#editmodal{{$dabs->id}}"><i class="fa fa-edit"></i></a>    
             
                    @endif
                   
                    <a href = "delete5/{{ $dabs->id }}" class="btn btn-danger btn-xs" data-toggle="modal" onclick="return confirm ('Are you sure to delete the data')"    ><i class="fa fa-trash"></i></a>
                    </td> 
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
     <form action="{{route('edituser',$dabs->id)}}" method="post">
        @csrf
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    
        
        
      
     <div class="modal-body">
    
  <div class="formgroup">
  <div class="col">
   <label for="fullname">        صلاحیت فعلی  :</label>

   <input type="text" readonly="readonly" name="type"   class="form-control"    value="{{ $dabs->type }}" >
   </div>
   <div class="form-group">
   <label for="fullname">       تغیر صلاحیت    :</label>
                                <div  >
                                    <select name="type" class="form-control">
                                        <option value="super_admin">super_admin</option>
                                        <option value="admin">admin</option>
                                        <option value="user">user</option>
                                      
                                    </select>
                                </div>
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
 
 
 
 </div>
 
 
 </div>
 

 


                   @endforeach
                   <tfoot>
                   <tr>
                   <thead>
                   <tr>
                <th>#</th>

                <th>   اسم کاربر  </th>
                             <th>   ایمیل  </th>
                             <th>   صلاحیت  </th>
                      
                            
                                <th> تغیر صلاحیت</th>
                           </tr>
                </tfoot>
                            </tbody>
                        </table>
                    </div>
                 
 <!--start add -->

 
 <!--end add -->
           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  >اضافه نمودن ذمت جدید</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <form action="{{action('userprofile@store')}} " method="POST">
       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
       {{ csrf_field() }}
        
       
      <div class="modal-body">
 
   <div class="formgroup">
    
   <div class="col">
      
      <input type="text" name="name"   class="form-control" placeholder=" اسم "  >
      </div>
   <div class="col">
      
    <input type="text" name="email"   class="form-control" placeholder="    ایمل   "  >
    </div>
 
   <div class="col">
      
    <input type="text" name="password"   class="form-control" placeholder="   رمز عبور     "  >
    </div>
     <div class="form-group">
   <label for="fullname">       تعین صلاحیت    :</label>
                                <div  >
                                    <select name="type" class="form-control">
                                        <option value="super_admin">super_admin</option>
                                        <option value="admin">admin</option>
                                        <option value="user">user</option>
                                      
                                    </select>
                                </div>
                            </div>
  <div class="col">
 
 
 
 
 
 
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

 @endsection 
