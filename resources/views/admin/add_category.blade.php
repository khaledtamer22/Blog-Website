@include ('admin.header')

<link href="{{url('summernote/summernote-lite.min.css')}}" rel="stylesheet" />

@include ('admin.sidebar')



<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h2>{{$page_title}}</h2>   
           </div>


           <div class="container-fluid col-lg-10 mr-auto ml-auto" style="margin-top: 30px;">
              <form method="post" enctype="multipart/form-data">
                @csrf
                @if($errors->all())
                <div class="alert alert-danger text-center">
                @foreach($errors->all() as $error)
                {{$error}}<br>
                @endforeach
                </div>
                @endif
                <div class="form-group-row">
                    <label for="" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="category" placeholder="Category" value="{{old('title')}}" autofocus=""><br>
                    </div>
                </div>

                <input type="submit" value="Add" class="btn btn-primary">
                
            </form>
        </div>
    </div>              
    <!-- /. ROW  -->
    <hr />

    <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->

</div>
<!-- /. PAGE WRAPPER  -->
</div>

@include ('admin.footer')

<script src="{{url('summernote/summernote-lite.min.js')}}"></script>

<script>
  $(document).ready(function(){
    $("#summernote").summernote({height:400})
});
</script>