{{-- neu vao wed thong qua id hay user nao se~ bao user hay admin --}}
@if (Auth::guard('web')->check())
  <p style="color: green">
    You are Logged In as a <strong>USER</strong>
  </p>
@else
  <p style="color: red">
    You are Logged Out as a <strong>USER</strong>
  </p>
@endif

@if (Auth::guard('admin')->check())
  <p style="color: green">
    You are Logged In as a <strong>ADMIN</strong>
  </p>
@else
  <p style="color: red">
    You are Logged Out as a <strong>ADMIN</strong>
  </p>
@endif
