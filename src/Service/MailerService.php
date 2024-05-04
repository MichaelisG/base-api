<?php

namespace App\Service;

use App\Repository\MailNotificationRepository;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
  private $from = 'michaelis@test.org';

  public function __construct(
    private MailerInterface $mailer,
    private ParameterBagInterface $params,
    private MailNotificationRepository $mailNotificationRepository,
  ) {
    $this->mailer = $mailer;
    $this->params = $params;
    $this->mailNotificationRepository = $mailNotificationRepository;
  }

  public function prepareMailByCode(string $code): ?Email
  {
    $mail = new Email();

    $mailNotification = $this->mailNotificationRepository->findOneBy(['code' => $code]);
    if ($mailNotification === null) {
      return null;
    }

    dump($this->_buildAddressList($mailNotification->getMailTo()));
    dump($this->_buildAddressList($mailNotification->getMailCc()));

    $mail
      ->to(...$this->_buildAddressList($mailNotification->getMailTo()))
      ->cc(...$this->_buildAddressList($mailNotification->getMailCc()))
      ->from($this->params->get('mailer.from'))
      ->subject($mailNotification->getSubject())
      ->text($mailNotification->getText())
      ->html($mailNotification->getHtml());

    return $mail;
  }

  public function send(Email $mail)
  {
    $this->mailer->send($mail);
  }

  private function _buildAddressList(?string $addresses): array
  {
    $addressList = [];
    if ($addresses === null) {
      return $addressList;
    }

    $addresses = explode(',', $addresses);
    foreach($addresses as $address) {
      $address = trim($address);
      if (!empty($address)) {
        $addressList[] = $address;
      }
    }
    return $addressList;
  }

}