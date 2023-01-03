<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\category;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use App\Models\MyPage;

class adminController extends Controller
{

    public function index(Request $req) {

        return view('admin.admin',['page_title'=>'Dashboard']);

    }

    public function posts(Request $req ,$type = '',$id = '') {

        switch ($type) { 
            
            case 'add':

                if($req->method() == 'POST'){
                 
                    $post = new Post();
                    
                    $folder = "uploads/";
                    if(!file_exists($folder)){
                        mkdir($folder,0777,true); // give permission using 0777 & true fol folders inside a folder
                    }
                    
                    




                        // generate unique file name for content image
                        function generate_filename($length) 
                        {
                            $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
                            $text = "" ;

                            for($x = 0;$x<$length;$x++)
                            {
                                $random = rand(0,61);
                                $text .= $array[$random];
                            }
                            return $text;
                        }



                         $validated = $req->validate([
                    
                        'title' => 'required|string',
                        'file' => 'required|image',
                        'content' => 'required',
                        
                        ]);

                    // remove images from content
                    preg_match_all('/<img[^>]+>/',$req->input('content'),$matches);
                    $new_content = $req->input('content'); 


                    echo '<pre>';
                    if ((is_array($matches) && count($matches) > 0)) {
                    foreach ($matches[0] as $match) {
                        // code...
                        preg_match('/src="[^"]+/',$match,$matches2);
                        
                        
                        $parts = explode(",", $matches2[0]);




                        $filename = $folder ."base_64_". generate_filename(50).".jpg";
                        
                        
                        $new_content = str_replace($parts[0] . ',' . $parts[1], 'src="' .$filename, $new_content);
                        file_put_contents($filename,base64_decode($parts[1]));                        
                        
                    }
                    }
                    



        

                    $path = $req->file('file')->store('/',['disk'=>'my_disk']);

                    $data['title'] = $req->input('title');
                    $data['category_id'] = $req->input('category_id');
                    $data['image'] = $path;
                    $data['content'] = $new_content;
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $data['updated_at'] = date("Y-m-d H:i:s");
                    $data['slag'] = $post->str_to_url($data['title']);

                    $post->insert($data);

                    return redirect('admin/posts');

                                
                }

                $query = "select * from categories order by id desc";
                $categories = DB::select($query);

                return view('admin.add_post',[
                    'page_title'=>'New post',
                    'categories'=> $categories,

                ]);
                break;



            case 'edit':

                $post = new post();

                if($req->method() == 'POST'){
                 
                    $validated = $req->validate([
                    
                        'title' => 'required|string',
                        'file' => 'image',
                        'content' => 'required',
                    
                    ]);
                    

                    //check if admin changed the image
                    if($req->file('file')){
                    
                    $oldrow = $post->find($id);
                    if(file_exists('uploads/'.$oldrow->image)){
                        unlink('uploads/'.$oldrow->image);
                    }
                    
                    
                    $path = $req->file('file')->store('/',['disk'=>'my_disk']);
                    $data['image'] = $path;
                    }
                    $root = url('');  //for images path
                    $data['title'] = $req->input('title');
                    $data['category_id'] = $req->input('category_id');
                    $data['content'] = str_replace($root,'', $req->input('content'));
                    // $data['content'] = $req->input('content');
                    
                    $data['updated_at'] = date("Y-m-d H:i:s");
                    $data['slag'] = $post->str_to_url($data['title']);

                    $post->where('id',$id)->update($data);

                    return redirect('admin/posts/edit/'.$id);

                   
                }


                $row = $post->find($id);

                if(isset($row)){
                $category = $row->category()->first();
                }
                else {
                    die;
                }

                $query = "select * from categories order by id desc";
                $categories = DB::select($query);

                return view('admin.edit_post',[
                    'page_title' => 'Edit post',
                    'row' => $row,
                    'category' => $category,
                    'categories' => $categories,

                ]);
                break;



            case 'update':
                

                $post = new post();

                if($req->method() == 'POST'){
                 
                    $validated = $req->validate([
                    
                        'title' => 'required|string',
                        'file' => 'image',
                        'content' => 'required',
                    
                    ]);
                    

                    //check if admin changed the image
                    if($req->file('file')){
                    
                    $oldrow = $post->find($id);
                    if(file_exists('uploads/'.$oldrow->image)){
                        unlink('uploads/'.$oldrow->image);
                    }

                    $path = $req->file('file')->store('/',['disk'=>'my_disk']);
                    $data['image'] = $path;
                    }
                    
                    $data['title'] = $req->input('title');
                    $data['category_id'] = $req->input('category_id');
                    $data['content'] = $req->input('content');
                    
                    $data['updated_at'] = date("Y-m-d H:i:s");

                    $post->where('id',$id)->update($data);

                    return redirect('admin/posts/edit/'.$id);

                   
                }


                $row = $post->find($id);

                $category = $row->category()->first();



                return view('admin.edit_post',[
                    'page_title' => 'Edit post',
                    'row' => $row,
                    'category' => $category,

                ]);
                break;




                return view('admin.posts',['page_title'=>'Update post']);
                break;



            case 'delete':
                

                $post = new post();
                $row = $post->find($id);
                
                if(isset($row)){
                $category = $row->category()->first();
                }
                else {
                    die;
                }
                $category = $row->category()->first();

                if($req->method() == 'POST'){
                 
                    
                    $oldrow = $post->find($id);
                    if(file_exists('uploads/'.$oldrow->image)){
                        unlink('uploads/'.$oldrow->image);
                    }
                    $row->delete();

                    return redirect('admin/posts/');

                   
                }



                return view('admin.delete_post',[
                    'page_title' => 'Delete post',
                    'row' => $row,
                    'category' => $category,

                ]);
                break;


                return view('admin.posts',['page_title'=>'Delete post']);
                break;

 
                default: 
                $limit = 10;
                $page = $req->input('page') ? (int)$req->input('page') : 1;
                $offset = ($page - 1) * ($limit);
   

                $page_class = new MyPage();
                $links = $page_class->make_links($req->fullUrlWithQuery(['page' => $page]),$page);
                
                $query = "select posts.*,categories.category from posts join categories on posts.category_id = categories.id limit $limit offset $offset";


                $rows = DB::select($query);

                $data['rows'] = $rows;
                
                $data['page_title'] = 'Posts';
                
                $data['links'] = $links;
                
                return view('admin.posts',$data);
                break;



        }


    }

    public function categories(Request $req , $type = '',$id = '') {

        switch ($type) { 
            
            case 'add':
                if($req->method() == 'POST'){
                 
                    $category = new category();

                    $validated = $req->validate([
                    
                        'category' => 'required|string|unique:categories',
                    
                    ]);
                    

                    $data['category'] = $req->input('category');
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $data['updated_at'] = date("Y-m-d H:i:s");

                    $category->insert($data);
                           
                    }

                return view('admin.add_category',['page_title'=>'New Category']);
                break;



            case 'edit':
                


                $category = new category();

                if($req->method() == 'POST'){
                 
                    $validated = $req->validate([
                    
                        'category' => 'required|string',
                    
                    ]);
                    

                  
                    
                    $data['category'] = $req->input('category');
                    $data['updated_at'] = date("Y-m-d H:i:s");

                    $category->where('id',$id)->update($data);

                    return redirect('admin/categories/edit/'.$id);

                   
                }


                $row = $category->find($id);

                return view('admin.edit_category',[
                    'page_title' => 'Edit category',
                    'row' => $row,

                ]);
                break;



            case 'update':
                

                $post = new post();

                if($req->method() == 'POST'){
                 
                    $validated = $req->validate([
                    
                        'title' => 'required|string',
                        'file' => 'image',
                        'content' => 'required',
                    
                    ]);
                    

                    //check if admin changed the image
                    if($req->file('file')){
                    
                    $oldrow = $post->find($id);
                    if(file_exists('uploads/'.$oldrow->image)){
                        unlink('uploads/'.$oldrow->image);
                    }

                    $path = $req->file('file')->store('/',['disk'=>'my_disk']);
                    $data['image'] = $path;
                    }
                    
                    $data['title'] = $req->input('title');
                    $data['category_id'] = $req->input('category_id');
                    $data['content'] = $req->input('content');
                    
                    $data['updated_at'] = date("Y-m-d H:i:s");

                    $post->where('id',$id)->update($data);

                    return redirect('admin/posts/edit/'.$id);

                   
                }


                $row = $post->find($id);

                $category = $row->category()->first();



                return view('admin.edit_post',[
                    'page_title' => 'Edit post',
                    'row' => $row,
                    'category' => $category,

                ]);
                break;




                return view('admin.posts',['page_title'=>'Update post']);
                break;



            case 'delete':
                

                $category = new category();
                $row = $category->find($id);

                if($req->method() == 'POST'){
                 
                    $row->delete();

                    return redirect('admin/categories');

                   
                }



                return view('admin.delete_category',[
                    'page_title' => 'Delete category',
                    'row' => $row,

                ]);
                break;

                return view('admin.categories',['page_title'=>'Categories']);
                break;


                default:
                $limit = 10;
                $page = $req->input('page') ? (int)$req->input('page') : 1;
                $offset = ($page - 1) * ($limit);
   

                $page_class = new MyPage();
                $links = $page_class->make_links($req->fullUrlWithQuery(['page' => $page]),$page);   
                

                $query = "select * from categories order by id desc limit $limit offset $offset";

                $rows = DB::select($query);

                $data['rows'] = $rows;
                
                $data['page_title'] = 'Categories';
                
                $data['links'] = $links;
                
                return view('admin.categories',$data);
                break;

        }




        return view('admin.admin',['page_title'=>'Categories']);

    }

    public function users(Request $req  , $type = '',$id = '') {

        switch ($type) { 
            
            case 'add':
                if($req->method() == 'POST'){
                 
                    $user = new user();

                  
        $validated = $req->validate([
            "name" => "required|alpha",
            "email" => "required|email|unique:users",  //email is required and should be unique so it will check users table
            "password" => "required"
        ]);

        $date = date("Y-m-d H:i:s");
        $user = new User();
        $user->insert([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'password' => Hash::make($req->input('password')),
            'created_at' => $date,
            'updated_at' => $date
            
        ]);      
                    }

                return view('admin.add_user',['page_title'=>'New User']);
                break;



            case 'edit':
                
                $user = new user();

                if($req->method() == 'POST'){
                 
                    $validated = $req->validate([
                    
                        'name' => 'required|string',
                        'email' => 'required|email',

                        // there is a problem here which is we 
                        // did not validate if this email already exist
                        // so this will cause a repetition issue

                    ]);
                    

                    if(!empty($req->input('password'))){

                        $data['password'] = Hash::make($req->input('password'));

                    }
                    
                    $data['name'] = $req->input('name');
                    $data['email'] = $req->input('email');
                    $data['updated_at'] = date("Y-m-d H:i:s");

                    $user->where('id',$id)->update($data);

                    return redirect('admin/users/edit/'.$id);
                   
                }


                $row = $user->find($id);

                return view('admin.edit_user',[
                    'page_title' => 'Edit user',
                    'row' => $row,
                ]);
                break;





            case 'delete':
                

                $user = new user();
                
                $row = $user->find($id);

                if($req->method() == 'POST'){
                 
                    $row->delete();

                    return redirect('admin/users');

                   
                }


                return view('admin.delete_user',[
                    'page_title' => 'Delete user',
                    'row' => $row,

                ]);
                break;

                return view('admin.categories',['page_title'=>'Categories']);
                break;


                default:    
                $limit = 10;
                $page = $req->input('page') ? (int)$req->input('page') : 1;
                $offset = ($page - 1) * ($limit);
   

                $page_class = new MyPage();
                $links = $page_class->make_links($req->fullUrlWithQuery(['page' => $page]),$page);   
                

                $query = "select * from users order by id desc limit $limit offset $offset";

                $rows = DB::select($query);//return an array not a class

                $data['rows'] = $rows;
                
                $data['page_title'] = 'Users';
                
                $data['links'] = $links;
                
                return view('admin.users',$data);
                break;

        }


      
        return view('admin.admin',['page_title'=>'Users',]);

    }
 
        public function save(Request $req) {

        $required = $req->validate([
            "key" => "required|string",
            "key" => "required|image"
        ]);
        return view('view');
            
        
        
    }
}