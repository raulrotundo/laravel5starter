<?php
return [
	'title_page' => [
		'index'  => 'Usuarios',
		'create' => 'Crear Usuario',
		'update' => 'Actualizar Usuario'
	],
    'show' => [
		'id'           => 'Id',
		'name'         => 'Nombre',
		'email'        => 'Correo Electrónico',
		'status_title' => 'Estatus',
        'status' => [
			'enable'  => 'Habilitado',
			'disable' => 'Deshabilitado'
        ],
		'actions' => 'Acción',
		'edit'    => 'Editar',
		'delete'  => 'Eliminar'
    ],
    'form' => [
        'name' => [
			'title'       => 'Nombre:',
			'placeholder' => 'Ingrese un Nombre'
        ],
        'email' => [
			'title'       => 'Correo Electrónico:',
			'placeholder' => 'Ingrese un Correo Electrónico'
        ],
        'avatar' => 'Avatar:',
        'remove_avatar' => 'Remover',
        'phone' => [
			'title'       => 'Teléfono:',
			'placeholder' => 'Ingrese un Teléfono'
        ],
        'address' => [
			'title'       => 'Dirección:',
			'placeholder' => 'Ingrese una Dirección'
        ],
        'city' => [
			'title'       => 'Ciudad:',
			'placeholder' => 'Ingrese la Ciudad'
        ],
        'password' => [
			'title'       => 'Contraseña:',
			'placeholder' => 'Ingrese una Contraseña'
        ],
        'zipcode' => [
			'title'       => 'Código Postal:',
			'placeholder' => 'Ingrese un Código Postal'
        ],
        'country' => [
			'title'       => 'País:',
			'placeholder' => 'Seleccione un País'
        ],
		'status'               => 'Estatus:',
		'assign_roles_section' => 'Sección de Asignación de Roles',
		'submit'               => 'Enviar',
		'create_confirm'       => 'El usuario fue agreado exitósamente!',
		'update_confirm'       => 'El usuario fue actualizado exitósamente!',
		'delete_confirm'       => 'El usuario fue eliminado exitósamente!'
    ]
];
