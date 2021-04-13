@if (Session::has('success'))
<div class="notification is-success"><i class="fas fa-check"></i> {{ Session::get('success') }}</div>
@endif
@if (Session::has('danger'))
<div class="notification is-danger"><i class="fas fa-exclamation-triangle"></i> {{ Session::get('danger') }}</div>
@endif
