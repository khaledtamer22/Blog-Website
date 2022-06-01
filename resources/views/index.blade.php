@include('header')
	<div class="container">
		<div class="row text-center">
			
			@if($rows)
			@foreach($rows as $row)
			<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
				<a href="{{url('single/'.$row->slag)}}">
				<figure>
					<img src="{{url('uploads/'.$row->image)}}" alt="Image" class="img-responsive img-index">
				</figure>
				<span class="fh5co-meta">{{$row->category}}</span>
				<h2 class="fh5co-article-title">{{ucfirst($row->title)}}</h2>
				<span class="fh5co-meta fh5co-date">{{date("jS M, Y",strtotime($row->created_at))}}</span>
				</a>
			</article>
			@endforeach
			@endif

			<div class="clearfix visible-xs-block"></div>
			@include('pagination')
		</div>
	</div>
	@include('footer')