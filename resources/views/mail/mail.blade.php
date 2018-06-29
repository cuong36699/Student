<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
</head>
<body>
	<h4 style="color: red" class="h4info">Thông tin sinh viên</h4>
	<hr>
	<br>
	<div class="form-group">
		<label>- Email Đăng ký:</label>
		{{ $email }}
	</div>
	<br>
	<div class="form-group">
		<label>- Tên sinh viên:</label>
		{{ $full_name }}
	</div>
	<br>
	<div class="form-group">
		<label>- Ngày sinh:</label>
		{{ $birthday }}
	</div>
	<br>
	<div class="form-group">
		<label>- Giới tính:</label>
		@if ($gender == 1)
			Nam
		@else 
	      	Nữ
		@endif
	</div>
	<br>
	<div class="form-group">
		<label>- Số điện thoại:</label>
		{{ $phone }}
	</div>
	<br>
	<div class="form-group">
		<label>- Dân tộc:</label>
		{{ $nation }}
	</div>
	<br>
	<div class="form-group">
		<label>- Số chứng Minh:</label>
		{{ $identity }}
	</div>
	<hr>
	<h4 style="color: red" class="h4info">Thông tin đăng nhập trang sinh viên</h4>
	<br>
	<div class="form-group">
		<label>- Tài khoản:</label>
		{{ $email }}
	</div>
	<br>
	<div class="form-group">
		<label>- Mật khẩu:</label>
		{{ $identity }}
	</div>
	<a href="{{ route('student.index') }}" title="">Tới Trang Sinh viên</a>
</body>
</html>