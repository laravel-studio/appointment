<form action="{{url('/')}}/appointments/book" method="POST">
    @csrf
    <div class="col-md-12 service-list">
        @forelse($users as $user)
            <div class="card border col-md-3 p-3 emp" data-slot-id="{{$user->slot_id}}" data-slot-day="{{$user->slot_day}}"   data-emp-id="{{$user->id}}" data-empservice-id="{{$user->service_id}}" data-service-price="{{$user->price}}"  data-service-start="{{$user->slot_start_time}}" data-service-duration="{{$user->duration}}" style="width:30rem; border:1px solid #ccc;padding:10px; margin-right:5px;cursor:pointer">
                <div class="card-body mb-2">
                    <div class="col-md-3">
                    <img src="{{ asset('images/') }}/{{$user->profileimage!=''?$user->profileimage:'default.png'}}" class="img-circle" style="width:80px;" alt="User Image">
                    </div>
                    <div class="col-md-9">
                        <h6 class="card-subtitle text-muted list-group-item"><small>By </small>{{ucwords($user->name)}}</h6>
                        <p class="card-text list-group-item">{{__('Price:')}} <b>{{$user->price}}</b> | <small>{{$user->slot_day}}</small><br><span style="border-top:1px solid #ddd;"><b>Start Time: </b> {{$user->slot_start_time}}</span></p>
                    </div>
                </div>
            </div>
            @empty
                <div>{{__('messages.no_slots_available')}}</div>
        @endforelse
    </div>
    <div class="service-details form-group" style="display:none; margin-top:25px;">
        <input type="hidden" name="slot_id" class="form-control days" id="slot_id">
        @if(Auth::user()->type==3)
        <div class="form-group col-md-12">
            <label for="user_id">{{__('messages.your_id')}}:</label>
            <input type="text" name="user_id" class="form-control days" id="user_id" value="{{Auth::id()}}" readonly>
            <input type="hidden" class="form-control" name="status" value="0">
        </div>
        @else
            <div class="form-group col-md-12">
                <label for="user_id">{{__('messages.select_customer')}}</label>
            </div>
            <div class="form-group col-md-12">
                <select name="user_id" id="user_id" class="form-control available_customers" style="margin: 10px 0;">
                        <option value="">Select</option>
                        @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{ $customer->name }}</option>
                        @endforeach
                </select>
            </div>
            <input type="hidden" class="form-control" name="status" value="1">
        @endif
        <div class="form-group col-md-3">
            <label for="day">{{__('messages.day')}}</label>
            <input type="text" name="slot_day" class="form-control days" id="slot_day" disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="start_time" id="fromtime">{{__('messages.from')}}</label>
            <input type="time" name="start_time" class="form-control fromtime" id="start_time" readonly>
        </div>
        <div class="form-group col-md-3">
            <label for="end_time">{{__('messages.service_duration')}}</label>
            <input type="text" name="duration" class="form-control duration" id="duration" readonly>
        </div>
        <div class="form-group col-md-3">
            <label for="appointment_price">{{__('messages.price')}}</label>
            <input type="text" class="form-control price" name="appointment_price" id="appointment_price" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="appointment_date">{{__('messages.date')}}</label>
            <div id="app_date"><input type="text" name="appointment_date" class="form-control" id="appointment_date" readonly></div>
        </div>
        <div class="form-group col-md-6">
            <label for="init_time">{{__('messages.start_time')}}</label>
            <div id="app_time"><input type="text" class="form-control" name="init_time" id="init_time" readonly></div>
            <input type="hidden" class="form-control ending_time" name="ending_time" id="ending_time" readonly>
        </div>
        <div class="form-group col-md-12">
            <button type="submit" name="submit" class="btn btn-primary">{{__('messages.book_appointment')}}</button>
        </div>
    </div>
</form>
