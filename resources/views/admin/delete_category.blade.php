@include ('admin.header')



@include ('admin.sidebar')



<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h2>{{$page_title}}</h2>   
           </div>


           <div class="container-fluid col-lg-10 mr-auto ml-auto">
            <h4><b>Are you sure you want to delete this category?</b></h4>
            @if($row)
            <form method="post">
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
                        <input  type="text" class="form-control" name="category" placeholder="Title" value="{{$row->category}}" autofocus="" disabled="">
                        <br>
                    </div>
                </div>

                

                <br style="clear: both;">
                <br>
                
                <input type="submit" value="Delete" class="btn btn-danger" style="float:right;">
                <a href="{{url('admin/categories')}}">
                    <input type="button" value="Back" class="btn btn-success" >
                </a>

            </form>
            @else
            <div class="alert alert-danger">Sorry , couldn't find this category</div>
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
