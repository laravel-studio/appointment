# Employee Services
---
- [Description](/{{route}}/{{version}}/employeeservices/#description)
- [Assign Service](/{{route}}/{{version}}/employeeservices/#assign-service)
- [Edit Assignments](/{{route}}/{{version}}/employeeservices/#edit-assignments)
- [Delete Assignments](/{{route}}/{{version}}/employeeservices/#delete-assignments)

<a name="description">
## Description

`Employee Services` module is developped for assigning `services` to the `employees`. This consists of `services` and `employees` that are previously created. The previously created services are assigned to previously created employee with `price`. Here `same service` cannot be reassigned to `same employee` twice.


<a name="assign-service"></a>
## Assign Service

Assign service can be performed by `admin` only with `price`. Assign Service form consists of following fields,

| # |    Fields    |       Fields Type         | Fields Value |
| : |       :      |             :             |       :      |
| 1 | Service Name |         Dropdown          |    Service   |
| 2 |   Employees  |   Dropdown - Multi-Select |    Employees |
| 3 |     Price    |            text           |      Price   |


<a name="edit-assignments"></a>
## Edit Assignments

Edit assignments can be performed by `admin` only. This task checks if there is same assignments previously present in `database`.
 If previously present in `database` then assignments can't be done and if not present then new updation will be done. The edit assignments form is as follows,

| # |    Fields    |       Fields Type         | Fields Value |
| : |       :      |             :             |       :      |
| 1 | Service Name |         Dropdown          |    Service   |
| 2 |   Employees  |         Dropdown          |    Employees |
| 3 |     Price    |            text           |      Price   |


<a name="delete-assignments"></a>
## Delete Assignments

Delete Assignments can also only be performed by `admin`. Delete `assignments` task is performed by selecting `assignments` and hit the `delete assignments` link.
