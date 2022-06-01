@include ('admin.header')

<link href="{{url('summernote/summernote-lite.min.css')}}" rel="stylesheet" />

@include ('admin.sidebar')



<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h2>{{$page_title}}</h2>
               <a href="{{url('admin/posts/add')}}"><button class="btn btn-primary" style="float:right;"><i class="fa fa-plus"></i> Add post</button></a>
           </div>


           @if($rows)
           <table class="table table-stripped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Featured image</th>
                    <th>Date</th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                <tr>
                    <td>{{$row->title}}</td>
                    <!-- strip_tags function removes tags when showing data -->
                    
                    <td>{{$row->category}}</td>
                    <td><img src="{{url('uploads/'.$row->image)}}" style="width:150px"></td>
                    <td>{{date("jS M, Y",strtotime($row->created_at))}}</td>
                    <td>
                        <p>
                        <a href="{{url('admin/posts/edit/'.$row->id)}}">
                            <button class="btn btn-success"><i class="fa fa-edit"></i>Edit</button></a>
                        </p>
                        <p>
                            <a href="{{url('admin/posts/delete/'.$row->id)}}">
                                <button class="btn btn-warning"><i class="fa fa-times"></i>Delete</button>
                            </a>
                            </p>
                        </td>
                    </tr>
                    @endforeach
                @endif
                    
                </tbody>
            </table>
            @include('pagination')


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
    $('#summernote').summernote();
});
</script>