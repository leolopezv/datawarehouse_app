<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

// ventas por territorio
class VentasPorTerritorio extends Model
{
    //Este modelo no está asociado directamente con una tabla

    public static function getVentasPorTerritorio()
    {
        return DB::table('fact_sales')
            ->join('dim_territory', 'fact_sales.TerritoryID', '=', 'dim_territory.TerritoryID')
            ->select('dim_territory.Name as TerritoryName', DB::raw('SUM(fact_sales.Amount) as TotalSales'))
            ->groupBy('dim_territory.Name')
            ->orderBy('TotalSales', 'desc')
            ->get();
    }
}