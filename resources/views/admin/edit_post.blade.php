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
            @if($row)
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
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{$row->title}}" autofocus=""><br>
                </div>
            </div>


            <div class="form-group-row">
                <label for="" class="col-sm-2 col-form-label">Featured image</label>
                <div class="col-sm-10">
                    <input id="file" type="file" class="form-control" name="file"><br>
                    <img src="{{url('uploads/'.$row->image)}}" style="width: 200px;">
                </div>
            </div>

            <div class="form-group-row">
                <label for="" class="col-sm-2 col-form-label">Post category</label><div class="col-sm-10">
                    <select class="form-control" name="category_id">
                        <option value="{{$row->category_id}}">{{$category->category}}</option>
                        @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->category}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <br style="clear: both;">
            <br>

            <h4>Post content</h4>
            <?php $root = url(''); ?>
            <textarea id="summernote" name="content" style="min-height: 400px;"><?= str_replace('src="','src="'.$root.'/', $row->content) ?></textarea>
            <input type="submit" value="Save" class="btn btn-primary">
            <a href="{{url('admin/posts')}}">
            <input type="button" value="Back" class="btn btn-success" style="float:right;">
        </a>

        </form>
        @else
        <div class="alert alert-danger">Sorry , post not found</div>
        <a href="{{url('admin/posts')}}">
            <input type="button" value="Back" class="btn btn-success" style="float:right;">
        </a>
        @endif
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