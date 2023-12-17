<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
    Контроллер страницы профиля
*/

class ProfileController extends Controller
{
    //Отображение страницы профиля
    function index(){
        $books = Book::where('user_id', Auth::user()->id)->get();
        return view('profile.profile', compact('books'));
    }


    //Обновление данных авторизованного пользователя
    function profile_update(Request $request){
        $inputs = $request->only(['password', 'isAdmin']);

        //Обновление профиля, если заполнено поле ввода
        if(strlen($inputs['password']) != 0){
            Auth::user()->password = Hash::make($inputs['password']);
        }

        Auth::user()->isAdmin = array_key_exists('isAdmin', $inputs) ? true : false;
        Auth::user()->save();

        return redirect()->route('books');
    }
}
