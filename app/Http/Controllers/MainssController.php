
<?php
  
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use App\Models\Danger;
  
class MainController extends Controller
{
	
    public function index(){  
        return view('index');
    }


	public function viewDanger(Request $request)
        {
            echo 11111;
            //$list_city="";
            //echo 111;
           /* $dangers = Danger::all();
            foreach ($dangers as $danger) {
                $list_city .= '*'.$danger->city;
            }*/
           // return $list_city;
        }  

    }