<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 09.07.2016
 * Time: 1:27
 */

namespace App\Helpers;

use Zofe\Rapyd\Facades\DataGrid;

class GridGenerator
{
    static function getAllMail()
    {
        $grid = DataGrid::source('mails');
        $grid->attributes(array("class" => "table table-striped table-bordered"));
        $grid->add('check', '<a id="checkbox"><span class="label label-primary">check</span></a>')->cell(function ($values, $row) {
            return '<input class="input shiftCheckbox" type="checkbox"
                                                   name="letterId' . $row->id . '"
                                                   value="' . $row->id . '"/>';
        })->style('width: 20px');

        $grid->add('address', 'Получатель')->cell(function ($value, $row) {
            return '<a href ="/letter/'.$row->id.'" >' . $row->address . '</a>';
        })->style('width: 300px');

        $grid->add('title', 'Тема')->cell(function ($value, $row) {
            return '<a href ="/letter/'.$row->id.'" >' . $row->title . '</a>';
        })->style('width: 300px');
        $grid->add('created_at', 'Отправлено')->style('width: 100px');


        return $grid;
    }


}