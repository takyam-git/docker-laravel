<?php

namespace App\Http\Controllers;

use App\Domains\Message\Repository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    private $messageRepository;

    public function __construct(Repository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function showIndex()
    {
        $message = $this->messageRepository->findLast();
        return view('welcome', ['message' => $message !== null ? $message->getText() : '(empty)']);
    }
}
