<?php

namespace App\Entity;

use App\Repository\MailNotificationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MailNotificationRepository::class)]
class MailNotification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $subject = null;

    #[ORM\Column(length: 255)]
    private ?string $mailTo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mailCc = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $text = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $html = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): static
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMailTo(): ?string
    {
        return $this->mailTo;
    }

    public function setMailTo(string $mailTo): static
    {
        $this->mailTo = $mailTo;

        return $this;
    }

    public function getMailCc(): ?string
    {
        return $this->mailCc;
    }

    public function setMailCc(?string $mailCc): static
    {
        $this->mailCc = $mailCc;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getHtml(): ?string
    {
        return $this->html;
    }

    public function setHtml(?string $html): static
    {
        $this->html = $html;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }
}
