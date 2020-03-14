<?php

namespace App\Controllers;

use Intersect\Controllers\AbstractController;
use Intersect\Http\Response\ViewResponse;

class SampleController extends AbstractController {

    public function index()
    {
        return new ViewResponse('sample.php', [
            'title' => 'Intersect Framework'
        ]);
    }

}