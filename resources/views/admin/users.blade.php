@include ('admin.header')
@include ('admin.sidebar')



<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h2>{{$page_title}}</h2>
               <a href="{{url('admin/users/add')}}"><button class="btn btn-primary" style="float:right;"><i class="fa fa-plus"></i> Add user</button></a>
           </div>


           @if($rows)
           <table class="table table-stripped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{date("jS M, Y",strtotime($row->created_at))}}</td>
                    <td>
                        <a href="{{url('admin/users/edit/'.$row->id)}}">
                            <button class="btn btn-success"><i class="fa fa-edit"></i>Edit</button></a>
                            <a href="{{url('admin/users/delete/'.$row->id)}}">
                                <button class="btn btn-warning"><i class="fa fa-times"></i>Delete</button>
                            </a>

                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @include('pagination')
        @else
        <div class="alert alert-danger">No users found</div>
        @endif

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