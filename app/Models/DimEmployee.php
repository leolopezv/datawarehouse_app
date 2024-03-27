<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DimEmployee
 * 
 * @property int $BusinessEntityID
 * @property string $FirstName
 * @property string $LastName
 * @property string $JobTitle
 * 
 * @property FactSale $fact_sale
 *
 * @package App\Models
 */
class DimEmployee extends Model
{
	protected $table = 'dim_employee';
	protected $primaryKey = 'BusinessEntityID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'BusinessEntityID' => 'int'
	];

	protected $fillable = [
		'FirstName',
		'LastName',
		'JobTitle'
	];

	public function fact_sale()
	{
		return $this->hasOne(FactSale::class, 'BusinessEntityID');
	}
}
