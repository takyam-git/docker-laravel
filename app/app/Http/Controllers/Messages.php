<?php

namespace App\Http\Controllers;

use App\Domains\Message;
use App\Domains\Message\Repository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Messages extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    private $messageRepository;

    public function __construct(Repository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function create()
    {
        $message = new Message();
        $message->setText(date(\DateTime::W3C));
        $this->messageRepository->save($message);

        return redirect('/');
    }
}
