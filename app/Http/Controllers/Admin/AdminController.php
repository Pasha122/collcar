<?php
  
namespace App\Http\Controllers\Admin;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;


use App\Models\Details;
use App\Models\Car;
use App\Models\Category;
use App\Models\Order;
use App\Models\Client;
use Carbon\Carbon;

  
class AdminController extends Controller
{

    /**
     * Write code on Method
     *
     * @return response()
     */
        public function admin(){
          $errors="";
          $users = User::where('type', '=', 0)->get(); 
          return view('admin.index', compact('users', 'errors'));
        }
      //edit-user
    
        public function editUser(Request $request, $id){
          $users = User::where('id', '=', $id)->get(); 
          $id_user=$id;
          return view('admin.user.edit-user', compact('users','id_user'));
        }
         public function updateUser(Request $request, $id){
            $errors="";
            if(empty($request->password)){
                User::where('email', $request->email)
                   ->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);
                $users = User::where('type', '=', 0)->get(); 
                return redirect(route('admin.page-user'))->with( ['users'=>$users, 'errors'=>$errors] );
            }else{
                 User::where('email', $request->email)
                   ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
               
                $users = User::where('type', '=', 0)->get(); 
                return redirect(route('admin.page-user'))->with( ['users'=>$users, 'errors'=>$errors] );

            }
            
        }

        public function createUser()
        {
            return view('admin.user.create-user');
        }
        public function addUser(Request $request){
            $errors="";
            if(User::where('email', $request->email)->exists()){
                $errors="Працівник з таким Email вже існує!";
                $users = User::where('type', '=', 0)->get(); 
                return view('admin.index', compact('users', 'errors'));
            }else{
                User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => 0,
              ]);
                $users = User::where('type', '=', 0)->get(); 
                return redirect(route('admin.page-user'))->with( ['users'=>$users,'errors'=>$errors] );
            }
        }
        public function deleteUser(Request $request, $id)
        {
             $errors="";
            $user = User::where('id',$id)->delete();
            $users = User::where('type', '=', 0)->get(); 
            return redirect(route('admin.page-user'))->with( ['users'=>$users] );
        }


        public function statistics()
        {
            $date = Carbon::now()->subDays(7);
            $date_month = Carbon::now()->subDays(30);
            $date_kvartal = Carbon::now()->subDays(90);

            $price_week=0;
            $price_month=0;
            $price_kvartal=0;
            
            $statistics = Order::where('created_at', '>=', $date)->get();
            $count_order_week = $statistics->count();

            $statistics_month = Order::where('created_at', '>=', $date_month)->get();
            $count_order_month = $statistics_month->count();

            $statistics_kvartal = Order::where('created_at', '>=', $date_kvartal)->get();
            $count_order_kvartal = $statistics_kvartal->count();

            $price_week=$statistics->sum('price');
            $price_month=$statistics_month->sum('price');
            $price_kvartal=$statistics_kvartal->sum('price');



            return view('admin.statistics.statistics', compact('count_order_week', 'count_order_month', 'count_order_kvartal', 'price_week', 'price_month', 'price_kvartal'));
        }



        /*details*/
         public function myDetails()
        {
            $details = Details::all();
            $category = Category::all();
            $car = Car::all();
            return view('admin.details.details', compact('details', 'category'));
        } 


        public function myDetailsEdit(Request $request, $id)
        {
            $details = Details::where('id', '=', $id)->get();
            $category = Category::all();
            $car = Car::all();  
            $id_detail=$id;
            return view('admin.details.edit-details', compact('details', 'category', 'car', 'id_detail'));
        }    


        public function myDetailsUpdate(Request $request, $id)
        {

            if(!empty($request->uploadImage)){
                $imageName = time().'.'.$request->uploadImage->extension();
                $request->uploadImage->move(public_path('path'), $imageName);
                $request->image=$imageName;

                $request->merge([
                    'image' => $imageName,
                ]);
            }


            $detail = Details::find($id);
            $detail->update($request->all());
            $details = Details::all();
            $category = Category::all();
            return redirect(route('admin.page-details'))->with( ['details'=>$details, 'category'=>$category] );
            
        }

        public function myDetailsDelete(Request $request, $id)
        {
            $detail = Details::where('id',$id)->delete();
            $details = Details::all();
            $category = Category::all();
            return view('admin.details.details', compact('details', 'category'));
        }
        public function myDetailsCreate()
        {
            $category = Category::all();
            $car = Car::all();
            $user_id=Auth::user()->id;
            return view('admin.details.detail-create', compact('category', 'car', 'user_id'));
        }
        public function myDetailsAdd(Request $request)
        {
            $imageName = time().'.'.$request->uploadImage->extension();
            $request->uploadImage->move(public_path('path'), $imageName);
            $request->image=$imageName;

            $request->merge([
                'image' => $imageName,
            ]);
            Details::create($request->all());
            $details = Details::all();
            $category = Category::all();
            //return view('details.details', compact('details', 'category'));
            return redirect(route('admin.page-details'))->with( ['details'=>$details, 'category'=>$category] );
            
        }
        /*details*/


        /*category*/
        public function myCategory()
        {
            $errors="";
            $category = Category::all();
            return view('admin.category.category', compact('category', 'errors'));
        } 
        public function myCategoryEdit(Request $request, $id)
        {
            $category = Category::where('id', '=', $id)->get();
            $user_id=Auth::user()->id;
            $id_category=$id;
            return view('admin.category.edit-category', compact('category', 'user_id', 'id_category'));
        }    
        public function myCategoryUpdate(Request $request, $id)
        {
            $errors="";
            $category = Category::find($id);
            $category->update($request->all());
            $category = Category::all();
            return view('admin.category.category', compact('category', 'errors'));
        }
        public function myCategoryDelete(Request $request, $id)
        {
            $errors="";
            Category::where('id',$id)->delete();
            $category = Category::all();
            return view('admin.category.category', compact('category', 'errors'));
        }
        public function myCategoryCreate()
        {
            $user_id=Auth::user()->id;
            return view('admin.category.category-create', compact('user_id'));
        }
        public function myCategoryAdd(Request $request)
        {
            $errors="";
            $category = Category::all();
            if(Category::where('name', $request->name)->exists()){
                $errors="Таке ім’я категорії вже існує!";
                return view('admin.category.category', compact('category', 'errors'));
            }else{
                
                Category::create($request->all());  
                return redirect(route('admin.page-category'))->with( ['category'=>$category, 'errors'=>$errors] );
            }
        }
        /*category*/

        /*brand*/
        public function myBrand()
        {
            $errors="";
            $brand = Car::all();
            return view('admin.brand.brand', compact('brand', 'errors'));
        } 
        public function myBrandCreate()
        {
            return view('admin.brand.brand-create');
        }

        public function myBrandAdd(Request $request)
        {
            $errors="";
           
            if(Car::where('name', $request->name)->exists()){
                $errors="Таке ім’я марки вже існує!";
                $brand = Car::all();
                return view('admin.brand.brand', compact('brand', 'errors'));
            }else{
                $brand = Car::all();
                Car::create($request->all());  
                return redirect(route('admin.page-brand'))->with( ['brand'=>$brand, 'errors'=>$errors] );
            }
        }
         public function myBrandDelete(Request $request, $id)
        {
            $errors="";
            Car::where('id',$id)->delete();
            $brand = Car::all();  
            return redirect(route('admin.page-brand'))->with( ['brand'=>$brand, 'errors'=>$errors] );
        }
        /*brand*/

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      // return User::create([
      //   'name' => $data['name'],
      //   'email' => $data['email'],
      //   'password' => Hash::make($data['password'])
      // ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}