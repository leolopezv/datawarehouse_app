<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentasPorTerritorio;
use App\Models\VentasPorEmpleado;
use App\Models\VentasPorTiempo;
use App\Models\VentasPorProducto;

class GraficoPreguntaController extends Controller
{
    //control k y control c para comentar --> Windows
    // comand + shift + / ---> MAC

    //1: Ventas por territorio

    public function showVentasPorTerritorio()
    {
        $salesData = VentasPorTerritorio::getVentasPorTerritorio();

        // Crear un array de etiquetas y otro de datos para Chart.js
        $labels = $salesData->map(function ($item) {
            return $item->TerritoryName;
        });
        $data = $salesData->pluck('TotalSales');

        return view('ventasterritorio', compact('labels', 'data'));
    }



    //2: Ventas por empleado

    public function showVentasPorEmpleado()
    {
        $salesData = VentasPorEmpleado::getVentasPorEmpleado();
        $totalSales = VentasPorEmpleado::getTotalSales(); // Obtener el total de ventas
    
        $labels = $salesData->map(function ($item) {
            return $item->FirstName . ' ' . $item->LastName;
        });
    
        // Calcular el porcentaje de ventas para cada empleado
        $percentages = $salesData->map(function ($item) use ($totalSales) {
            return ($item->TotalSales / $totalSales) * 100;
        });
    
        $data = $salesData->pluck('TotalSales');
    
        // Generar colores de fondo de manera dinámica
        $backgroundColor = $salesData->map(function () {
            return 'rgb(' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ')';
        })->all();
    
        return view('ventasempleado', compact('labels', 'percentages', 'backgroundColor'));
    }



    //3: Ventas por mes y año

    public function showVentasTotalesPorTiempo()
    {
        $ventasData = VentasPorTiempo::getVentasTotalesPorTiempo();
        $labels = $ventasData->map(function ($venta) {
            return str_pad($venta->Month, 2, '0', STR_PAD_LEFT);
        });
    
        $data = $ventasData->pluck('TotalSales');

        $backgroundColor = $ventasData->map(function () {
            return 'rgba(' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ', 0.2)';
        })->all();

        $borderColor = $ventasData->map(function () {
            return 'rgb(' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ')';
        })->all();
    
        return view('ventastiempo', compact('labels', 'data', 'backgroundColor', 'borderColor'));
    }

    //4: Ventas por producto

    public function showVentasPorProducto()
    {
        $salesData = VentasPorProducto::getVentasPorProducto();
        $labels = $salesData->map(function ($item) {
            return $item->ProductName;
        });
        $data = $salesData->pluck('TotalSales');

        $backgroundColor = $salesData->map(function () {
            return 'rgba(' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ', 0.2)';
        })->all();

        $borderColor = array_fill(0, count($backgroundColor), 'rgb(0, 0, 0)');
    
        return view('ventasproducto', compact('labels', 'data', 'backgroundColor', 'borderColor'));
    }

    // public function showVentasPorProducto()
    // {
    //     $salesData = VentasPorProducto::getVentasPorProducto();
    //     $totalSales = VentasPorProducto::getTotalSales(); // Obtener el total de ventas
    
    //     $labels = $salesData->map(function ($item) {
    //         return $item->Product;
    //     });
    
    //     // Calcular el porcentaje de ventas para cada producto
    //     $percentages = $salesData->map(function ($item) use ($totalSales) {
    //         return ($item->TotalSales / $totalSales) * 100;
    //     });
    
    //     $data = $salesData->pluck('TotalSales');
    
    //     // Generar colores de fondo de manera dinámica
    //     $backgroundColor = $salesData->map(function () {
    //         return 'rgb(' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ',' . mt_rand(0, 255) . ')';
    //     })->all();
    
    //     return view('ventasproducto', compact('labels', 'percentages', 'backgroundColor'));
    // }
}