<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\UsersDataTable;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    //
    public function index(UsersDataTable $dataTable)
    {
        // return $dataTable->render('indexDatatables');
        $model = User::query();
        return DataTables::of($model)->toJson();
    }
}
