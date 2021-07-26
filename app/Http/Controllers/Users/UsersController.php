<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // Standar responses
    use ApiResponser;

    public function __construct()
    {
        //
    }

    /**
     * Return a Book's list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return $this->validResponse($users);
    }

    /**
     * Create an instance of Book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules =[
            'name'=> 'max:255',
            'email'=> 'email|unique:users,email',
            'password'=> 'min:8|confirmed',
        ];

        $this->validate($request,$rules);
        $fields = $request->all();
        $fields['password'] = Hash::make($request->password);
        $user = User::create($fields);
        return $this->successResponse($user,Response::HTTP_CREATED);
    }


    /**
     * Return an specific Book
     * @return Illuminate\Http\Response
     */
    public function show($user){
       $user = User::findOrFail($user);
       return $this->successResponse($user);
    }

    /**
     * Update an especific book data
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $user){
        $rules =[
            'name'=> 'required|max:255',
            'email'=> 'required|email|unique:users,email,'. $user,
            'password'=> 'required|min:8|confirmed',
        ];

        $this->validate($request,$rules);

        $user = User::findOrFail($user);

        $user->fill($request->all());
        
        if($request->has('password')){
            $user->password = Hash::make($request->password);
        }


        // Validate if user has changed its data
        if($user->isClean()){
            return $this->errorResponse('At least one value must change',Response::HTTP_UNPROCESSABLE_ENTITY); //422
        }

        $user->save();

        return $this->successResponse($user);
    }

    /**
     * Delete an specific book data
     * @return Illuminate\Http\Response
     */
    public function delete($user){
       $user  = User::findOrFail($user);
       $user->delete();
       return $this->successResponse($user);
    }

    /**
     * Identifies current user
     * @return Illuminate\Http\Response
     */
    public function me(Request $request){
      
       return $this->successResponse($request->user());
    }
}