@include ('admin.header')

<link href="{{url('summernote/summernote-lite.min.css')}}" rel="stylesheet" />

@include ('admin.sidebar')



<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h2>{{$page_title}}</h2>   
           </div>


           <div class="container-fluid col-lg-10 mr-auto ml-auto">
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
                    <label for="" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{old('title')}}" autofocus=""><br>
                    </div>
                </div>


                <div class="form-group-row">
                    <label for="" class="col-sm-2 col-form-label">Featured image</label>
                    <div class="col-sm-10">
                        <input id="file" type="file" class="form-control" name="file"><br>
                    </div>
                </div>

                <div class="form-group-row">
                    <label for="" class="col-sm-2 col-form-label">Post category</label><div class="col-sm-10">
                        <select class="form-control" name="category_id">
                            
                               @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endforeach
                            
                            <option value="">
                                
                            </option>
                            
                        
                        </select>
                    </div>
                </div>

                <br style="clear: both;">
                <br>
                
                        <h4>Post content</h4>
                        <textarea id="summernote" name="content" style="min-height: 400px;">{{old('content')}}</textarea>
                <input type="submit" value="Post" class="btn btn-primary">
                
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