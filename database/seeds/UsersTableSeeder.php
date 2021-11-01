<?php

use App\model\Address;
use App\model\Permission;
use App\model\PermissionUser;
use App\model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            //code...
            DB::beginTransaction();

            $user = User::create([
                'name' => 'adm',
                'email' => 'adm@adm.com',
                'email_verified_at' => now(),
                'password' => '123123123',
                'remember_token' => Str::random(10),
            ]);

            foreach ((Route::getRoutes()->getRoutes()) as $route) {
                if (strpos($route->uri, '/{')) {
                    $route = $route->uri;
                    $posicao = strpos($route, '/{');
                    $route = substr($route, 0, $posicao);
                } else {
                    $route = $route->uri;
                }
                if (!Permission::where('permission_url', '/'.$route)->first()) {
                    $permission = Permission::create([
                        'permission_name' => 'access',
                        'permission_url' => '/'.$route
                    ]);

                    PermissionUser::create([
                        'user_id' => $user['id'],
                        'permission_id'=> $permission['id']
                    ]);
                }
            }

            $address = Address::create([
                'place'=> 'Rua dos Sonhos',
                'number' => 's/n',
                'district' => 'Meu Mundinho',
                'complement'=> 'sem complemento',
                'zipcode' => '22001-001'
            ]);

            User::whereId($user['id'])->update(['address_id'=> $address['id']]);


            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}
