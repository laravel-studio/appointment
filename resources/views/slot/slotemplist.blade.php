@foreach($users as $user)
    <input type="radio" name="employee_service_id" value="{{$user->service_id}}">{{$user->name}}<br>
@endforeach
