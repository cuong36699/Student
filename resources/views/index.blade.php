<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responsive Sticky Navbar</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/viewcss.css') }}">
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>

  <div class="wrapper">
    <header>
      <nav>
        <div class="menu-icon">
          <i class="fa fa-bars fa-2x"></i>
      </div>
         <div id="MyClockDisplay" class="clock"></div>
      <div class="logo">
          Home
          <a id="menuToggle" class="menutoggle pull-left">
            <i>
              <img class="w3-spin" src="{{ asset('hinhanh/onlyhoa.png') }}"  width="42" height="42">   
          </i>
      </a> 
  </div>

  <div class="menu">
      <ul>
        <li><a target="_blank" href="http://donga.edu.vn/">Tin tức</a></li>
        <li><a target="_blank" href="http://thuvien.donga.edu.vn/view/index.php">Thư viện</a></li>
            @guest
            <li>
                <a href="{{ route('login') }}">
                    Đăng nhập
                </a>
            </li>
            @else
            <li>
            <div class="user-area dropdown float-right">
                <a href="{{ route('wed.index') }}">
                    {{ Auth::user()->name }} 
                     <img class="img-circle" src="{{ asset('hinhanh/'.Auth::user()->student->avatar) }}"  width="42" height="42"> 
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                         Đăng xuất
                </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
            </div>
        </li>
             @endguest
        
               
    </ul>
</div>
</nav>

</header>

<div class="content col-md-7">
    <p>
     Sinh viên truy cập ngày 2 lần để xem thông báo, thời khóa biểu học tập
 </p>
 <p>
    1. Sinh viên không được cho nguời khác mượn ID và Password để truy cập hệ thống
</p>
<p>
    2. Sinh viên không truy cập được có thể liên lạc Thầy Sơn theo email : sondm@donga.edu.vn hoặc trực tiếp tới phòng A408 để gặp thầy hoặc gọi theo SĐT: 0511.222.1124 - máy nhánh: 139.
</p>

<p>
    3. Sinh viên không thấy được lịch học tập có thể gọi theo SĐT: 0511.222.1124 - máy nhánh: 104 để gặp thầy/cô ở phòng Đào tạo để biết thông tin chi tiết.
</p>   
</div>
<div class="col-md-5">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3224.535008216497!2d108.21957545526897!3d16.032246482925647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218389cf02c2b%3A0xbdc63233587e2d88!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkMO0bmcgw4E!5e0!3m2!1svi!2s!4v1525291038798" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<footer class="footer">
    <div class="col-md-6">

      <b> © 2018, Sinh viên, Quản lý ngoại trú </b>
  </div>
  <div class="col-md-6">
      <b> <a href="#">Sinh viên ngoại trú</a> |  <a  href="">Web Design & Development by Cường</a></b>
  </div>
</footer>
</div>

<script type="text/javascript">

      // Menu-toggle button

      $(document).ready(function() {
        $(".menu-icon").on("click", function() {
          $("nav ul").toggleClass("showing");
      });
    });

      // Scrolling Effect

      $(window).on("scroll", function() {
        if($(window).scrollTop()) {
          $('nav').addClass('black');
      }

      else {
          $('nav').removeClass('black');
      }
  })


</script>
<script src="{{ url('js/dycalendar.js') }}"></script>
</body>
</html>