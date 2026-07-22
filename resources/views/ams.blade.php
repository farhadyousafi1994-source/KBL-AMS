@extends('layout.master')

section('content')
 
<div class="x_title">
<div align="center">
  <table width="100%"  border="0">
 
    <td valign="top"><div align="right"> <img src="images\gov.jpg" width="120" height="120" border="0"></a></div></td>
         <td align="center"   dir="rtl"><span class="style1">جمهــــوری اســـــــــلامی افغانســـــــتان</br>
د افغانســــتان برښنا شــــرکت</br>
ریاست مالی اداری </br>
مدیریت عمومی محاسبه جنسی </br>
مدیریت عمومی جایدادها</br> 
</span></td>
    <td valign="top"><div align="left"><a href="{{url('home')}}"><img src="images/logo.png" width="150" height="120" border="0"></a></div></td>
  
  </tr>
  <tr align="center">

  </tr>

</table>
  <hr>

</div>
<h2>  راپور ها   </h2>
  
  <ul class="nav navbar-right panel_toolbox">
    
       
  </ul>
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
           <p>{{\Session::get('success')}}</p>
           </div>
           @endif

           
                        <table id="datatable-buttons" class="table table-striped table-bordered 13 col-sm-13 col-xs-13">
                        <thead>
              <tr>
              
  <th>  اسم</th>
 <th> ایمیل  </th>
 
<th> نوعیت صلاحیت</th>
<th>   زمان ایجاد حسال</th>
 
<th>تعدیلات</th>
 
</tr>
                </thead>
                <tbody> 
                    
                @foreach($info as $dabs) 
               
                <tr>
                  <td>{{$dabs->name}}</td>
                  <td>{{$dabs->email}}</td>
                  <td>{{$dabs->type}}</td>
                  <td>{{$dabs->created_at}}</td>
                  <td>
     
                    
                </td>
               
      
                    </tr>
               
           
            
            <!--status-->
            
         
            <!--endstatus-->
            
            
            <!--addation-->
            
   
            <!--end addation-->
            
            
            
                                @endforeach
                         </tbody>
                            <tfoot>
                            <tr>
                            <th>  اسم</th>
 <th> ایمیل  </th>
 
<th> نوعیت صلاحیت</th>
<th>   زمان ایجاد حسال</th>

 
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
            
              

</!--endcontent-->
 </div>
        </div>
    </div>
</div>
</div>
@endsection
