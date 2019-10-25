<form action="/appointments/book" method="POST">
    @csrf
    <div class="col-md-12 service-list">
        @forelse($users as $user)
            <div class="card border col-md-3 p-3 emp" data-slot-id="{{$user->slot_id}}" data-slot-day="{{$user->slot_day}}"   data-emp-id="{{$user->id}}" data-empservice-id="{{$user->service_id}}" data-service-price="{{$user->price}}"  data-service-start="{{$user->slot_start_time}}" data-service-duration="{{$user->duration}}" style="width:30rem; border:1px solid #ccc;padding:10px; margin-right:5px;cursor:pointer">
                <div class="card-body">
                    <div class="col-md-3">
                    <img src="{{ asset('images/') }}/{{$user->profileimage!=''?$user->profileimage:'default.png'}}" class="img-circle" style="width:80px;" alt="User Image">
                    </div>
                    <div class="col-md-9">
                        <h6 class="card-subtitle text-muted list-group-item"><small>By </small>{{$user->name}}</h6>
                        <p class="card-text list-group-item">Price: <b>{{$user->price}}</b></p>
                    </div>
                </div>
            </div>
            @empty
                <div>No Slots Available.</div>
        @endforelse
    </div>
    <div class="service-details form-group col-md-12" style="display:none; margin-top:25px;">
        <input type="hidden" name="slot_id" class="form-control days" id="slot_id">
        @if(Auth::user()->type==3)
            <label for="user_id">Your Id:</label>
            <input type="text" name="user_id" class="form-control days" id="user_id" value="{{Auth::id()}}" readonly>
            <input type="hidden" class="form-control" name="status" value="0">
        @else
            <label for="user_id">{{__('Select Customer:')}}</label>
            <select name="user_id" id="user_id" class="form-control" style="margin: 10px 0;">
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{ $customer->name }}</option>
                    @endforeach
            </select>
            <input type="hidden" class="form-control" name="status" value="1">
        @endif
        <div class="form-group col-md-3">
            <label for="day">{{__('Day:')}}</label>
            <input type="text" name="slot_day" class="form-control days" id="slot_day" disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="start_time" id="fromtime">{{__('From:')}}</label>
            <input type="time" name="start_time" class="form-control fromtime" id="start_time" readonly>
        </div>
        <div class="form-group col-md-3">
            <label for="end_time">{{__('Service Duration:')}}</label>
            <input type="text" name="duration" class="form-control duration" id="duration" readonly>
        </div>
        <div class="form-group col-md-3">
            <label for="appointment_price">{{__('Price:')}}</label>
            <input type="text" class="form-control price" name="appointment_price" id="appointment_price" disabled>
        </div>
        <div class="form-group col-md-6">
            <label for="appointment_date">{{__('Date:')}}</label>
            {{-- <input type="date" name="appointment_date" class="form-control" id="appointment_date"> --}}
            <div id="app_date"><input type="text" name="appointment_date" class="form-control" id="datepicker" readonly></div>
        </div>
        <div class="form-group col-md-6">
            <label for="init_time">{{__('Start Time:')}}</label>
            <input type="time" class="form-control init_time" name="init_time" id="init_time">
            <input type="hidden" class="form-control ending_time" name="ending_time" id="ending_time" readonly>
        </div>
        <div class="form-group col-md-12">
            <button type="submit" name="submit" class="btn btn-primary">Book Appointment</button>
        </div>
    </div>
</form>
