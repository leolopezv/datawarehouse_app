<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


// Ventas por retailer
class VentasPorEmpleado extends Model

{
    // Este modelo no está asociado directamente con una tabla

    public static function getVentasPorEmpleado()
    {
        return DB::table('fact_sales')
            ->join('dim_employee', 'fact_sales.BusinessEntityID', '=', 'dim_employee.BusinessEntityID')
            ->select('dim_employee.FirstName', 'dim_employee.LastName', DB::raw('SUM(fact_sales.Amount) as TotalSales'))
            ->groupBy('fact_sales.BusinessEntityID')
            ->orderBy('TotalSales', 'desc')
            ->get();
    }

    
// obtener ventas totales para calcular porcentajes
    public static function getTotalSales()
    {
        return DB::table('fact_sales')
            ->sum('Amount');
    }


}
