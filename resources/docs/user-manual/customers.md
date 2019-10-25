# Customers
---
- [Description](/{{route}}/{{version}}/customers/#description)
- [Add Customer](/{{route}}/{{version}}/customers/#add-customer)
- [Edit Customer](/{{route}}/{{version}}/customers/#edit-customer)
- [Delete Customer](/{{route}}/{{version}}/customers/#delete-customer)

<a name="description"></a>
## Description

This module is accessible by `admin` and `employees`. Here `customers` can be added from `admin` and `employee` side. This module is create to have an option in the system that if any individual is unable to register to the system as a `customer` then he/she can request `admin` or `employee` to create his/her profile on special request.

<a name="add-customer"></a>
## Add Customer

`Add Customer` option consist of basic details like `name`, `email`, `password` etc. Although customers can `change` their password later after profile is created. The fields of `add customer` form is as follows,

| # |      Fields      | 
| : |         :        |
| 1 |       Name       |
| 2 |       Email      |
| 3 |     Password     |
| 4 | Confirm Password |


<a name="edit-customer"></a>
## Edit Customer

`Edit Customer` module is accessible for `admin`, `employee` and `customer` all. Although `email` is not an edit option in the `edit customer` form. On every updation `password` and `confirm-password` fields must be filled, because they could not comes with the old value from the database for security reasons. The `edit customer` form fields are as follows,

| # |       Fields     | Writable |
| : |         :        |     :    |
| 1 |        Name      |    Yes   |
| 2 |       Email      |     No   |
| 3 |     Password     |    Yes   |
| 4 | Confirm Password |    Yes   |

<a name="delete-customer"></a>
## Delete Customer

`Delete Customer` module can be accessible by `admin` and `customer` only. Delete `customer` task is performed by selecting `customer` and hit the delete `customer` link.
