# Overview

---

- [Project Description](/{{route}}/{{version}}/overview/#project-description)
- [Modules](/{{route}}/{{version}}/overview/#modules-list)
- [Roles](/{{route}}/{{version}}/overview/#roles)
- [Services](/{{route}}/{{version}}/overview/#services)
- [Employees](/{{route}}/{{version}}/overview/#employees)
- [Customers](/{{route}}/{{version}}/overview/#settings)
- [Settings](/{{route}}/{{version}}/overview/#settings)
- [Booking Calender](/{{route}}/{{version}}/overview/#booking-calender)
- [Appointments](/{{route}}/{{version}}/overview/#appointments)

<a name="project-description"></a>
## Project Description

This project is based upon an Appointment Management System. This application can has many feature and various modules for the users to use.

This application has various options for users to work with. The options are divided into various modules like:

- Roles
- Employees
- Services
- Customers
- Booking Calender
- Appointment
- Settings

<a name="modules-list"></a>
## Modules

<a name="roles"></a>
### Roles

Every role has some specific tasks to perform and each role has some limitations over accessibility of some functionalities.

There are some default values for roles that are previously inserted:

|   #  | Role Name |
|   :  |     :     |
|   1  |   Admin   |
|   2  |  Employee |
|   3  |  Customer |

<a name="services"></a>
### Services

Every service has some specific fields. Services can be added by Admin and Employee.

| # |    Fields   |   Type  |
| : |       :     |     :   |
| 1 |    Title    |   Text  |
| 2 |   Duration  | Integer |
| 3 | Description |   Text  |
| 4 |    Terms    |   Text  |

<a name="employees"></a>
### Employees

Employees have the second level of access in the appointment management system. The fields that are available during employee registration are:

| # |       Fields     |
| : |          :       |
| 1 |        Name      |
| 2 |       Email      |
| 3 |      Password    |
| 4 | Confirm Password |

<a name="customers"></a>
### Customers

Customers have the least access in the system. Customers can only book and view services. The fields that are required for customer registration are:

| # |       Fields     |
| : |          :       |
| 1 |        Name      |
| 2 |       Email      |
| 3 |      Password    |
| 4 | Confirm Password |

<a name="settings"></a>
### Settings 

Settings module has some options to change the system settings like Admin Email, Languages etc. The options that can be modified in settings module are: 

| # |       Fields     |
| : |          :       |
| 1 |    Admin Email   |
| 2 |      Language    |
| 3 |     Currency     |
| 4 |     Timezone     |

<a name="booking-calender">
### Booking Calender

Booking Calender is a module where customers can book appointment for services by calender view. Here users can see booked slots and available slots for booking according to their services.

<a name="appointments"></a>
### Appointments

Appointments module can be access by Admin, Employees, Customers. If the user is Admin or Employee then he/she can book appointment for customers. Appointments can be booked by available by slots, which consits of Customer Name,  Day, Price, Duration.
