<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;


class UserController extends Controller
{
    //

    public function index(){

        // Has One Through
        /*$users = User::with('companyPhoneNumber')->get();
        dd($users);*/

        // Has One of Many

        $res = User::find(25)->oldestJob()->get();
        dd($res);

        //one to one relation

            /*$user = User::create([
                'name'=>'One to one',
                'email'=>'onetoone@test.com',
                'password'=>'1234567'
            ]);

            $user->contact()->create([
                'address'=>'address1',
                'number'=>'186',
                'city'=>'Rajkot',
                'zip_code'=>'360005'
            ]);*/

            /*$user = User::with('contact')->find(25);
            dd($user);*/

            //get contact data
           /* $user = User::find(25);

            dd($user->contact->address);*/

        //one to one end

        //one to many/BelongsTo start

        //one to many/BelongsTo End
    }
}
