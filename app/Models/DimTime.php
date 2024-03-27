<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DimTime
 * 
 * @property int $Month
 * @property int $Year
 * 
 * @property FactSale $fact_sale
 *
 * @package App\Models
 */
class DimTime extends Model
{
	protected $table = 'dim_time';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Month' => 'int',
		'Year' => 'int'
	];

	public function fact_sale()
	{
		return $this->hasOne(FactSale::class, 'Year', 'Year');
	}
}
