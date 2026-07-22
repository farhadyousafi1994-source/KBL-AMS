<!DOCTYPE html>
<html lang="fa">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ورود به سیستم ذمت کارمندان</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
  </head>

<body class="login" style="background-image: url('{{ asset('images/itck.png') }}'); background-size: cover; background-repeat: no-repeat;">

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <a class="hiddenanchor" id="reset"></a>

      <div class="login_wrapper">
        <div class="animate form login_form"><br><br><br><br><br>
          <section class="login_content">
          <form method="POST" action="{{ route('register') }}">
          {{ csrf_field() }}
               <h1 > ایجاد حساب</h1>
                            <div>
                                <input id="name" type="text" placeholder="اسم" class="form-control " name="name" value="" required autocomplete="name" >

                                                            </div>
                           
                            <div>
                                <input id="email" type="email" placeholder="ایمیل" class="form-control " name="email" value="" required autocomplete="email">

                                                            </div>
                            <div>
                                <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password" placeholder="رمز ورود">

                                                            </div>
                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="رمز تان را برای اطمینان دوباره وارد نماید! ">
                            </div>
                            <div class="text-center">
                    <input type="submit" value="ایجاد" class="form-control btn btn-info" style="width:50%;">
                            </div>

              <div class="clearfix"> </div>

              <div class="separator">
                <p class="change_link"  style="color:blueviolet;">در حال حاضر عضو هستید؟
                  <a href="login" class="to_register"  style="color:blue;">ورود</a>
                </p>

                <div class="clearfix"> </div>
                <br />

                <div>
                    <br>
 <br>
  <tr>
    <br>    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
 
    <br>
    <br><br>
  
    <br>
    <br><td height="35" align="center" valign="middle" style="color:black;">
    
All Rights Reserved | KCIT<br>
Developed by Farhad Yousafi <br> 
     
 </span></td></td>
  
  </tr>
</table>
                </div>
              </div>
            </form>
          </section>
        </div>
        
        
      </div>
    </div>
  </body>
</html>
