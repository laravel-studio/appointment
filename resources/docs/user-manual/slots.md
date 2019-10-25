# Slots
---
- [Description](/{{route}}/{{version}}/slots/#description)
- [Add Slots](/{{route}}/{{version}}/slots/#add-slots)
- [Edit Slots](/{{route}}/{{version}}/slots/#edit-slots)

<a name="description"></a>
## Description

A `Slot` is a combination of `Employee Services` with `date`,`time`,`day`. A slot can be created by `admin` by selecting an specific `employee` available to the selected `service`.

<a name="add-slots"></a>
## Add Slots

`Add Slot` operation can be performed by `admin` only. The services lists will be available, after selecting `service` available `employees` assigned to that `service` will be available under `employees` section. Then selecting the specific employee `day` will be selected. Days are `multi-select` dropdown. After that `start time` and `end time` can be given. Here for choosing time graphical `time-picker` used for better user-experience. `Add slots` form consits of the following fields.

| # |    Fields    |       Fields Type         | Fields Value |
| : |       :      |             :             |       :      |
| 1 |    Services  |         Dropdown          |    Service   |
| 1 |    Employee  |      Radio Button         |    Employee  |
| 2 |       Day    |   Dropdown - Multi-Select |      Days    |
| 3 |  Start Time  |      timepicker           |      time    |
| 3 |  End Time    |       timepicker          |      time    |


<a name="edit-slots"></a>
## Edit Slots

`Edit Slot` operation can only be performed by `admin`. `Edit Slot` option is mostly like `add slot` but `service` and `employee` can't be editable, only edit employee time and day can be editable. The `edit slot` form structure is as follows,

| # |    Fields    |       Fields Type         |   Editable   |
| : |       :      |             :             |       :      |
| 1 |   Services   |         readonly          |       No     |
| 1 |   Employee   |         readonly          |       No     |
| 2 |      Day     |         Dropdown          |      Yes     |
| 3 |  Start Time  |        timepicker         |      Yes     |
| 3 |   End Time   |        timepicker         |      Yes     |
