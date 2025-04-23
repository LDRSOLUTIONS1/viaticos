<?php
namespace App\Http\Librerias;
use Illuminate\Support\Facades\DB;
class DataSQL
{
    public function count($table, $where)
    {
        $count = DB::table($table)->whereRaw($where)->count();
        return $count;
    }
    public function sum($table, $column, $where)
    {
        $sum = DB::table($table)->whereRaw($where)->sum($column);
        return $sum;
    }
}