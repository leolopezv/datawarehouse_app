<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DimProduct
 * 
 * @property int $ProductID
 * @property string $Name
 * 
 * @property FactSale $fact_sale
 *
 * @package App\Models
 */
class DimProduct extends Model
{
	protected $table = 'dim_product';
	protected $primaryKey = 'ProductID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ProductID' => 'int'
	];

	protected $fillable = [
		'Name'
	];

	public function fact_sale()
	{
		return $this->hasOne(FactSale::class, 'ProductID');
	}
}
