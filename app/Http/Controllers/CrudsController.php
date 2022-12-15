<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crud;
use App\month;
use App\language;
use App\user_lang;
use DB;
class CrudsController extends Controller
{
    public function index()
    {
         $cruds= DB::SELECT("SELECT`user`.id,`user`.name,`user`.email,`user`.address,`user`.password,`user`.file,`month`.`period`,`language`.lang,
         GROUP_CONCAT(lang) AS lang
         FROM `user`,`month`,`userlang`,`language`
         WHERE user.period=month.id AND userlang.langid=language.langid AND user.id=userlang.user_id
         GROUP BY `user`.id"); 
        return view('index')->with('cruds',$cruds); 
    }

    
     public function login()
     {
          return view('login');
     }

     public function loginverify(Request $request)
    {
        $request->validate([  
            'email'=>'required',  
            'password'=>'required|min:4' ]);
           
            $data=$request->input();
            $email= $data['email'];  
            $pass = $data['password'];
            
            $cruds= DB::SELECT("SELECT `user`.email,`user`.password FROM `user` WHERE email='$email' AND password='$pass'");
            
            if(count($cruds) > 0) 
            {      
                $data = $request->session()->put('user', $request->input('email'));
               return redirect('show');
            }
       else{
           return redirect('login')->withErrors(['email', 'password' => ['user not found.']]);
            }
    }
     

    public function create()
    {
        $month = month::all();
        $lang = language::all();
        return view('create', compact('month','lang'));
    }
    
    
    public function store(Request $request)
    {
       $request->validate([  
            'name'=>'required',  
            'email'=>'required|email|unique:user,email',  
            'address'=>'required',  
            'password'=>'required|min:4',
            'period'=>'required',
            'lang'=>'required',
            'file' => 'required',
            'file.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg'
        ]);  

        if($request->hasfile('file'))
         {
            foreach($request->file('file') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(base_path() . '/storage/app/public', $name);
                $data[] = $name;
            }
         }
        
        $crud = new crud;   
        $crud->name =  $request->get('name');  
        $crud->email = $request->get('email');  
        $crud->address = $request->get('address');  
        $crud->password =$request->get('password');  
        $crud->period =  $request->get('period');
        $crud->file =  json_encode($data);  
        $crud->save(); 

        $id= $crud->id;
        $lang=new user_lang;
        $lang->lang =  $request->get('lang');  
        foreach ($lang->lang as $key => $value) {
            $sql2 =DB::Insert("INSERT INTO `userlang`(`user_id`,`langid`) VALUES ('$id','$value')");
        }
    return redirect('login');
    }

    
    public function new()
    {
        $month = month::all();
        $lang = language::all();
        return view('add', compact('month','lang'));
    }


    public function add(Request $request)
    {
       $request->validate([  
            'name'=>'required',  
            'email'=>'required|email|unique:user,email',  
            'address'=>'required',  
            'password'=>'required|min:4',
            'period'=>'required',
            'lang'=>'required',
            'file' => 'required',
            'file.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg'
        ]);  

        if($request->hasfile('file'))
         {
            foreach($request->file('file') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(base_path() . '/storage/app/public', $name);
                $data[] = $name;
            }
         }
        
        $crud = new crud;   
        $crud->name =  $request->get('name');  
        $crud->email = $request->get('email');  
        $crud->address = $request->get('address');  
        $crud->password =$request->get('password');  
        $crud->period =  $request->get('period');
        $crud->file =  json_encode($data);  
        $crud->save();
        
        $id= $crud->id;
        $lang=new user_lang;
        $lang->lang =  $request->get('lang');  

        foreach ($lang->lang as $key => $value) {
            $sql2 =DB::Insert("INSERT INTO `userlang`(`user_id`,`langid`) VALUES ('$id','$value')");
        }
        
    
    return redirect('show');
    }
    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        
        $crud = DB::table('user')->where('id', $id)->first();
        $l = DB::SELECT("select langid from userlang where user_id = $id");
        $arr = [];
        foreach($l as $r){
          $arr[]=$r->langid;
               }
        
        $month = month::all();
        $lang = language::all();
     return view('edit', compact('crud','l','month','lang','arr'));  
    }
   

    public function update(Request $request, $id)
    {
       
        $request->validate([  
            'name'=>'required',  
            'email'=>'required|email',  
            'address'=>'required',  
            'period'=>'required',
            'lang'=>'required',
            'file' => 'required',
            'file.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg'
        ]);  

        if($request->hasfile('file'))
         {
            foreach($request->file('file') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(base_path() . '/storage/app/public', $name);
                $data[] = $name;
            }
         }
     
        $crud = crud::find($id);   
        $crud->name =  $request->get('name');  
        $crud->email = $request->get('email');  
        $crud->address = $request->get('address');  
        $crud->period =  $request->get('period');
        $crud->file =  json_encode($data);  
        $crud->save(); 
        $delete_query = DB::delete("DELETE FROM `userlang` WHERE user_id='$id'");
        $langnew= $crud->langid = $request['lang'];  
       

        foreach ($langnew as $langinput) { 
                    $sql2 =DB::Insert("INSERT INTO `userlang`(`user_id`,`langid`) VALUES ('$id','$langinput')");
           
        }
        return redirect('show');       
    }

        
    public function destroy($id)
    {
            
        $crud=Crud::find($id)->delete();    
            return redirect('/show');
    }

    public function logout (){
            \Session:: flush();
            \Auth:: logout();
            return redirect('login');
    }
}
