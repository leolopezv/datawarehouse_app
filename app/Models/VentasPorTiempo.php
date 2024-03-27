<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VentasPorTiempo extends Model
{
    public static function getVentasTotalesPorTiempo()
    {
    // Este ejemplo asume que tus datos ya están organizados por meses consecutivos
    return DB::table('fact_sales')
        ->select(
            DB::raw('MONTH(Date) as Month'), // Asegúrate de que 'Date' es tu columna de fecha
            DB::raw('SUM(Amount) as TotalSales')
        )
        ->groupBy(DB::raw('MONTH(Date)'))
        ->orderByRaw('MIN(Date)') // Ordena por la fecha mínima para mantener el orden cronológico
        ->get();
    }
}