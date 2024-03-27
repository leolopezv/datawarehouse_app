<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FactSale
 * 
 * @property int $BusinessEntityID
 * @property int $ProductID
 * @property int $TerritoryID
 * @property int $Month
 * @property int $Year
 * @property float $Amount
 * 
 * @property DimEmployee $dim_employee
 * @property DimTime $dim_time
 * @property DimProduct $dim_product
 * @property DimTerritory $dim_territory
 *
 * @package App\Models
 */
class FactSale extends Model
{
	protected $table = 'fact_sales';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'BusinessEntityID' => 'int',
		'ProductID' => 'int',
		'TerritoryID' => 'int',
		'Month' => 'int',
		'Year' => 'int',
		'Amount' => 'float'
	];

	protected $fillable = [
		'BusinessEntityID',
		'ProductID',
		'TerritoryID',
		'Month',
		'Year',
		'Amount'
	];

	public function dim_employee()
	{
		return $this->belongsTo(DimEmployee::class, 'BusinessEntityID');
	}

	public function dim_time()
	{
		return $this->belongsTo(DimTime::class, 'Year', 'Year');
	}

	public function dim_product()
	{
		return $this->belongsTo(DimProduct::class, 'ProductID');
	}

	public function dim_territory()
	{
		return $this->belongsTo(DimTerritory::class, 'TerritoryID');
	}
}
