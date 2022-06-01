@include ('admin.header')
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
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Title" value="{{$row->name}}" autofocus=""><br>
                </div>
            </div>

             <div class="form-group-row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Title" value="{{$row->email}}" autofocus=""><br>
                </div>
            </div>


             <div class="form-group-row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Password" value="" autofocus=""><br>
                </div>
            </div>


           

          
            <input type="submit" value="update" class="btn btn-primary">

          
            <a href="{{url('admin/users')}}">
            <input type="button" value="Back" class="btn btn-success" style="float:right;">
             </a>

        </form>
        @else
        <div class="alert alert-danger">Sorry , user not found</div>
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
