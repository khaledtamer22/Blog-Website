@include('header')
<?php $root = url('') ?>
<style>
	img{
		max-width: 100%;
	}
</style>
<a href="#" class="fh5co-post-prev"><span><i class="icon-chevron-left"></i> Prev</span></a>
<a href="#" class="fh5co-post-next"><span>Next <i class="icon-chevron-right"></i></span></a>
<!-- END #fh5co-header -->
<div class="container-fluid">
	<div class="row fh5co-post-entry single-entry">
				@if(!empty($row))
		<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
			<figure class="animate-box">
				<img src="{{url('uploads/'.$row->image)}}" alt="Image" class="img-responsive">
			</figure>
		

			<h2 class="fh5co-article-title animate-box"><a href="{{url('single')}}">{{$row->title}}</a></h2>
			<span class="fh5co-meta fh5co-date animate-box">{{date("jS M, Y",strtotime($row->created_at))}}</span>

			<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
				<div class="row">
					<div class="col-lg-12 animate-box">
						<?= str_replace('src="','src="'.$root.'/', $row->content) ?>

					</div>
				</div>
			</div>
		</article>
		
		    
		@endif
		
	</div>
</div>

@include('footer')