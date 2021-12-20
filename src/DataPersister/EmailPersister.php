<?php
namespace App\DataPersister;

use App\Entity\ReportClient;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
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
        
       
        $email = (new TemplatedEmail())
			->from('podmax52@gmail.com@gmail.com')
			->to('podevinmaxence@gmail.com')
			//->cc('exemple@mail.com')
			//->bcc('exemple@mail.com')
			//->replyTo('test42@gmail.com')
			//->priority(Email::PRIORITY_HIGH)
			->subject('I love Me')
			// If you want use text mail only
			->text('Lorem ipsum...')
			// If you want use raw html
			->html('<h1>ludo y suce</h1> <p>...</p>')
			// if you want use template from your twig file
			// template/emails/registration.html.twig
			//->htmlTemplate('emails/registration.html.twig')
			// with param 
			->context([
				'username' => 'John',
			])
			;
		$this->mailer->send($email);
    }
}