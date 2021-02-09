@extends('app/homepage', [
	'model' => [
		'form' => [
			'action' => route('templates.echo', [
				'json' => [
					'success' => true,
					'response' => [
						'title' => 'Thank you',
						'copy' => 'We’ll be in touch shortly.',
					],
				],
			]),
			'schema' => [
				[
					'type' => 'text',
					'name' => 'company',
					'label' => trans('global.form.labels.company'),
				],
				[
					'type' => 'text',
					'name' => 'postcode',
					'label' => trans('global.form.labels.postcode'),
				],
				[
					'type' => 'text',
					'name' => 'name',
					'label' => trans('global.form.labels.name'),
				],
				[
					'type' => 'tel',
					'name' => 'phone',
					'label' => trans('global.form.labels.phone'),
				],
				[
					'type' => 'email',
					'name' => 'email',
					'label' => trans('global.form.labels.email'),
				],
				[
					'type' => 'text',
					'name' => 'epos',
					'label' => trans('global.form.labels.epos'),
				],
				[
					'type' => 'submit',
					'label' => trans('global.form.cta.signup'),
				],
			],
			'values' => [
				'email' => 'test@email.com',
				'postcode' => 'LS5',
			],
		],
	],
])
