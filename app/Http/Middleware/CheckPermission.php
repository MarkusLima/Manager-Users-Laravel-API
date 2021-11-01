<?php

namespace App\Http\Middleware;

use App\model\Permission;
use App\model\PermissionUser;
use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $allPermission = Permission::all();
        if (empty($allPermission[0]->id)) {
            return $next($request);
        }

        $permissions = PermissionUser::with('permission')->where('user_id', $request->user()->id)->get();

        if (!empty($permissions[0]->permission->id)) {

            foreach ($permissions as $permission) {
                $request_url = preg_replace('/[0-9]+/', '', $request->server()['REQUEST_URI']);

                if(substr($request_url, -1) === '/'){
                    $request_url = substr($request_url, 0, -1);
                }

                if ($permission->permission->permission_url == $request_url) {
                    return $next($request);
                }
            }
            dd([
                'success' => 'false',
                'msg' => 'Do not have permission for this route!'
            ]);
        } else {
            dd([
                'success' => 'false',
                'msg' => 'Do not have permission cadastrada!'
            ]);
        }
    }
}
