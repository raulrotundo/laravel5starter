<?php
return [
	'title_page' => [
		'index'  => 'Permisos',
		'create' => 'Crear Permiso',
		'update' => 'Actualizar Permiso'
	],
    'show' => [
		'id'         => 'Id',
		'permission' => 'Permiso',
		'slug'       => 'Slug',
		'actions'    => 'Acciones',
		'edit'       => 'Editar',
		'delete'     => 'Eliminar'
    ],
    'form' => [
        'permission' => [
			'title'       => 'Permiso:',
			'placeholder' => 'Ingrese el Permiso'
        ],
        'slug' => [
			'title'       => 'Slug:',
			'placeholder' => 'Ingrese el Slug'
        ],
        'description' => [
			'title'       => 'Descripción:',
			'placeholder' => 'Ingrese la Descripción'
        ],
		'assign_roles_section' => 'Sección de Asignación de Roles',
		'submit'               => 'Enviar',
		'create_confirm'       => 'El permiso fue agreado exitósamente!',
		'update_confirm'       => 'El permiso fue actualizado exitósamente!',
		'delete_confirm'       => 'El permiso fue eliminado exitósamente!'
    ]
];
