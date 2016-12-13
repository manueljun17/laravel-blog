<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FooRepository;
use App\Http\Requests;

class FooController extends Controller
{
    private $repository;
    public function __construct(FooRepository $repository) {
        $this->repository = $repository;
    }
    public function foo(FooRepository $repository)
    {
        return $repository->get();
    }
}
