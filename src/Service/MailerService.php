<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
  private $from = 'michaelis@test.org';

  public function __construct(
    private MailerInterface $mailer,
    private ParameterBagInterface $params,
  ) {
    $this->mailer = $mailer;
    $this->params = $params;
  }

  public function prepareMail(
    array $to,
    array $cc,
    string $subject,
    string $text,
    string $html,
  ): Email
  {
    $mail = new Email();
    $mail
      ->to(...$to)
      ->cc(...$cc)
      ->from($this->params->get('mailer.from'))
      ->subject($subject)
      ->text($text)
      ->html($html);

    return $mail;
  }

  public function send(Email $mail)
  {
    $this->mailer->send($mail);
  }

}