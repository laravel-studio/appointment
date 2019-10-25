# Booking Calender
---
 - [Description](/{{route}}/{{version}}/bookingcalender/#description)
 - [Code](/{{route}}/{{version}}/bookingcalender/#code)

<a name="description"></a>
## Description

This `module` is developed with `Vue.js`. Please visit coding part to know more about this module.

<a name="code"></a>
## Code

### Route

`web.php`
```php
Route::get('/booking/calendar', 'BookingController@calendar');
```

### Controller

`BookingController.php`
```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Calender View
    public function calendar()
    {
    	 return view('booking.calender');
    }
}
```

### Vue Component

`resources/app.js`
```javascript
Vue.component('calendar-component', require('./components/CalendarComponent.vue').default);
```

Visit component code at `resources/components/CalenderComponent.Vue` to know more about the functionality.
