
<!DOCTYPE html>
<html lang="fa">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dabs ams Login </title>

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
 

</style>
<body class="login" style="background-image: url('{{ asset('images/itck.png') }}'); background-size: cover; background-repeat: no-repeat;">

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <a class="hiddenanchor" id="reset"></a>

      <div class="login_wrapper" style="background-image:url(/public/images/itck.png);">
        <div class="animate form login_form"> <br> <br><br><br><br><br><br><br><br><br><br>
          <section class="login_content">
          <form method="POST" action="{{route('login')}}">
          {{ csrf_field() }}
        

                     <h1>ورود در سیستم  ذمت</h1>
              <div>
                <input type="text" name="email" class="form-control" placeholder="ایمیل" required="" />
                                              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="رمز ورود" required="" />
                              </div>
              <div>
                    <input type="submit" value="ورود به سیستم" class="form-control btn btn-info" style="width:50%;">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!-- <p class="change_link" style="color:blueviolet;">جدید در سایت؟
                  <a href="register" class="to_register"style="color:blue;"> راجستر </a>
                </p> -->

                <div class="clearfix"></div>
                <br />

                <div>
                 
                  <table width="95%" border="0" align="center" >
  <tr>
    <td height="35" align="center" valign="middle" style="color:black;"> <br>
    <br>
  <br>
 
    <br>
    <br><br>
    <br>
    <br>
    <br>
    <br><br>
    <br>
 
All Rights Reserved | KCIT<br>
Developed by Farhad Yousafi <br> <br>
 </span></td>
 
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
</html