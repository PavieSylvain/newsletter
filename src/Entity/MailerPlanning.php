<?php

namespace App\Entity;

use App\Repository\MailerPlanningRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MailerPlanningRepository::class)
 */
class MailerPlanning
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $PlannedAt;

    /**
     * @ORM\OneToOne(targetEntity=NewsLetter::class, inversedBy="mailerPlanning")
     * @ORM\JoinColumn(nullable=false)
     */
    private $newsletter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlannedAt(): ?\DateTimeImmutable
    {
        return $this->PlannedAt;
    }

    public function setPlannedAt(\DateTimeImmutable $PlannedAt): self
    {
        $this->PlannedAt = $PlannedAt;

        return $this;
    }

    public function getNewsletter(): ?NewsLetter
    {
        return $this->newsletter;
    }

    public function setNewsletter(NewsLetter $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }
}
