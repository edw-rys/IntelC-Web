<?php

return [
	'domain'		=> 'liranka.com',
    /**
     * Permission
     */
	'permissions_role'	=> [
		'institution'	=> collect([
			'academic_menu',
			'subject_menu',
			'access_supply',
			/**
			 * Users
			 */
			'access_users',
			'create_users',
			'edit_users',
			'inactive_users',
			'active_users',
			/**
			 * School List
			 */
			'access_school_supplies',
			'create_school_supplies',
			'edit_school_supplies',
			'show_school_supplies',
			'delete_school_supplies',
			'restore_school_supplies',

			/**
			 * Subject
			 */
			'access_subject',
			'create_subject',
			'edit_subject',
			'inactive_subject',
			'active_subject',

            /**
			 * Section
			 */
			'access_section',
			'create_section',
			'edit_section',
			'inactive_section',
			'active_section',

            /**
			 * Course
			 */
			'access_course',
			'create_course',
			'show_course',
			'edit_course',
			'inactive_course',
			'active_course',

			/**
			 * Parallel
			 */
			'delete_parallel',
			'create_parallel',

			/**
			 * Settings
			 */
			'access_modules',
			'access_role',
			'create_role',
			'edit_role',
			'inactive_role',
			'active_role',
			/**
			 * Course subjects
			 */
			'access_course_subject',
			'create_course_subject',
			'edit_course_subject',
			'delete_course_subject',
			'restore_course_subject',
			/**
			 * School Supply list
			 */
			'create_school_supplies',
			'edit_school_supplies',
			'show_school_supplies',
			'delete_school_supplies',
			'restore_school_supplies',
		]),
		'admin'			=> collect([
			'access_institutions',
			'create_institutions',
			'edit_institutions',
			'inactive_institutions',
			'active_institutions',
			'subject_menu',
			'access_supply',
			'academic_menu',
			/**
			 * School List
			 */
			'access_school_supplies',
			'create_school_supplies',
			'edit_school_supplies',
			'show_school_supplies',
			'delete_school_supplies',
			'restore_school_supplies',
			/**
			 * Subject
			 */
			'access_subject',
			'create_subject',
			'edit_subject',
			'inactive_subject',
			'active_subject',
			/**
			 * Users
			 */
			'access_users',
			'create_users',
			'edit_users',
			'inactive_users',
			'active_users',
            /**
			 * Section
			 */
			'access_section',
			'create_section',
			'edit_section',
			'inactive_section',
			'active_section',

            /**
			 * Course
			 */
			'access_course',
			'show_course',
			'create_course',
			'edit_course',
			'inactive_course',
			'active_course',
			/**
			 * Settings
			 */
			'access_modules',
			'access_role',
			'create_role',
			'edit_role',
			'inactive_role',
			'active_role',
			/**
			 * Course subjects
			 */
			'access_course_subject',
			'create_course_subject',
			'edit_course_subject',
			'delete_course_subject',
			'restore_course_subject',
			/**
			 * Parallel
			 */
			'delete_parallel',
			'create_parallel',
			/**
			 * Supply
			 */
			'create_supply',
			'delete_supply',
			/**
			 * School Supply list
			 */
			'create_school_supplies',
			'edit_school_supplies',
			'show_school_supplies',
			'delete_school_supplies',
			'restore_school_supplies',
		])
	],
	'email'				=> [
		'active_user'	=> [
			'subject'		=> 'Activación de usuario (Liranka)'
		]
	]
];
