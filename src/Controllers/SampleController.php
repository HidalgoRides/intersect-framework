<?php

namespace App\Controllers;

use Intersect\AbstractController;
use Intersect\Http\Response\TwigResponse;

class SampleController extends AbstractController {

    public function index()
    {
        return new TwigResponse('sample.twig', [
            'title' => 'Intersect Framework'
        ]);
    }

}