<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller {
	function show($id){
		$order = [
			'id'				=>	$id,
			'status'			=>	'Acompanhando seus móveis',
			'products'			=>	[
				[
					'id'			=>	12345,
					'name'			=>	'Uma TV bem grande Uma TV bem grande Uma TV bem grande Uma TV bem grande',
					'image'			=>	'https://assets.lojaskd.com.br/125700/125703/125703_39_zoom_390.jpg',
					'qtd'			=>	1,
					'total_value'	=>	1200.00,
					'invoice_link'	=>	'#',
					'status'		=>	'Com a transportadora',
					'status_id'		=>	2,
				],
				[
					'id'			=>	12345,
					'name'			=>	'Uma estante para a tv acima',
					'image'			=>	'https://assets.lojaskd.com.br/125700/125703/125703_39_zoom_390.jpg',
					'qtd'			=>	1,
					'total_value'	=>	400.00,
					'invoice_link'	=>	'#',
					'status'		=>	'Em produção',
					'status_id'		=>	0,
				],
				[
					'id'			=>	12345,
					'name'			=>	'Um tapete bonito',
					'image'			=>	'https://assets.lojaskd.com.br/125700/125703/125703_39_zoom_390.jpg',
					'qtd'			=>	1,
					'total_value'	=>	120.00,
					'invoice_link'	=>	'#',
					'status'		=>	'Entregue',
					'status_id'		=>	3,
				],
			],
			'ordered_on'		=>	[
				'timestamp'	=>	'2017-02-20 08:30:45',
				'year'		=>	'2017',
				'month'		=>	'02',
				'month_n'	=>	'fev',
				'day'		=>	'20',
				'time'		=>	'08:30',
			],
			'total_value'		=>	1580.72,
			'payment_method'	=>	'Cartão de crédito Mastercad',
			'delivery_estimate'	=>	[
				'from'	=>	[
					'timestamp'		=>	'2017-03-10 08:30:45',
					'year'			=>	'2017',
					'month'			=>	'03',
					'month_name'	=>	'mar',
					'day'			=>	'10',
					'time'			=>	'08:30',
				],
				'to'	=>	[
					'timestamp'		=>	'2017-03-15 08:30:45',
					'year'			=>	'2017',
					'month'			=>	'03',
					'month_name'	=>	'mar',
					'day'			=>	'15',
					'time'			=>	'18:30',
				],
			],
			'address'	=>	[
				'street'		=>	'Avenida Marechal Mário Guedes',
				'number'		=>	'40',
				'comp'			=>	'Apto 192',
				'neighborhood'	=>	'Jaguaré',
				'cep'			=>	'05.348-010',
				'city'			=>	'SÃO PAULO',
				'state'			=>	'SP',
			],
		];
		return view('user.order')->with(['order' => $order]);
	}
	function fakeLogin(){
		return redirect()->route('showOrder', ['id' => $_POST['orderNumber']]);
	}
}