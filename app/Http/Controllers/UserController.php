<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\Response;

//model
use App\Models\User;
use Spatie\Permission\Models\Role;

//service
use App\Services\User\StoreUser;
use App\Services\User\DeleteUser;
use App\Services\User\UpdateUser;

//request
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index(Request $request)
    {
        $page_title = "All User";
        $perpage = $request->input('length', 10);
        $data = User::with(['roles' => function($query) {
                    $query->select('name')->take(1); // Get only the first role
                }])->when($request->search, function($query, $search) {
                $searchTerms = explode(' ', $search); // Memecah kata pencarian
                return $query->where(function($q) use ($searchTerms) {
                    foreach ($searchTerms as $term) {
                        $q->where(function($subQ) use ($term) {
                                $subQ->where('name', 'like', "%{$term}%");
                        });
                    }
                });
            })
            ->when($request->roles, function($query, $roles) {
                $query->role($roles);
            })
            ->orderBy('id', 'desc')
            ->paginate($perpage)
            ->withQueryString();
            foreach ($data as $key => $value) {
                    $role = null;
                    foreach ($value['roles'] as $va) {
                        $role = $va['name'];
                    }
                    $data[$key]['role'] = $role;
            }
        $roles = Role::where('name', '!=', 'customer')->get();
        $roless = Role::all();
        return view('user.index', compact(
            'page_title',
            'data',
            'roles',
            'roless',
        ));
    }
    public function create(StoreUserRequest $request)
    {
        try {
          $service = (new StoreUser($request))->call();
          if($service){
            return back()->with(['success' => [__('User created successfully!')]]);
          }
           return back()->with(['error' => [__('Create User Failed!')]]);
        } catch (\Throwable $th) {
           return back()->with(['error' => [__('Create User Failed!')]]);
        }
    }
    public function update(UpdateUserRequest $request)
    {
        try {
         $service = (new UpdateUser($request))->call();
          if($service){
            return back()->with(['success' => [__('User updated successfully!')]]);
          }
           return back()->with(['error' => [__('Update User Failed!')]]);
        } catch (\Throwable $th) {
           return back()->with(['error' => [__('Update User Failed!')]]);
        }
    }
    
    public function delete(DeleteUserRequest $request)
    {
        try {
          $service = (new DeleteUser($request))->call();
          if($service){
             return back()->with(['success' => [__('User Delete successfully!')]]);
          }
            return back()->with(['error' => [__('User Delete Failed')]]);
        } catch (\Throwable $th) {
            return back()->with(['error' => [__('Something Went Wrong! Please Try Again.')]]);
        }
    }
}
