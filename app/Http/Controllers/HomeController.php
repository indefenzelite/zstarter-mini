<?php
/**
 *
 * @category ZStarter
 *
 * @ref     Defenzelite Product
 * @author  <Defenzelite hq@defenzelite.com>
 * @license <https://www.defenzelite.com Defenzelite Private Limited>
 * @version <zStarter: 202309-V1.2>
 * @link    <https://www.defenzelite.com>
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return User::get();
    }
    public function create()
    {
        return "?username=&password=";
    }
    public function store(Request $request)
    {
        // Standard Create method
        $user = new User();

        if($request->first_name == "pratyush"){
            $user->first_name = "defenzelite";
        }else{
            $user->first_name = $request->first_name;
        }
        
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->roll_no = $request->roll_no;
        $user->save();

        // Normal Create method
        // if($request->first_name == "pratyush"){
        //     $real_name = "defenzelite";
        // }else{
        //     $real_name = $request->first_name;
        // }
        // $user = User::create([
        //     'first_name' => $real_name,
        //     'last_name' => $request->last_name,
        //     'roll_no' => $request->roll_no,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password)
        // ]);

        // Shortcut Create method
        // $data = $request->all();
        // if($data['first_name'] == "pratyush"){
        //     $data['first_name'] = "defenzelite";
        // }

        // $user = User::create($data);

        return "# ".$user->id. "Created Successfully";
    }

    public function edit($id)
    {
        // $user = User::whereId($id)->first();
        // $user = User::where('id',$id)->first();
        // $user = User::where('id','=',$id)->first();
        // $user = User::find($id);

        // if($user){
        //     return $user->first_name;
        // }else{
        //     return "Sorry, no such user";
        // }

        // return @$user->first_name ?? 'Sorry, no such user';

        return $user = User::whereId($id)->firstOrFail();
    }

    public function update(Request $request, $id)
    {
    //   Standard Method
    //   return $request->all();
    //   $user = User::whereId($id)->first();

    //   if(!$user){
    //     return "Sorry, no such user";
    //   }

    //   $user->first_name = $request->first_name;
    //   $user->save();


    // Normal Method
    // User::whereId($id)->update([
    //     'first_name' => $request->first_name,
    //     'last_name' => $request->last_name
    // ]);

    // Shortcut Method
    User::whereId($id)->update($request->all());

      return "Successfully updated";
    }

    public function destroy($id){

        // Standard Method
        $user = User::find($id);
        // Check if user has posts
        $user->delete();

        // Shortcut Method
        User::whereId($id)->delete();

        return "Successfully deleted";
    }
}
