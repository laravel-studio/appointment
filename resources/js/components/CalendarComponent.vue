<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10">
        <div class="add-events-btn text-right">
          <button class="btn btn-md btn-primary" @click="isShowing = !isShowing">Add Appointment</button>
          <hr/>
        </div>
        <form @submit.prevent v-show="isShowing">


          <div class="form-group">
            <label for="event_name">Service Name</label>
            <!-- <input type="text" id="event_name" class="form-control" v-model="newEvent.event_name"> -->

            <!-- <input list="options" name="Service-name" @change="onChange($event)" class="form-control">
              <datalist id="options">
                <option 
                  v-for="original in originalEvents" 
                  :key="original.id" 
                  :value="original.id"
                >
                {{original.title}}
                </option>
              </datalist>  -->

            <select name="Service-name" @change="onChange($event)" class="form-control" v-model="service">
              <option disabled selected>Select your option</option>
              <option 
              v-for="original in originalEvents" 
              :key="original.id" 
              :value="original.id">
              {{original.title}}
              </option>
            </select>
          </div>
          <ul>
            <li v-for=" services in serviceItem" :key="services.id">
              <table class="table-data">
                <thead>
                  <tr>
                    <th>Customer</th>
                    <th>Price($)</th>
                    <th>Duration</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> {{services.employee_name}}</td>
                    <td>{{services.service_price}}</td>
                    <td>{{services.service_duration}}</td>
                    <td><button class="btn btn-sm btn-primary" @click="isSelect = !isSelect">Select</button></td>
                  </tr>
                </tbody>
              </table>
            </li>
          </ul>
          <div class="row" v-show="isSelect">
            <div class="col-md-6">
              <div class="form-group">
                <label for="event_start_time">Start Date</label>
                <date-picker 
                type="date" 
                id="start_time" 
                v-model="newEvent.start_date"
                lang="en" 
                format="YYYY-MM-DD"
                placeholder= "Select Start Date"
                width= "100%"
                >
                </date-picker>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="event_start_time">Start Time</label>
                <date-picker 
                type="time" 
                id="event_start_time" 
                v-model="newEvent.start_date"
                lang="en" 
                format="HH:mm a"
                :time-picker-options="TimePickerOptions"
                placeholder= "Select Start Time"
                width= "100%"
                >
                </date-picker>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="event_end_date">End Date</label>
                <date-picker 
                type="date" 
                id="event_end_date" 
                v-model="newEvent.end_date"
                lang="en" 
                format="YYYY-MM-DD"
                placeholder= "Select End Date"
                width= "100%"
                >
                </date-picker>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="event_start_time">End Time</label>
                <date-picker 
                type="time" 
                id="event_end_time" 
                v-model="newEvent.end_date"
                lang="en" 
                format="HH:mm a"
                :time-picker-options="TimePickerOptions"
                placeholder= "Select End Time"
                width= "100%"
                >
                </date-picker>
              </div>
            </div>
            <div class="col-md-6 mb-4" v-if="addingMode">
              <button class="btn btn-sm btn-primary" @click="addNewEvent" >Save Event</button>
            </div>
            <template v-else>
              <div class="col-md-6 mb-4">
                <button class="btn btn-sm btn-success" @click="updateEvent">Update</button>
                <button class="btn btn-sm btn-danger" @click="deleteEvent">Delete</button>
                <button class="btn btn-sm btn-secondary" @click="cancelForm">Cancel</button>
              </div>
            </template>
          </div>

        </form>
        
      </div>

      <div class="col-sm-10">
        <Fullcalendar
        @eventClick="($event) => showEvent($event.event.id)" 
        :plugins="calendarPlugins" 
        :events="events"/>
      </div>

    </div>
  </div>
</template>

<script>
import Fullcalendar from "@fullcalendar/vue";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import axios from "axios";
import DatePicker from "vue2-datepicker"
import { Events } from '../store';
import moment from 'moment';
let service_url = process.env.MIX_SERVICE_URL + '/public/api'

export default {
  components: {
    Fullcalendar,
    DatePicker,
  },
  data() {
    return {
      calendarPlugins: [dayGridPlugin, interactionPlugin],
      events: [],
      service: {},
      serviceItem:[],
      originalEvents: [],
      newEvent: {},
      addingMode: true,
      isShowing: false,
      isSelect: false,
      TimePickerOptions: {
        start: '00:00',
        step: '00:30',
        end: '23:30'
      }
    };
  },
  mounted() {
    this.getEvents();
  },
  methods: {
    
     getEvents() {
       axios
         .get( service_url + '/services/all')
         .then(response =>
         {
           this.originalEvents = [...response.data.data];
           const events = response.data.data.map(item => {
             return {
               title: item.event_name,
               start: item.time_start,
               end: item.time_end,
               id: item.id
             }
           });
           console.log(events)
           this.events = events;
         })
         .catch(err => console.log(err.response.data.data));
     },
     onChange(e) {
      console.log(e.target.value);
        axios.get(service_url + '/services/employees/' + e.target.value)
        .then(resp => {
          this.serviceItem = [...resp.data.data]
          const service = resp.data.data.map(items => {
            return {
              empid: items.employee_service_id,
              empname: items.employee_name,
              price: items.service_price,
              duration: items.service_duration
            }
          });
          console.log(service)
        })
        .catch(error => console.log(resp.data.data))
     },
    addNewEvent() {
      const event = {...this.newEvent};
      const payload = {
        event_name: event.event_name,
        time_start: moment(event.start_date).utc().format(),
        time_end: moment(event.end_date).utc().format()
      }
      axios
        .post("http://localhost:3000/events",  payload)
        .then(data => 
        {
          this.getEvents(); // update our list of events
          this.resetForm(); // clear newEvent properties (e.g. title, date, start_time and end_time)
        })
        .catch(err =>
          console.log("Unable to add new event!", err.response.data)
        );
    },
    showEvent(eventId) {
      const event = this.originalEvents.find(event => event.id === +eventId);
      console.log(event);
      this.newEvent = {
        event_name: event.event_name,
        id: event.id,
        start_date: new Date(event.time_start),
        end_date: new Date(event.time_end)
      }
      this.addingMode = false;
    },
    updateEvent() {
      const event = {...this.newEvent};
      const id = event.id;
      delete event.id;
      const payload = {
        event_name: event.event_name,
        time_start: moment(event.start_date).utc().format(),
        time_end: moment(event.end_date).utc().format()
      }
      axios
        .put(`http://localhost:3000/events/${id}`, {...payload})
        .then(resp => {
          this.resetForm();
          this.getEvents();
          this.addingMode = !this.addingMode;
        })
        .catch(err =>
          console.log("Unable to update event!", err.response.data)
        );
    },
    deleteEvent() {
      axios
        .delete(`http://localhost:3000/events/${this.newEvent.id}`)
        .then(resp => {
          this.resetForm();
          this.getEvents();
          this.addingMode = !this.addingMode;
        })
        .catch(err =>
          console.log("Unable to delete event!", err.response.data)
        );
    },
    cancelForm() {
      const event = {...this.newEvent};
      const id = event.id;
      delete event.id;
      axios.get("http://localhost:3000/events")
      .then(resp => {
        this.resetForm();
        this.getEvents();
        this.addingMode = !this.addingMode;
      })
    },
    resetForm() {
      Object.keys(this.newEvent).forEach(key => {
        return (this.newEvent[key] = "");
      });
    }





  },
 
};
</script>

<style lang="css">
@import "~@fullcalendar/core/main.css";
@import "~@fullcalendar/daygrid/main.css";
.fc-title {
  color: #fff;
}
.fc-title:hover {
  cursor: pointer;
}
.fc-view-container .fc-view > table {
  border: 1px solid #ddd;
}
.table-data {
  width: 100%;
}
.table-data tbody {
  background: #fff;
}
.table-data thead {
  background-color: #3c8dbc;
  color: #fff;
}
.table-data td {
  width: 28%;
  text-align: center;
  padding: 10px;
  border: 1px solid #ddd;
}
.table-data th {
  width: 28%;
  text-align: center;
  padding: 10px;
}
li {
  list-style: none;
}
ul {
  padding: 0;
}
/* #start_time .mx-input-wrapper .mx-input-append .mx-calendar-icon {
  display: none;
}
#start_time .mx-input-wrapper .mx-input-append::before {
  content: '\f073';
  position: absolute;
  left: 8px;
  top: 10px;
  color: #555;
  display: inline-block;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: inherit;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
} */
</style>