@include ('admin.header')



@include ('admin.sidebar')



<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>{{$page_title}}</h2>   
         </div>

         <div class="container-fluid col-lg-10 mr-auto ml-auto mt-5">
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
                <label for="" class="col-sm-2 col-form-label">Category name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="category" placeholder="Category" value="{{$row->category}}" autofocus=""><br>
                </div>
            </div>


            

            <br style="clear: both;">
            <br>

            
            <input type="submit" value="Save" class="btn btn-primary">
            <a href="{{url('admin/categories')}}">
            <input type="button" value="Back" class="btn btn-success" style="float:right;">
        </a>

        </form>
        @else
        <div class="alert alert-danger">Sorry couldn't find this category</div>
        <a href="{{url('admin/categories')}}">
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