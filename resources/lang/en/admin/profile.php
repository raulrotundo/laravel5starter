<?php
return [
	'attrs' => [
		'name'       => 'name',
		'email'      => 'email',
		'country_id' => 'country',
		'password'   => [
			'current' => 'current password',
			'new'     => 'new password',
			'repeat'  => 'confirmed password',
		],
	],
	'title_page' => [
		'index'  => 'Profile',
		'update' => 'Update Profile'
	],
	'index' => [
		'go' => 'Go to',
		'edit' => 'Edit',
		'status' => [
			'inactive' => 'Inactive User',
			'active' => 'Follow',
		],
		'tab' => [
			'userInfo'  => 'User Info',
			'services'  => 'Services',
			'companies' => 'Companies',
		],
		'services' => [
			'inprocess'  => 'In process services',
			'completed'  => 'Completed services',
			'cancelled' => 'Cancelled services',
		],
		'companies' => [
			'country'  => 'Country',
			'city'  => 'City',
			'website' => 'Web Site',
		],
	],
	'form' => [
		'not' => 'Now, not available.',
		'tab' => [
			'userInfo'  => 'User Info',
			'security'  => 'Security',
			'privacity' => 'Privacity',
		],
		'avatar' => [
			'title'  => 'Change Avatar',
			'close'  => 'Close',
			'submit' => 'Submit',
		],
		'password' => [
			'current' => [
				'title' => 'Current password: ',
				'placeholder' => 'Enter the current password',
			],
			'new' => [
				'title' => 'New password: ',
				'placeholder' => 'Enter the new password',
			],
			'repeat' => [
				'title' => 'Repeat new password: ',
				'placeholder' => 'Repeat the new password',
			],
		],
		'leave_user' => [
			'check'  => 'Leave User',
			'msg'  => 'We will see you soon, you can reactivate your account by simply signing in again.',
		],
		'update_info_confirm'     => 'Profile successfully updated!',
		'update_password_confirm' => 'Password successfully updated!',
		'update_password_error'   => 'The password do not match our records',
		'update_avatar_confirm'   => 'Profile avatar successfully updated!',
	],
];
