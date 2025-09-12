<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolePermissionSeeder extends Seeder
{
    protected static ?string $password;
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('admin');
        Role::create(['name' => 'customer']);
        Role::create(['name' => 'umum']);
        $user = User::create([
            'name' => 'umum',
            'email' => 'umum@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('umum');
        Role::create(['name' => 'anak']);
        $user = User::create([
            'name' => 'anak',
            'email' => 'anak@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('anak');
        Role::create(['name' => 'gigi_mulut']);
        $user = User::create([
            'name' => 'gigi_mulut',
            'email' => 'gigi_mulut@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('gigi_mulut');
        Role::create(['name' => 'obgyn']);
        $user = User::create([
            'name' => 'obgyn',
            'email' => 'obgyn@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('obgyn');
        Role::create(['name' => 'penyakit_dalam']);
        $user = User::create([
            'name' => 'penyakit_dalam',
            'email' => 'penyakit_dalam@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('penyakit_dalam');
        Role::create(['name' => 'saraf']);
        $user = User::create([
            'name' => 'saraf',
            'email' => 'saraf@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('saraf');
        Role::create(['name' => 'tht']);
        $user = User::create([
            'name' => 'tht',
            'email' => 'tht@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('tht');
        Role::create(['name' => 'jantung']);
        $user = User::create([
            'name' => 'jantung',
            'email' => 'jantung@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('jantung');
        Role::create(['name' => 'mata']);
        $user = User::create([
            'name' => 'mata',
            'email' => 'mata@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('mata');
        Role::create(['name' => 'pendaftaran']);
        $user = User::create([
            'name' => 'pendaftaran',
            'email' => 'pendaftaran@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('pendaftaran');
        
    }
}
