<?php

namespace App\Controllers;

use Intersect\AbstractController;
use Intersect\Database\Model\Model;
use Intersect\Http\Response\TwigResponse;

class TestModel extends Model {}

class SampleController extends AbstractController {

    public function index()
    {
        return new TwigResponse('sample.twig', [
            'title' => 'Intersect Framework'
        ]);
    }

}