# Settings
---
 - [Database](/{{route}}/{{version}}/settings/#database)
 - [Routes](/{{route}}/{{version}}/settings/#routes)
 - [Controller](/{{route}}/{{version}}/settings/#controller)
 - [Model](/{{route}}/{{version}}/settings/#model)

<a name="database"></a>
## Database

| # | Fields | Type | Default |
| : | :- | :- | :- |
| 1 | Id | Big Integer | None |
| 1 | Option Key | longText | Null |
| 2 | Option Value | longText | Null |
| 3 | Created At | Timestamp | Null |
| 4 | Updated At | Timestamp | Null |

<a name="routes"></a>
## Routes

### Settings Route List
`web.php`
```php
// Settings Index
Route::get('/settings','SettingsController@index');
// Settings Store
Route::post('/settings','SettingsController@store');
// Settings Update
Route::patch('/settings/save','SettingsController@updateval');
```

<a name="controller"></a>
## Controller

`SettingsController.php`
```php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\DB;
class SettingsController extends Controller
{
    // Settings Index
    public function index()
    {
        // old admin email value
        $settings_email = Setting::select('option_value')->where('option_key', 'admin_email')->get();
        $settings_email_val = $settings_email[0]['option_value'];

        // old site language value
        $settings_language = Setting::select('option_value')->where('option_key', 'language')->get();
        $settings_language_val = $settings_language[0]['option_value'];

        // old site timezone value
        $settings_timezone = Setting::select('option_value')->where('option_key', 'timezone')->get();
        $settings_timezone_val = $settings_timezone[0]['option_value'];

        // old currency value
        $settings_currency = Setting::select('option_value')->where('option_key', 'currency')->get();
        $settings_currency_val = $settings_currency[0]['option_value'];


    	return view('settings.index', compact('settings_email_val', 'settings_language_val', 'settings_timezone_val', 'settings_currency_val'));
    }

    // Settings Create
    public function create()
    {
        return view('settings.index');
    }

    // Settings Store
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'language' => 'required',
            'timezone'=>'required',
            'currency'=>'required'
        ]);

        Setting::create($request->all());

        return redirect()->route('settings.index')
                        ->with('success','Settings created successfully.');
    }

    // Settings Update AJAX
    public function updateval(Request $request)
    {
        if ($request->ajax())
        {
            $inputs=($request->input());
            unset($inputs['_token']);
            unset($inputs['_method']);
            $data=array();
            $i=0;
            foreach ($inputs as $key => $value) {

                $data[$i]['option_key']=$key;
                $data[$i]['option_value']=$value;
                $i++;
                $settings = Setting::firstOrNew(array('option_key' =>$key));
                $settings->option_key = $key;
                $settings->option_value = $value;
                $settings->save();
            }
            return response(['status' => true, 'code' => 200,'message'=>"settings updated"], 200);
        }
        return response(['status' => false, 'code' => 403,], 403);
        die();

    }
}

```

<a name="model"></a>
## Model

`Setting.php`
```php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = ['email', 'language','timezone','currency'];
}

```
