<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class VentasPorProducto extends Model
{
    // Este modelo no está asociado directamente con una tabla

    public static function getVentasPorProducto()
    {
        return DB::table('fact_sales')
            ->join('dim_product', 'fact_sales.ProductID', '=', 'dim_product.ProductID')
            ->select('dim_product.Name as ProductName', DB::raw('SUM(fact_sales.Amount) as TotalSales'))
            ->groupBy('dim_product.Name')
            ->orderBy('TotalSales', 'desc')
            ->get();
    }
}
