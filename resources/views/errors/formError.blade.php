@if(count($errors)>0)

<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Error!</strong>
	<hr> 
	<ul class="list-group">
		@foreach ($errors->all() as $error)
			<li class="list-group-item">{{$error}} </li>
		@endforeach
		
	</ul>
	
</div>
@endif