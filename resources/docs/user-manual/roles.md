# Roles
---
- [Description](/{{route}}/{{version}}/roles/#description)
- [Admin](/{{route}}/{{version}}/roles/#admin)
- [Employee](/{{route}}/{{version}}/roles/#employee)
- [Customer](/{{route}}/{{version}}/roles/#customer)
- [Create Roles](/{{route}}/{{version}}/roles/#create-roles)
- [Edit Roles](/{{route}}/{{version}}/roles/#edit-roles)

<a name="description"></a>
## Description

Roles are the type of users that the appointment management system has. Generally the system comes with pre-inserted roles in the Appointment Management System. Those are,

- [Admin](#admin)
- [Employee](#employee)
- [Customer](#customer)

<a name="admin"></a>
### Admin

Admin is the role who has each and every access of project. Generally the system has only one admin but other users can be created with special permissions so that any permission can be given to any user created by admin.

<a name="employee"></a>
### Employee

Employee is the user who have the authority to control services, meanwhile `Create Services`, `Edit Services`, `Delete Services`, `Create Slots`, `Edit Slots`, `Delete Slots`, `Book Appointment`, `Change Settings`, `View Booking History`, `Generate Booking Reports`. An Employee has all of these access.

<a name="customer"></a>
### Customer

By default an user, after registration will be set to an `Customer`. A customer has very limited access in the `Appointment Management System`. A customer can only `View Services`, `Book Appointments`.

<a name="create-roles"></a>
## Create Roles

An admin can create more roles as per requirement. The role creation form consists of following attributes,

| # |    Fields    |
| : |       :      |
| 1 |     Name     |
| 2 | Display Name |
| 3 |  Description |


<a name="edit-roles"></a>
## Edit Roles

Roles can be edited also also. The `Edit Role Form` consists of same fields like `Create Role Form`.
