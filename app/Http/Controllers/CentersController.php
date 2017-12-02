<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
class CentersController extends Controller
{
    //GET
    public function handle_request(Request $request){
    	if(session('Centers')==null){
    		$option = 'login';
    	} else {
    		$option = ($request->option !=null)? $request->option:'Dashboard';
    	}
    	switch ($option){
    		case 'login':
    			return $this->loginpage();
    			break;
            case 'home':
                return $this->home();
                break;
            case 'logout':
                return $this->logout();
                break;
            case 'courses':
                return $this->courses();
                break;
            case 'addCourses':
                return $this->addCourses();
                break; 
            case 'listcourses':
                return $this->listcourses();
                break; 

    		default:
    				return $option;
    			break;
    	}
    }
    public function centerlogin(Request $request){
        $Users =new App\Users;
        $user = $Users->login($request->username,md5($request->password));
        if ($user!=null){
            if ($user->Centers()!=null){
                $request->session()->put('Centers', $user->Centers);
                return redirect()->route('centerpage',['option'=>'home']);
            } else {
                return view('centerviews/centerlogin')->with('loginabort','Your account denied');
            }
        } else {
            return view('centerviews/centerlogin')->with('loginabort','Username/Password do not matches');
        }
    }
    public function loginpage(){
        return view('centerviews/centerlogin');
    }
    public function home(){
        return view('centerviews/home');
    }
    public function logout(){
        Session::flush();
        return redirect()->route('centerpage',['option'=>'login']);
    }
    public function courses(){
        return view('centerviews/courses');
    }

    public function listcourses(){
        $Centers_id = session('Centers')->id;
        $Centers = App\Centers::find($Centers_id);
        $Courses = $Centers->Courses;
        return response()->json(array('data' => $Courses));
    }
    public function showlessons(Request $request){
        $course  = App\Courses::find($request->courses_id);
        return view('centerviews/lessons')->with(['courses_id'=>$course->id,'courses_name'=>$course->name]);
    }
    //POST
    public function handle_post(Request $request){
        $option = $request->option;
        switch ($option) {
            case 'addCourses':
                return $this->addCourses($request->courses_name);
                //return $request->courses_name;
                break;
            case 'addLessons':
                return $this->addLessons($request->courses_id,$request->lessons_name);
                //return $request->lessons_name;  
                break;
            case 'listLessons':
                return $this->listLessons($request->courses_id);
                break;
            default:
                # code...
                break;
        }
    }
    public function addCourses($name){
        $Centers = session('Centers');
        return $Centers->newCourses($name);        
    }
    public function addLessons($course_id,$name){
        $course = App\Courses::find($course_id);
        return $course->newLessons($name);
    }
    public function listLessons($course_id){
        $course = App\Courses::find($course_id);
        $listLessons = $course->Lessons;
        return response()->json(array('data' => $listLessons));
    }
}
