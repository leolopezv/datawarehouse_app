<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VentasPorTiempo extends Model
{
    public static function getVentasTotalesPorTiempo()
    {
        return DB::table('fact_sales')
        ->select(
            'Month', // Use the 'Month' column directly
            'Year',  // Include the 'Year' as well since you have a separate column for it
            DB::raw('SUM(Amount) as TotalSales')
        )
        ->groupBy('Year', 'Month') // Group by both 'Year' and 'Month'
        ->orderBy('Year', 'asc')   // Make sure to order by 'Year' then by 'Month' to maintain chronological order
        ->orderBy('Month', 'asc')
        ->get();
    }
}