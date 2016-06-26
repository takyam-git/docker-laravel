<?php
namespace App\Domains\Message;

use App\Domains\Message;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query;

class Repository
{
    private $em;
    private $messageRepository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->messageRepository = $this->em->getRepository(Message::class);
    }

    /**
     * @param int $id
     * @return Message|null
     */
    public function find(int $id)
    {
        return $this->messageRepository->find($id);
    }

    /**
     * @return Message|null
     */
    public function findLast()
    {
        $messages = $this->messageRepository->findBy([], ['createdAt' => 'DESC'], 1, 0);
        return count($messages) > 0 ? $messages[0] : null;
    }

    /**
     * @param Message $message
     */
    public function save(Message $message)
    {
        $this->em->persist($message);
        $this->em->flush();
    }
}