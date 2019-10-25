# Roles
---
- [Database Table Structure](/{{route}}/{{version}}/roles/#database-table-structure)
- [Route](/{{route}}/{{version}}/roles/#route)
- [Controller](/{{route}}/{{version}}/roles/#controller)
- [Model](/{{route}}/{{version}}/roles/#model)

<a name="database-table-structure"></a>
## Database Table Structure

| # | Name | Type | Default |
| : | :- | :- | :- |
| 1 | Id | Integer | None |
| 2 | Name | Varchar | None | 
| 3 | Display Name | Varchar | Null |
| 4 | Description | Varchar | Null |
| 5 | Created At | Timestamp | Null |
| 6 | Updated At | Timestamp | Null |
| 7 | Deleted At | Timestamp | Null |

<a name="route"></a>
## Route

### Role Routes
```php
// Role List
Route::get('/roles','RoleController@index');
// Role Create
Route::get('/roles/create', 'RoleController@create');
// Role Store
Route::post('roles/store', 'RoleController@store');
// Role Edit
Route::get('roles/edit/{role}', 'RoleController@edit');
// Role Update
Route::patch('roles/update/{role}', 'RoleController@update');
```

<a name="controller"></a>
## Controller

Below `code` decribe the `controller` of the `roles` module.

```php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;
use App\Exports\RolesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
class RoleController extends Controller
{

    // Roles List
    public function index()
    {
        $role = Role::get();
        return view('role.lists', compact('role'));
    }

    // Role Create
    public function create()
    {
        $permissions = Permission::all();

        return view('role.create', compact('permissions'));

    }

    // Store Roles
    public function store(Request $request)
    {

        $request['name']=str_replace(' ','-',strtolower($request->name));
        $role = Role::create($request->except('permission_id', '_token'));

        foreach($request->permission as $key=>$value)
        {
            $role->attachPermission($value);
        }

        return redirect('/roles')->with('success','Role created successfully!');
    }
 
    // Edit Roles
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $role_permissions = $role->perms()->pluck('id', 'id')->toArray();

        return view('role.edit', compact('role', 'permissions', 'role_permissions'));
    }

    // Update Roles
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        DB::table('permission_role')->where('role_id', $id)->delete();

        foreach ($request->permission as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect('/roles')->with('info','Role updated successfully!');
    }

    // Delete Roles
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect('/roles')->with('error', 'Role trashed successfully!');
    }

    // Download Roles as Excel
    public function exportexcel()
    {
        return Excel::download(new RolesExport, 'roles.xlsx');
    }
}
```

<a name="model"></a>
## Model

Below `code` describes the code of the model.

```php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends EntrustRole
{
    use SoftDeletes;

    // declaring fillable fields for roles table

    protected $fillable = [ 'name', 'display_name', 'description' ];
    protected $dates = ['deleted_at'];

    /**
     * Role edit path return for testing
     */
    public function updatePath()
    {
        return "roles/update/{$this->id}";
    }
}

```
