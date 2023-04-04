<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->delete();

        $role = Role::where('name', 'admin')->firstOrFail();

        $permissions = Permission::all();

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );

        // $role = Role::where('name', 'caja_jefe_seccion')->firstOrFail();
        // $permissions = Permission::whereRaw("  table_name = 'admin' or
        //                                         `key` = 'browse_planillaspagos' or
        //                                         `key` = 'browse_paymentschedules' or
        //                                         `key` = 'read_paymentschedules' or
        //                                         `key` = 'read_centralize_paymentschedules' or
        //                                         `key` = 'enable_paymentschedules' or
        //                                         `key` = 'close_paymentschedules' or
        //                                         table_name = 'plugins' or
        //                                         table_name = 'planillas_adicionales' or
        //                                         table_name = 'reports_cachiers' or
        //                                         `key` = 'browse_reportspaymentschedulesdetails-status'")->get();
        // $role->permissions()->sync($permissions->pluck('id')->all());
    }
}
