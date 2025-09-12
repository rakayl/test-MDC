<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use Illuminate\Support\Facades\DB;

//model
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $page_title = "All Role";
        $perpage = $request->input('length', 10);
        $data = Role::with('permissions')->when($request->search, function($query, $search) {
                $searchTerms = explode(' ', $search); // Memecah kata pencarian
                return $query->where(function($q) use ($searchTerms) {
                    foreach ($searchTerms as $term) {
                        $q->where(function($subQ) use ($term) {
                                $subQ->where('name', 'like', "%{$term}%");
                        });
                    }
                });
            })
            ->paginate($perpage)
            ->withQueryString();
            foreach ($data as $key => $value) {
                    $role = array();
                    foreach ($value['permissions'] as $va) {
                        $role[] = $va['name'];
                    }
                   $data[$key]['permission'] = $role;
            }
        return view('roles.index', compact(
                'page_title',
                'data',
        ));
    }

     public function create(Request $request)
    {
         
       DB::beginTransaction();
        try {
          $request->validate([
            'name'        => 'required|unique:roles,name',
            ]);

            $role = Role::create(['name' => $request->name]);
          if($role){
            DB::commit();
            return back()->with(['success' => [__('Role created successfully!')]]);
          }
           DB::rollBack();
           return back()->with(['error' => [__('Create Role Failed!')]]);
        } catch (\Throwable $th) {
           DB::rollBack();
           return back()->with(['error' => [__('Create Role Failed!')]]);
        }
    }
    public function update(Request $request)
    {
        
       DB::beginTransaction();
        try {
          $request->validate([
            'edit_name'        => 'required|unique:roles,name,'.$request->id,
        ]);
            $role = Role::where('id',$request->id)->first();
            if(!$role){
                DB::rollBack();
                 return back()->with(['error' => [__('Update Role Failed!')]]);
              }
            $role->update(['name' => $request->edit_name]);
          if($role){
               DB::commit();
            return back()->with(['success' => [__('Role updated successfully!')]]);
          }
           DB::rollBack();
           return back()->with(['error' => [__('Update Role Failed!')]]);
        } catch (\Throwable $th) {
           DB::rollBack();
           return back()->with(['error' => [__('Updates Role Failed!')]]);
        }
    }
    public function delete(Request $request)
    {
        
       DB::beginTransaction();
        try {
          $request->validate([
                 'target'       => "required|string|max:100"
            ]);
           $role = Role::where('id',$request->target)->delete();
          if($role){
             DB::commit();
             return back()->with(['success' => [__('Role Delete successfully!')]]);
          }
            DB::rollBack();
            return back()->with(['error' => [__('Role Delete Failed')]]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with(['error' => [__('Something Went Wrong! Please Try Again.')]]);
        }
    }
     public function permission(Request $request)
    {
        $permission = array();
       DB::beginTransaction();
        try {
          $request->validate([
                'id'        => 'required|exists:roles',
            ]);
            $role = Role::where('id',$request->id)->first();
            if(!$role){
                DB::rollBack();
                 return back()->with(['error' => [__('Update Role Failed!')]]);
              }
            if($request->users){
                $permission[]='users';
            }
            if($request->roles){
                $permission[]='roles';
            }
            if($request->umum){
                $permission[]='umum';
            }
            if($request->anak){
                $permission[]='anak';
            }
            if($request->gigi_mulut){
                $permission[]='gigi_mulut';
            }
            if($request->obgyn){
                $permission[]='obgyn';
            }
            if($request->penyakit_dalam){
                $permission[]='penyakit_dalam';
            }
            if($request->saraf){
                $permission[]='saraf';
            }
            if($request->tht){
                $permission[]='tht';
            }
            if($request->jantung){
                $permission[]='jantung';
            }
            if($request->mata){
                $permission[]='mata';
            }
            if($request->pendaftaran){
                $permission[]='pendaftaran';
            }
            $role->syncPermissions($permission);
          if($role){
               DB::commit();
            return back()->with(['success' => [__('Role updated successfully!')]]);
          }
           DB::rollBack();
           return back()->with(['error' => [__('Update Role Failed!')]]);
        } catch (\Throwable $th) {
           DB::rollBack();
           return back()->with(['error' => [__('Updates Role Failed!')]]);
        }
    }
}
