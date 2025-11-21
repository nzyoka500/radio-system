<?php


return [
     'default-permission'                                =>  [
        'title'                                         => 'Default Permissions',
        'sections'                                      =>  [
           [
                'title'                                 => 'Contact Message',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.contact.messages.index'
                    ],
                    [
                        'title'                         => 'Reply',
                        'route'                         => 'admin.contact.messages.reply'
                    ],

                ],
            ],
            [
                'title'                                 => 'Subscribers',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.subscriber.index'
                    ],

                ],
            ],
        ],
    ],
    'schedules'                                =>  [
        'title'                                         => 'Schedules',
        'sections'                                      =>  [
           [
                'title'                                 => 'Schedule Days',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.day.index'
                    ],
                    [
                        'title'                         => 'Create',
                        'route'                         => 'admin.day.create'
                    ],
                    [
                        'title'                         => 'Store',
                        'route'                         => 'admin.day.store'
                    ],
                    [
                        'title'                         => 'Edit',
                        'route'                         => 'admin.day.edit'
                    ],
                    [
                        'title'                         => 'Update',
                        'route'                         => 'admin.day.update'
                    ],

                ],
            ],
            [
                'title'                                 => 'Daily Schedules',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.schedule.index'
                    ],
                    [
                        'title'                         => 'Create',
                        'route'                         => 'admin.schedule.create'
                    ],
                    [
                        'title'                         => 'Store',
                        'route'                         => 'admin.schedule.store'
                    ],
                    [
                        'title'                         => 'Edit',
                        'route'                         => 'admin.schedule.edit'
                    ],
                    [
                        'title'                         => 'Update',
                        'route'                         => 'admin.schedule.update'
                    ],
                    [
                        'title'                         => 'Delete',
                        'route'                         => 'admin.schedule.delete'
                    ],

                ],
            ],
        ],
    ],
    'interface-permission'                                         => [
        'title'                                         => 'Interface Panel Permissions',
        'sections'                                      =>  [
            [
                'title'                                 => 'User Care',
                'routes'                                => [
                    [
                        'title'                         => 'User List',
                        'route'                         => 'admin.users.index'
                    ],
                    [
                        'title'                         => 'Active Users',
                        'route'                         => 'admin.users.active'
                    ],
                    [
                        'title'                         => 'Create Users',
                        'route'                         => 'admin.users.create'
                    ],
                    [
                        'title'                         => 'Store Users',
                        'route'                         => 'admin.users.store'
                    ],
                    [
                        'title'                         => 'Banned Users',
                        'route'                         => 'admin.users.banned'
                    ],
                    [
                        'title'                         => 'Email Unverified',
                        'route'                         => 'admin.users.email.unverified'
                    ],
                    [
                        'title'                         => 'SMS Unverified',
                        'route'                         => 'admin.users.sms.unverified'
                    ],
                    [
                        'title'                         => 'KYC Unverified',
                        'route'                         => 'admin.users.kyc.unverified'
                    ],
                    [
                        'title'                         => 'KYC Details',
                        'route'                         => 'admin.users.kyc.details'
                    ],
                    [
                        'title'                         => 'Email To Users',
                        'route'                         => 'admin.users.email.users'
                    ],
                    [
                        'title'                         => 'Send Mail To Users',
                        'route'                         => 'admin.users.email.users.send'
                    ],
                    [
                        'title'                         => 'User Details',
                        'route'                         => 'admin.users.details'
                    ],
                    [
                        'title'                         => 'User Details Update',
                        'route'                         => 'admin.users.details.update'
                    ],
                    [
                        'title'                         => 'Login Logs',
                        'route'                         => 'admin.users.login.logs'
                    ],
                    [
                        'title'                         => 'Mail Logs',
                        'route'                         => 'admin.users.mail.logs'
                    ],
                    [
                        'title'                         => 'Send Mail',
                        'route'                         => 'admin.users.send.mail'
                    ],
                    [
                        'title'                         => 'Login as Member',
                        'route'                         => 'admin.users.login.as.member'
                    ],
                    [
                        'title'                         => 'Kyc Approve',
                        'route'                         => 'admin.users.kyc.approve'
                    ],
                    [
                        'title'                         => 'Kyc Reject',
                        'route'                         => 'admin.users.kyc.reject'
                    ],
                    [
                        'title'                         => 'Wallet Balance Update',
                        'route'                         => 'admin.users.wallet.balance.update'
                    ],
                    [
                        'title'                         => 'User Search',
                        'route'                         => 'admin.users.search'
                    ],
                ],
            ],
            [
                'title'                                 => 'Admin Care',
                'routes'                                => [
                    [
                        'title'                         => 'Admin List',
                        'route'                         => 'admin.admins.index'
                    ],
                    [
                        'title'                         => 'Email All Admins',
                        'route'                         => 'admin.admins.email.admins'
                    ],
                    [
                        'title'                         => 'Delete Admin',
                        'route'                         => 'admin.admins.admin.delete'
                    ],
                    [
                        'title'                         => 'Send Email',
                        'route'                         => 'admin.admins.send.email'
                    ],
                    [
                        'title'                         => 'Search',
                        'route'                         => 'admin.admins.search'
                    ],
                    [
                        'title'                         => 'Store',
                        'route'                         => 'admin.admins.admin.store'
                    ],
                    [
                        'title'                         => 'Update',
                        'route'                         => 'admin.admins.admin.update'
                    ],
                    [
                        'title'                         => 'Status Update',
                        'route'                         => 'admin.admins.admin.status.update'
                    ],
                ],
            ],
            [
                'title'                                 => 'Role & Permissions',
                'routes'                                => [
                    [
                        'title'                         => 'Role List',
                        'route'                         => 'admin.admins.role.index'
                    ],
                    [
                        'title'                         => 'Role Store',
                        'route'                         => 'admin.admins.role.store'
                    ],
                    [
                        'title'                         => 'Role Update',
                        'route'                         => 'admin.admins.role.update'
                    ],
                    [
                        'title'                         => 'Role Delete',
                        'route'                         => 'admin.admins.role.delete'
                    ],
                    [
                        'title'                         => 'Permission List',
                        'route'                         => 'admin.admins.role.permission.index'
                    ],
                    [
                        'title'                         => 'Permission Create',
                        'route'                         => 'admin.admins.role.permission.create'
                    ],
                    [
                        'title'                         => 'Permission Store',
                        'route'                         => 'admin.admins.role.permission.store'
                    ],
                    [
                        'title'                         => 'Permission Edit',
                        'route'                         => 'admin.admins.role.permission.edit'
                    ],
                    [
                        'title'                         => 'Permission Update',
                        'route'                         => 'admin.admins.role.permission.update'
                    ],
                    [
                        'title'                         => 'Permission Delete',
                        'route'                         => 'admin.admins.role.permission.delete'
                    ],
                    [
                        'title'                         => 'Permission View',
                        'route'                         => 'admin.admins.role.permission'
                    ],
                ],
            ],
        ],
    ],
    'settings-permission'                                          => [
        'title'                                         => 'Settings Permissions',
        'sections'                                      =>  [
            [
                'title'                                 => 'Web Settings',
                'routes'                                => [
                    [
                        'title'                         => 'Basic Settings',
                        'route'                         => 'admin.web.settings.basic.settings'
                    ],
                    [
                        'title'                         => 'Basic Settings Update',
                        'route'                         => 'admin.web.settings.basic.settings.update'
                    ],
                    [
                        'title'                         => 'Basic Settings Activation Update',
                        'route'                         => 'admin.web.settings.basic.settings.activation.update'
                    ],
                    [
                        'title'                         => 'Image Assets',
                        'route'                         => 'admin.web.settings.image.assets'
                    ],
                    [
                        'title'                         => 'Image Assets Update',
                        'route'                         => 'admin.web.settings.image.assets.update'
                    ],
                    [
                        'title'                         => 'Setup Seo',
                        'route'                         => 'admin.web.settings.setup.seo'
                    ],
                    [
                        'title'                         => 'Seo Update',
                        'route'                         => 'admin.web.settings.setup.seo.update'
                    ],

                ],
            ],
            [
                'title'                                 => 'App Settings',
                'routes'                                => [
                    [
                        'title'                         => 'Splash Screen',
                        'route'                         => 'admin.app.settings.splash.screen'
                    ],
                    [
                        'title'                         => 'Splash Screen Update',
                        'route'                         => 'admin.app.settings.splash.screen.update'
                    ],
                    [
                        'title'                         => 'Onboard Screens',
                        'route'                         => 'admin.app.settings.onboard.screens'
                    ],
                    [
                        'title'                         => 'Onboard Screen Store',
                        'route'                         => 'admin.app.settings.onboard.screen.store'
                    ],
                    [
                        'title'                         => 'Onboard Screen Update',
                        'route'                         => 'admin.app.settings.onboard.screen.update'
                    ],
                    [
                        'title'                         => 'Onboard Screen Status Update',
                        'route'                         => 'admin.app.settings.onboard.screen.status.update'
                    ],
                    [
                        'title'                         => 'Onboard Screen Delete',
                        'route'                         => 'admin.app.settings.onboard.screen.delete'
                    ]
                ],
            ],
            [
                'title'                                 => 'Setup Email',
                'routes'                                => [
                    [
                        'title'                         => 'Email Configuration',
                        'route'                         => 'admin.setup.email.config'
                    ],
                    [
                        'title'                         => 'Email Configuration Update',
                        'route'                         => 'admin.setup.email.config.update'
                    ],
                    [
                        'title'                         => 'Test Mail Send',
                        'route'                         => 'admin.setup.email.test.mail.send'
                    ],
                ],
            ],
            [
                'title'                                 => 'Setup Sections',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.setup.sections.section'
                    ],
                    [
                        'title'                         => 'Update',
                        'route'                         => 'admin.setup.sections.update'
                    ],
                    [
                        'title'                         => 'Item Store',
                        'route'                         => 'admin.setup.sections.item.store'
                    ],
                    [
                        'title'                         => 'Item Update',
                        'route'                         => 'admin.setup.sections.item.update'
                    ],
                    [
                        'title'                         => 'Item Delete',
                        'route'                         => 'admin.setup.sections.item.delete'
                    ],
                    [
                        'title'                         => 'Announcement Category Index',
                        'route'                         => 'admin.setup.sections.announcement.category.index'
                    ],
                    [
                        'title'                         => 'Announcement Category Create',
                        'route'                         => 'admin.setup.sections.announcement.category.create'
                    ],
                    [
                        'title'                         => 'Announcement Category Update',
                        'route'                         => 'admin.setup.sections.announcement.category.update'
                    ],
                    [
                        'title'                         => 'Announcement Category Delete',
                        'route'                         => 'admin.setup.sections.announcement.category.delete'
                    ],
                    [
                        'title'                         => 'Announcement Category Status Update',
                        'route'                         => 'admin.setup.sections.announcement.category.status.update'
                    ],
                    [
                        'title'                         => 'Announcement Index',
                        'route'                         => 'admin.setup.sections.announcement.index'
                    ],
                    [
                        'title'                         => 'Announcement Create',
                        'route'                         => 'admin.setup.sections.announcement.create'
                    ],
                    [
                        'title'                         => 'Announcement Store',
                        'route'                         => 'admin.setup.sections.announcement.store'
                    ],
                    [
                        'title'                         => 'Announcement Edit',
                        'route'                         => 'admin.setup.sections.announcement.edit'
                    ],
                    [
                        'title'                         => 'Announcement Update',
                        'route'                         => 'admin.setup.sections.announcement.update'
                    ],
                    [
                        'title'                         => 'Announcement Status Update',
                        'route'                         => 'admin.setup.sections.announcement.status.update'
                    ],
                    [
                        'title'                         => 'Announcement Delete',
                        'route'                         => 'admin.setup.sections.announcement.delete'
                    ],
                ],
            ],
            [
                'title'                                 => 'Setup Pages',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.setup.pages.index'
                    ],
                    [
                        'title'                         => 'Details',
                        'route'                         => 'admin.setup.pages.details'
                    ],
                    [
                        'title'                         => 'Update Sections',
                        'route'                         => 'admin.setup.pages.update.section'
                    ],
                    [
                        'title'                         => 'Status Update',
                        'route'                         => 'admin.setup.pages.status.update'
                    ],
                ],
            ],
            [
                'title'                                 => 'Language',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.languages.index'
                    ],
                    [
                        'title'                         => 'Store',
                        'route'                         => 'admin.languages.store'
                    ],
                    [
                        'title'                         => 'Update',
                        'route'                         => 'admin.languages.update'
                    ],
                    [
                        'title'                         => 'Status Update',
                        'route'                         => 'admin.languages.status.update'
                    ],
                    [
                        'title'                         => 'Info',
                        'route'                         => 'admin.languages.info'
                    ],
                    [
                        'title'                         => 'Import',
                        'route'                         => 'admin.languages.import'
                    ],
                    [
                        'title'                         => 'Delete',
                        'route'                         => 'admin.languages.delete'
                    ],
                    [
                        'title'                         => 'Switch',
                        'route'                         => 'admin.languages.switch'
                    ],
                    [
                        'title'                         => 'Download',
                        'route'                         => 'admin.languages.download'
                    ],
                ],
            ],
            [
                'title'                                 => 'Extensions',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.extensions.index'
                    ],
                    [
                        'title'                         => 'Update',
                        'route'                         => 'admin.extensions.update'
                    ],
                    [
                        'title'                         => 'Status Update',
                        'route'                         => 'admin.extensions.status.update'
                    ],
                ],
            ],
            [
                'title'                                 => 'Push Notification',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.push.notification.index'
                    ],
                    [
                        'title'                         => 'Config',
                        'route'                         => 'admin.push.notification.config'
                    ],
                    [
                        'title'                         => 'Update',
                        'route'                         => 'admin.push.notification.update'
                    ],
                    [
                        'title'                         => 'Send',
                        'route'                         => 'admin.push.notification.send'
                    ],
                    [
                        'title'                         => 'Broadcast Update',
                        'route'                         => 'admin.push.notification.broadcast.config.update'
                    ],
                ],
            ],
            [
                'title'                                 => 'Useful Links',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.useful.links.index'
                    ],
                    [
                        'title'                         => 'Store',
                        'route'                         => 'admin.useful.links.store'
                    ],
                    [
                        'title'                         => 'Status Update',
                        'route'                         => 'admin.useful.links.status.update'
                    ],
                    [
                        'title'                         => 'Edit',
                        'route'                         => 'admin.useful.links.edit'
                    ],
                    [
                        'title'                         => 'Update',
                        'route'                         => 'admin.useful.links.update'
                    ],
                    [
                        'title'                         => 'Delete',
                        'route'                         => 'admin.useful.links.delete'
                    ],
                ],
            ],
        ],
    ],
    'bonus-permission'                                  => [
        'title'                                         => 'Bonus Permissions',
        'sections'                                      =>  [
            [
                'title'                                 => 'Server Info',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.server.info.index'
                    ],
                ],
            ],
            [
                'title'                                 => 'Error Logs',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.error.logs.index'
                    ]
                ],
            ],
            [
                'title'                                 => 'Cache',
                'routes'                                => [
                    [
                        'title'                         => 'Cache',
                        'route'                         => 'admin.cache.clear'
                    ],
                ],
            ],
            [
                'title'                                 => 'GDPR Cookie',
                'routes'                                => [
                    [
                        'title'                         => 'Index',
                        'route'                         => 'admin.cookie.clear'
                    ],
                    [
                        'title'                         => 'Update',
                        'route'                         => 'admin.cookie.update'
                    ],
                ],
            ],

        ],
    ],
];
