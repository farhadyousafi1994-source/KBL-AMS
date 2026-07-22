<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                         
                        <ul class="nav side-menu">
                                @if(Auth::user()->type != 'user'  )
                            <li><a href="{{url('home')}}"><i class="fa fa-home"></i> صفحه اصلی   </a>
                   
                            
                         
                  
                           

                              <li><a href="{{url('employee')}}"><i class="fa fa-user-plus"></i>          ثبت کارمند</a> 
                            <li><a href="{{url('stock')}}"><i class="fa fa-laptop"></i>   ثبت جنس</a>
                            <li><a href="{{url('unasset')}}"><i class="fa fa-table"></i>     لست ذمت </a>
                                 <li><a href="{{url('jointb')}}"><i class="fa fa-table"></i>           ثبت ذمت </a>   
                              
                              
                            @if(Auth::user()->type != 'user' & Auth::user()->type!='admin'  )
                           <li><a  href="{{url('auth.userprofile')}}"   > <i class="fa fa-users"></i>       مدیریت کاربران      </a>
                               @endif
                           @elseif(Auth::user()->type == 'user')
                            </li>
                             <li><a href="{{url('unasset')}}"><i class="fa fa-table"></i>     لست ذمت </a>
                                 
                            </li>
                         @endif
                           
                        </ul>
                    </div>
                   

                </div>