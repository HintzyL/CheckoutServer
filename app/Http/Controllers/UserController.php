<?php

namespace App\Http\Controllers;

use App\Models\UserApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getUsers() {
        $users = UserApp::all();
        $users_tab = [];

        foreach ($users as $user) {
            $temp = [];

            $temp["id"] = $user->id;
            $temp["name"] = $user->name;
            $temp["firstname"] = $user->firstname;
            $temp["gender"] = $user->gender;
            $temp["description"] = $user->description;
            $temp["birthday"] = $user->birthday;

            $users_tab[] = $temp;
        }

        return json_encode($users_tab);
    }

    public function getUser(Request $request) {
        $name = $request->get("name");
        $firstname = $request->get("firstname");
        $birthday = $request->get("birthday");

        $user = UserApp::where(['name' => $name, 'firstname' => $firstname, 'birthday' => $birthday])->first();

        $temp = [];

        $temp["id"] = $user->id;
        $temp["name"] = $user->name;
        $temp["firstname"] = $user->firstname;
        $temp["gender"] = $user->gender;
        $temp["description"] = $user->description;
        $temp["birthday"] = $user->birthday;

        return json_encode($temp);
    }

    public function addUser(Request $request) {
        $name = $request->get("name");
        $firstname = $request->get("firstname");
        $birthday = $request->get("birthday");

        if ( UserApp::where(['name' => $name, 'firstname' => $firstname, 'birthday' => $birthday])->exists() ) {
            return [false, "user already exists"];
        }

        $gender = $request->get("gender");
        $description = $request->get("description");

        $new_user = new UserApp();
        $new_user->name = $name;
        $new_user->firstname = $firstname;
        $new_user->gender = $gender;
        $new_user->description = $description;
        $new_user->birthday = $birthday;

        $new_user->save();

        return [true, "user correctly saved"];
    }
}
