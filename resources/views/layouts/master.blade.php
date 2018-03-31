<html>

<head>
    <title>update</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body >

@section('sidebar')
    <nav class="navbar navbar-default  navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">文件服务器</a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::user())
                        <li><a href="./login">登录</a></li>
                        <li><a href="./register">注册</a></li>
                    @else
                        <li><a href="./">主页 <span class="fa fa-briefcase"></span></a></li>
                        <li><a href="./myindex">个人中心 <span class="fa fa-briefcase"></span></a></li>
                        <li><a href="/order">我的订单 <span class="fa fa-briefcase"></span></a></li>
                        <li><a href="./auth/logout">退出 {{ Auth::user()->name}}</a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

@show




<div class="container">
    @yield('content')
</div>
</body >

</html>