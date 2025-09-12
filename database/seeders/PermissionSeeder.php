<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'users']);
        Permission::create(['name' => 'roles']);
        Permission::create(['name' => 'umum']);
        $role = Role::findByName('umum');
        $role->givePermissionTo('umum');
        Permission::create(['name' => 'anak']);
        $role = Role::findByName('anak');
        $role->givePermissionTo('anak');
        Permission::create(['name' => 'gigi_mulut']);
        $role = Role::findByName('gigi_mulut');
        $role->givePermissionTo('gigi_mulut');
        Permission::create(['name' => 'obgyn']);
        $role = Role::findByName('obgyn');
        $role->givePermissionTo('obgyn');
        Permission::create(['name' => 'penyakit_dalam']);
        $role = Role::findByName('penyakit_dalam');
        $role->givePermissionTo('penyakit_dalam');
        Permission::create(['name' => 'saraf']);
        $role = Role::findByName('saraf');
        $role->givePermissionTo('saraf');
        Permission::create(['name' => 'tht']);
        $role = Role::findByName('tht');
        $role->givePermissionTo('tht');
        Permission::create(['name' => 'jantung']);
        $role = Role::findByName('jantung');
        $role->givePermissionTo('jantung');
        Permission::create(['name' => 'mata']);
        $role = Role::findByName('mata');
        $role->givePermissionTo('mata');
        Permission::create(['name' => 'pendaftaran']);
        $role = Role::findByName('pendaftaran');
        $role->givePermissionTo('pendaftaran');
    }
}
