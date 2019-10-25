# Services
---
- [Database](/{{route}}/{{version}}/services/#database)
- [Routes](/{{route}}/{{version}}/services/#routes)
- [Controller](/{{route}}/{{version}}/services/#controller)
- [Model](/{{route}}/{{version}}/services/#model)

<a name="database"></a>
## Database

The database structure of `services` table is as follows,

| # | Field | Type | Default |
| : | :- | :- | :- |
| 1 | Id | Integer | None |
| 2 | Title | Text | None |
| 3 | Duration | Double | None |
| 4 | Description | longText | None |
| 5 | Terms | longText | None |
| 6 | Created At | Timestamp | Null |
| 7 | Updated At | Timestamp | Null |
| 8 | Deleted At | Timestamp | Null |

<a name="routes"></a>
## Routes

### Service Route List
```php
Route::resource('services','ServiceController');
```

<a name="controller"></a>
## Controller

Below `code` describes `ServiceController`

```php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
class ServiceController extends Controller
{
    // Service List
    public function index(){
    	$services = Service::all();
        return view('services.index', compact('services'));
    }

    // Service Create
    public function create(){

    	return view('services.create');
    }

    // Service Store
    public function store(Request $request)
    {
        $request->validate([
            'title'         =>  'required',
            'duration'      =>  'required|numeric',
            'description'   =>  'required',
            'terms'         =>  'required'
        ]);
        Service::create($request->all());

        return redirect()->route('services.index')
                        ->with('success','Service created successfully.');
    }

    // Service Edit
    public function edit(Service $service)
    {
        return view('services.edit',compact('service'));
    }

    // Service Update
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'         =>  'required',
            'duration'      =>  'required|numeric',
            'description'   =>  'required',
            'terms'         =>  'required'
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')
                        ->with('info','Service updated successfully');
    }

    // Service Delete
    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('services.index')
                        ->with('error','Service deleted successfully');
    }

    // Service Show
    public function show(Service $service)
    {

        return view('services.index', compact('service'));
    }

    // Service List as JSON Response for AJAX data passing
    public function list(){
        $services = Service::all();

        return response()->json($services);

    }

}

```


<a name="model"></a>
## Model

Below `code` describes the `Service` model,

```php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Employeeservice;
class Service extends Model
{
	use SoftDeletes;
    protected $fillable = ['title', 'duration','description','terms'];

    public function editPath()
    {
        return "services/{$this->id}";
    }
}

```
