@if (session('success'))
<div class="alert alert-success alert-block alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert" style="outline: none;">&nbsp;×</button>	
  <strong>{{ session('success') }}</strong>
</div>
@endif

@if (session('danger'))
<div class="alert alert-danger alert-block alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert" style="outline: none;">&nbsp;×</button>	
  <strong>{{ session('success') }}</strong>
</div>
@endif