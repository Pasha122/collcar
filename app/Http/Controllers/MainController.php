<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use App\Models\Details;
use App\Models\Car;
use App\Models\Category;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalog = Details::all();
        $category = Category::all();
        $car = Car::all();
        return view('index', compact('catalog', 'category', 'car'));
    }
    public function search($search)
    {
        $catalog = Details::where('name', 'LIKE', '%'.$search.'%')
                            ->orWhere('description', 'LIKE', '%'.$search.'%')
                            ->orWhere('car_brand', 'LIKE', '%'.$search.'%')
                            ->orWhere('art', 'LIKE', '%'.$search.'%')
                            ->orWhere('price', 'LIKE', '%'.$search.'%')
                            ->get();
        $category = Category::all();
        $car = Car::all();
        return view('index', compact('catalog', 'category', 'car'));
    }


    public function searchCategory($search)
    {
        $catalog = Details::where('category_id', '=', $search)
                            ->get();
        $category = Category::all();
        $car = Car::all();
        $category_id=$search;
        return view('index', compact('catalog', 'category', 'car', 'category_id'));
    }

    public function searchCar($search)
    {
        $catalog = Details::where('car_brand_id', '=', $search)
                            ->get();
        $category = Category::all();
        $car = Car::all();
        $car_id=$search;
        return view('index', compact('catalog', 'category', 'car', 'car_id'));
    }

    public function searchDetail($search)
    {
        $catalog = Details::where('id', '=', $search)
                            ->get();
        $category = Category::all();
        $car = Car::all();
      
        return view('index', compact('catalog', 'category', 'car'));
    }






    /*Details*/
    public function myDetails()
    {
        $details = Details::where('user_id', '=', Auth::user()->id)->get();
        $category = Category::all();
        $car = Car::all();
        return view('details.details', compact('details', 'category'));
    } 


    public function myDetailsEdit(Request $request, $id)
    {
        $details = Details::where('id', '=', $id)->get();
        $category = Category::all();
        $car = Car::all();  
        $id_detail=$id;
        return view('details.edit-details', compact('details', 'category', 'car', 'id_detail'));
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
        $details = Details::where('user_id', '=', Auth::user()->id)->get();
        $category = Category::all();
        return redirect(route('page-details'))->with( ['details'=>$details, 'category'=>$category] );
    }
    public function myDetailsDelete(Request $request, $id)
    {
        $detail = Details::where('id',$id)->delete();
        $details = Details::where('user_id', '=', Auth::user()->id)->get();
        $category = Category::all();
        return view('details.details', compact('details', 'category'));
    }
    public function myDetailsCreate()
    {
        $category = Category::all();
        $car = Car::all();
        $user_id=Auth::user()->id;
        return view('details.detail-create', compact('category', 'car', 'user_id'));
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
        $details = Details::where('user_id', '=', Auth::user()->id)->get();
        $category = Category::all();
        //return view('details.details', compact('details', 'category'));
        return redirect(route('page-details'))->with( ['details'=>$details, 'category'=>$category] );
        
    }
    /*Details*/

    /*Category*/
    public function myCategory()
    {
        $errors="";
        $category = Category::all();
        return view('category.category', compact('category', 'errors'));
    } 
    public function myCategoryEdit(Request $request, $id)
    {
        $category = Category::where('id', '=', $id)->get();
        $user_id=Auth::user()->id;
        $id_category=$id;
        return view('category.edit-category', compact('category', 'user_id', 'id_category'));
    }    
    public function myCategoryUpdate(Request $request, $id)
    {
        $errors="";
        $category = Category::find($id);
        $category->update($request->all());
        $category = Category::all();
        return view('category.category', compact('category', 'errors'));
    }
    public function myCategoryDelete(Request $request, $id)
    {
        $errors="";
        Category::where('id',$id)->delete();
        $category = Category::all();
        return view('category.category', compact('category', 'errors'));
    }
    public function myCategoryCreate()
    {
        $user_id=Auth::user()->id;
        return view('category.category-create', compact('user_id'));
    }
    public function myCategoryAdd(Request $request)
    {
        $errors="";
        $category = Category::all();
        if(Category::where('name', $request->name)->exists()){
            $errors="Таке ім’я категорії вже існує!";
            return view('category.category', compact('category', 'errors'));
        }else{
            
            Category::create($request->all());  
            return redirect(route('page-category'))->with( ['category'=>$category, 'errors'=>$errors] );
        }
    }
    /*Category*/

    /*brand*/
    public function myBrand()
    {
       
        $errors="";
        $brand = Car::all();
        return view('brand.brand', compact('brand', 'errors'));
    } 
    public function myBrandCreate()
    {
        return view('brand.brand-create');
    }

    public function myBrandAdd(Request $request)
    {
        $errors="";
       
        if(Car::where('name', $request->name)->exists()){
            $errors="Таке ім’я марки вже існує!";
            $brand = Car::all();
            return view('brand.brand', compact('brand', 'errors'));
        }else{
            $brand = Car::all();
            Car::create($request->all());  
            return redirect(route('page-brand'))->with( ['brand'=>$brand, 'errors'=>$errors] );
        }
    }
     public function myBrandDelete(Request $request, $id)
    {
        $errors="";
        Car::where('id',$id)->delete();
        $brand = Car::all();  
        return redirect(route('page-brand'))->with( ['brand'=>$brand, 'errors'=>$errors] );
    }
    /*brand*/


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
