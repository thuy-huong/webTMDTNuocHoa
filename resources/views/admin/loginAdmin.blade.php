<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('public/back_end/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('public/back_end/css/layout_login.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <title>Đăng nhập trang quản lý admin</title>
</head>

<body>
    <div id="wrapper">
        <form action="{{URL::to('/admin_dashboard')}}" id="form-login" method="POST">
            <h1 class="form-heading">Đăng nhập admin</h1>
            <?php
            
            $message = session()->get('message');
            if($message){
                echo '<span class="text-alert" color="red">'.$message.'</span>' ;
                session()->put('message', null);
            }
        ?> 
            {{ csrf_field() }}
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" name="admin_email" placeholder="Email đăng nhập" >
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" name="matkhau" placeholder="Mật khẩu" >
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
        </form>
    </div>
    
</body>
<script>
    Morris.Bar({
      element: 'chart',
      data: [
        { date: '04-02-2014', value: 3 },
        { date: '04-03-2014', value: 10 },
        { date: '04-04-2014', value: 5 },
        { date: '04-05-2014', value: 17 },
        { date: '04-06-2014', value: 6 }
      ],
      xkey: 'date',
      ykeys: ['value'],
      labels: ['Orders']
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{asset('public/back_end/js/app.js')}}"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
</html>