<ol class="breadcrumb">                        
	<i class="fa fa-dashboard"></i> 
	<a href="{!! url('admin') !!}">Home</a> 
	<i class="fa fa-angle-right"></i>                        
	<?php $link = url(config('admin.prefix')); ?> 
	@for($i = 1; $i <= count(Request::segments()); $i++)                             
		@if($i < count(Request::segments()) & $i > 0)
			@if((Request::segment($i) <> config('admin.prefix')) and !is_numeric(Request::segment($i)))                                        
				<?php $link .= "/" . Request::segment($i); ?> 
				{!! link_to($link, $title = ucfirst(Request::segment($i))) !!}
				{!!'<i class="fa fa-angle-right"></i>'!!}                                        
			@endif
		@else 
			{{ucfirst(Request::segment($i))}}
		@endif                             
	@endfor 
</ol>