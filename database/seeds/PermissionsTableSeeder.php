<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         *  declaring permissions with name, display_name, description
         */
        $permissions = [
                            /**
                             * Permissions of Roles
                             */
                            [
                                'name' => 'add-role',
                                'display_name' => 'Add Role',
                                'description' => 'adding roles'
                            ],

                            [
                                'name' => 'edit-role',
                                'display_name' => 'Edit Role',
                                'description' => 'editing roles'
                            ],

                            [
                                'name' => 'delete-role',
                                'display_name' => 'Delete Role',
                                'description' => 'deleting roles'
                            ],

                            [
                                'name' => 'list-role',
                                'display_name' => 'List Role',
                                'description' => 'listing roles'
                            ],

                            /**
                             * Permissions of Admins
                             */
                            [
                                'name' => 'add-admin',
                                'display_name' => 'Add Admin',
                                'description' => 'adding admin'
                            ],

                            [
                                'name' => 'edit-admin',
                                'display_name' => 'Edit Admin',
                                'description' => 'editing admin'
                            ],

                            [
                                'name' => 'delete-admin',
                                'display_name' => 'Delete Admin',
                                'description' => 'deleting admin'
                            ],

                            [
                                'name' => 'list-admin',
                                'display_name' => 'List Admin',
                                'description' => 'listing admin'
                            ],

                            /**
                             * Permissions of Services
                             */
                            [
                                'name' => 'add-service',
                                'display_name' => 'Add Service',
                                'description' => 'adding services'
                            ],

                            [
                                'name' => 'edit-service',
                                'display_name' => 'Edit Service',
                                'description' => 'editing services'
                            ],

                            [
                                'name' => 'delete-service',
                                'display_name' => 'Delete Service',
                                'description' => 'deleting services'
                            ],

                            [
                                'name' => 'list-service',
                                'display_name' => 'List Service',
                                'description' => 'listing services'
                            ],

                            /**
                             * Permissions of Users
                             */
                            [
                                'name' => 'add-user',
                                'display_name' => 'Add User',
                                'description' => 'adding users'
                            ],

                            [
                                'name' => 'edit-user',
                                'display_name' => 'Edit User',
                                'description' => 'editing users'
                            ],

                            [
                                'name' => 'delete-user',
                                'display_name' => 'Delete User',
                                'description' => 'deleting users'
                            ],

                            [
                                'name' => 'list-user',
                                'display_name' => 'List User',
                                'description' => 'listing users'
                            ],

                            /**
                             * Permissions of Slots
                             */
                            [
                                'name' => 'add-slot',
                                'display_name' => 'Add Slot',
                                'description' => 'adding slots'
                            ],

                            [
                                'name' => 'edit-slot',
                                'display_name' => 'Edit Slot',
                                'description' => 'editing slots'
                            ],

                            [
                                'name' => 'delete-slot',
                                'display_name' => 'Delete Slot',
                                'description' => 'deleting slot'
                            ],

                            [
                                'name' => 'list-slot',
                                'display_name' => 'List Slot',
                                'description' => 'listing slots'
                            ],

                            [
                                'name' => 'duplicate-slot',
                                'display_name' => 'Duplicate Slot',
                                'description' => 'duplicating slots'
                            ],

                            /**
                             * Permissions of Appointments
                             */
                            [
                                'name' => 'list-appointment',
                                'display_name' => 'List Appointment',
                                'description' => 'listing appointments'
                            ],

                            [
                                'name' => 'book-appointment',
                                'display_name' => 'Book Appointment',
                                'description' => 'booking appointments'
                            ],

                            [
                                'name' => 'calender-view',
                                'display_name' => 'Calender View',
                                'description' => 'view slots on calender'
                            ],

                            [
                                'name' => 'booking-history',
                                'display_name' => 'Booking History',
                                'description' => 'shows booking history'
                            ],

                            [
                                'name' => 'report-appointment',
                                'display_name' => 'Report Appointment',
                                'description' => 'reporting appointments'
                            ],

                            [
                                'name' => 're-book',
                                'display_name' => 'Re-Book',
                                'description' => 're-book appointments if date and time is available'
                            ],

                            /**
                             * General Permisssions of each permission section
                             */

                             [
                                 'name' => 'search',
                                 'display_name' => 'Search',
                                 'description' => 'searching any particular type of field or data'
                             ],

                             [
                                 'name' => 'sort',
                                 'display_name' => 'Sort',
                                 'description' => 'sorting fields or data'
                             ],

                             [
                                 'name' => 'date-filter',
                                 'display_name' => 'Date Filter',
                                 'description' => 'filtering data or fields by date'
                             ],

                             [
                                 'name' => 'multi-select',
                                 'display_name' => 'Multi-select',
                                 'description' => 'Multiple selection of data or fields'
                             ],

                             [
                                 'name' => 'download',
                                 'display_name' => 'Download',
                                 'description' => 'downloading files'
                             ]
        ];

        /**
         * Creating Permissions by inserting values into Permission table
         */

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}
