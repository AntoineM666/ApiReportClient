<?php
namespace App\DataPersister;

use App\Entity\ReportClient;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\MailerInterface;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;

final class EmailPersister implements ContextAwareDataPersisterInterface
{
    private $decorated;
    private $mailer;

    public function __construct(ContextAwareDataPersisterInterface $decorated, MailerInterface $mailer)
    {
        $this->decorated = $decorated;
        $this->mailer = $mailer;
    }

    public function supports($data, array $context = []): bool
    {
        return $this->decorated->supports($data, $context);
    }

    public function persist($data, array $context = [])
    {
        $result = $this->decorated->persist($data, $context);

        if (
            $data instanceof ReportClient && (
                ($context['collection_operation_name'] ?? null) === 'post' ||
                ($context['graphql_operation_name'] ?? null) === 'create'
            )
        ) {
            $this->sendWelcomeEmail($data);
        }

        return $result;
    }

    public function remove($data, array $context = [])
    {
        return $this->decorated->remove($data, $context);
    }


    private function sendWelcomeEmail()
    {
     
        
        $transport = Transport::fromDsn('null://localhost');
        $mailer = new Mailer($transport);
        
        $email = (new Email())
            ->from('hello@example.com')
            ->to('podevinmaxence@gmail.com')
           
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');
        
        $mailer->send($email);
    }
}