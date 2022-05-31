<?php
return [
    'role_admin_id' => 1,
    'role_staff_id' => 2,
    'role_permissions' => [
        1 => 'Add',
        2 => 'Update',
        3 => 'Delete',
        4 => 'Add, Update',
        5 => 'Add, Delete',
        6 => 'Update, Delete',
        7 => 'Add, Update, Delete',
        8 => 'All'
    ],
    'employee_shift' => [
        'index' => [
            1 => 'Morning', // 8AM - 5PM
            2 => 'Afternoon', // 1PM - 9PM
            3 => 'Night', // 6PM - 3AM
            4 => 'Graveyard', // 3AM - 12PM
            5 => 'Flex'
        ],
        'values' => [
            'Morning'   => 1,
            'Afternoon' => 2,
            'Night'     => 3,
            'Graveyard' => 4,
            'Flex'      => 5
        ],
        'schedule' => [
            'Morning'   => ['in' => '8:00 AM', 'out' => '5:00 PM'],
            'Afternoon' => ['in' => '1:00 PM', 'out' => '9:00 PM'],
            'Night'     => ['in' => '6:00 PM', 'out' => '3:00 AM'],
            'Graveyard' => ['in' => '3:00 AM', 'out' => '12:00 PM'],
            'Flex'      => ['in' => 'OPEN', 'out' => 'OPEN']
        ]
    ]
];
?>
