<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DimTerritory
 * 
 * @property int $TerritoryID
 * @property string $Name
 * 
 * @property FactSale $fact_sale
 *
 * @package App\Models
 */
class DimTerritory extends Model
{
	protected $table = 'dim_territory';
	protected $primaryKey = 'TerritoryID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TerritoryID' => 'int'
	];

	protected $fillable = [
		'Name'
	];

	public function fact_sale()
	{
		return $this->hasOne(FactSale::class, 'TerritoryID');
	}
}
