<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */






	 public $authlogin = [
 		'username'         => 'required',
 		'password' 		=> 'required'
 		];

		public $authlogin_errors = [
 		'username'=> [
 			'required' 	=> 'username wajib diisi.'

 		],
 		'password'=> [
 			'required' 	=> 'Password wajib diisi.'
 		]
	];

	public $kategori_bahan = [
			'nama_kategori'     => 'required',
			'status'     => 'required'
		];

	public $kategori_bahan_errors = [
				'nama_kategori' => [
						'required'    => 'Nama kategori wajib diisi.',
				],
				'status'    => [
						'required' => 'Status kategori wajib diisi.'
				]
		];

		public $kategori_menu = [
				'nama_kategori'     => 'required',
				'status'     => 'required'
			];

		public $kategori_menu_errors = [
					'nama_kategori' => [
							'required'    => 'Nama kategori wajib diisi.',
					],
					'status'    => [
							'required' => 'Status kategori wajib diisi.'
					]
			];

	public $bahan = [
			'nama_bahan'     => 'required',
			'jumlah'     => 'required',
			'satuan'     => 'required',
			'id_kategori_bahan'     => 'required',
		];

	public $bahan_errors = [
				'nama_bahan' => [
						'required'    => 'Nama Bahan Makanan wajib diisi.',
				],
				'jumlah'    => [
						'required' => 'jumlah kategori wajib diisi.'
				],
				'satuan' => [
						'required'    => 'Satuan wajib diisi.',
				],
				'id_kategori_bahan'    => [
						'required' => 'Kategori wajib diisi.'
				]
		];

		public $menu = [
				'nama_menu'     => 'required',
				'jumlah'     => 'required',
				'harga'     => 'required',
				'id_kategori_menu'     => 'required',
			];

		public $menu_errors = [
					'nama_menu' => [
							'required'    => 'Nama Bahan Makanan wajib diisi.',
					],
					'jumlah'    => [
							'required' => 'jumlah kategori wajib diisi.'
					],
					'harga' => [
							'required'    => 'Satuan wajib diisi.',
					],
					'id_kategori_menu'    => [
							'required' => 'Kategori wajib diisi.'
					]
		];








	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
