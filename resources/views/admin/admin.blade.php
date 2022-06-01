@include ('admin.header')
@include ('admin.sidebar')

	
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>{{$page_title}}</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />

                  <div class="content"> 
                  <div class="container-fluid"> 
                    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{DB::table('posts')->get()->count();}}</h3>

                <p>Posts</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('admin/posts')}}" class="small-box-footer">More info</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{DB::table('users')->get()->count();}}</h3>
                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{url('admin/users')}}" class="small-box-footer">More info</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{DB::table('categories')->get()->count();}}</h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('admin/categories')}}" class="small-box-footer">More info </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
                  </div>    
                  </div>    
              
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

@include ('admin.footer')