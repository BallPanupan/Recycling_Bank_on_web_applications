<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;


//use App\members;
use members;

class MemberController extends Controller
{
    public function MemberLogin(){
      return view('Login');
    }

    public function login2(request $request){
      $username = $request->input('username');
      $password = $request->input('password');

      $result=DB::select("select * from members where username=? and password=?",[$username,$password]);

    //echo count($result);
    //ตัวอย่าง login 1
      if(count($result)>0){
              //echo "OK";
              $request->session()->put('username',$username);
              $request->session()->put('check',"passed");
              return redirect('home/'.$username);
      }else{
          return redirect('/');
        }
    }

    public function logout(request $request){
          $request->session()->forget('check');
          $request->session()->forget('username');
        return redirect('/');
    }

    public function register(){
      return view('Register');
  }

  public function register2(Request $Request){
    $username = $Request->input('username');
    $password = $Request->input('password');
    $fname = $Request->input('fname');
    $lname = $Request->input('lname');

    $email = $Request->input('email');
    $phone = $Request->input('phone');
    $sex = $Request->input('sex');
    $birthday = $Request->input('birthday');

  //echo "$fname,$lname,$address <br/>";
  //DB::insert('insert into members (fname,lname,address) values (?,?,?)',
  //[$fname, $lname, $address]);

  //echo "Data from save into database. <br/>";
  //echo "<a href='login'><p>Back </a>";


  $member = new members;
  $member->username = $username;
  $member->password = $password;
  $member->fname = $fname;
  $member->lname = $lname;

  $member->email = $email;
  $member->phone = $phone;
  $member->sex = $sex;
  $member->birthday = $birthday;
  $member->save();
  return view('login');
  }

  public function Home(request $request, $username){
    $data['User'] ="test";

    if($request->session()->get('check')=="passed"){
       $data['username']=$request->session()->get('username');

       $sql="select*from tb_order where fullname ='$username'";
       $data2['result']=DB::select($sql);

      return view('Home',$data,$data2);
    }else{
      return redirect('login');
    }
  }

}
