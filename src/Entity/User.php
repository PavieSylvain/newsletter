<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=Level::class, inversedBy="users")
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity=Civility::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $civility;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cellphone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailSponsorship;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $bornAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $realEstateProjects;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bankDetails;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPickable;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPickableValidated;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasNewsletter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $siret;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasWaiver;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=History::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $histories;

    /**
     * @ORM\ManyToMany(targetEntity=Profile::class)
     */
    private $profiles;

    /**
     * @ORM\OneToMany(targetEntity=UserPlatform::class, mappedBy="user", orphanRemoval=true)
     */
    private $userPlatforms;

    /**
     * @ORM\OneToMany(targetEntity=UserAgency::class, mappedBy="user", orphanRemoval=true)
     */
    private $userAgency;

    /**
     * @ORM\OneToMany(targetEntity=Adress::class, mappedBy="user", orphanRemoval=true)
     */
    private $addresses;

    /**
     * @ORM\OneToMany(targetEntity=Sponsorship::class, mappedBy="user", orphanRemoval=true)
     */
    private $sponsorships;

    /**
     * @ORM\OneToMany(targetEntity=Management::class, mappedBy="user", orphanRemoval=true)
     */
    private $managements;

    /**
     * @ORM\ManyToOne(targetEntity=Group::class, inversedBy="user")
     * @ORM\JoinColumn(nullable=true)
     */
    private $group;

    /**
     * @ORM\OneToMany(targetEntity=NewsLetter::class, mappedBy="author", orphanRemoval=true)
     */
    private $newsLetters;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mailjet_id;

    public function __construct()
    {
        $this->profiles = new ArrayCollection();
        $this->userPlatforms = new ArrayCollection();
        $this->userAgency = new ArrayCollection();
        $this->addresses = new ArrayCollection();
        $this->sponsorships = new ArrayCollection();
        $this->managements = new ArrayCollection();
        $this->newsLetters = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getAuthor(): ?self
    {
        return $this->author;
    }

    public function setAuthor(?self $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getLevel(): ?Level
    {
        return $this->level;
    }

    public function setLevel(?Level $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getCivility(): ?Civility
    {
        return $this->civility;
    }

    public function setCivility(?Civility $civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCellphone(): ?string
    {
        return $this->cellphone;
    }

    public function setCellphone(?string $cellphone): self
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    public function getEmailSponsorship(): ?string
    {
        return $this->emailSponsorship;
    }

    public function setEmailSponsorship(?string $emailSponsorship): self
    {
        $this->emailSponsorship = $emailSponsorship;

        return $this;
    }

    public function getBornAt(): ?\DateTime
    {
        return $this->bornAt;
    }

    public function setBornAt(?\DateTime $bornAt): self
    {
        $this->bornAt = $bornAt;

        return $this;
    }

    public function getRealEstateProjects(): ?string
    {
        return $this->realEstateProjects;
    }

    public function setRealEstateProjects(?string $realEstateProjects): self
    {
        $this->realEstateProjects = $realEstateProjects;

        return $this;
    }

    public function getBankDetails(): ?string
    {
        return $this->bankDetails;
    }

    public function setBankDetails(?string $bankDetails): self
    {
        $this->bankDetails = $bankDetails;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsPickable(): ?bool
    {
        return $this->isPickable;
    }

    public function setIsPickable(bool $isPickable): self
    {
        $this->isPickable = $isPickable;

        return $this;
    }

    public function getIsPickableValidated(): ?bool
    {
        return $this->isPickableValidated;
    }

    public function setIsPickableValidated(bool $isPickableValidated): self
    {
        $this->isPickableValidated = $isPickableValidated;

        return $this;
    }

    public function getHasNewsletter(): ?bool
    {
        return $this->hasNewsletter;
    }

    public function setHasNewsletter(bool $hasNewsletter): self
    {
        $this->hasNewsletter = $hasNewsletter;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getHasWaiver(): ?bool
    {
        return $this->hasWaiver;
    }

    public function setHasWaiver(bool $hasWaiver): self
    {
        $this->hasWaiver = $hasWaiver;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getHistories(): ?History
    {
        return $this->histories;
    }

    public function setHistories(?History $histories): self
    {
        $this->histories = $histories;

        return $this;
    }

    /**
     * @return Collection|Profile[]
     */
    public function getProfiles(): Collection
    {
        return $this->profiles;
    }

    public function addProfile(Profile $profile): self
    {
        if (!$this->profiles->contains($profile)) {
            $this->profiles[] = $profile;
        }

        return $this;
    }

    public function removeProfile(Profile $profile): self
    {
        $this->profiles->removeElement($profile);

        return $this;
    }

    /**
     * @return Collection|UserPlatform[]
     */
    public function getUserPlatforms(): Collection
    {
        return $this->userPlatforms;
    }

    public function addUserPlatform(UserPlatform $userPlatform): self
    {
        if (!$this->userPlatforms->contains($userPlatform)) {
            $this->userPlatforms[] = $userPlatform;
            $userPlatform->setUser($this);
        }

        return $this;
    }

    public function removeUserPlatform(UserPlatform $userPlatform): self
    {
        if ($this->userPlatforms->removeElement($userPlatform)) {
            // set the owning side to null (unless already changed)
            if ($userPlatform->getUser() === $this) {
                $userPlatform->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserAgency[]
     */
    public function getUserAgency(): Collection
    {
        return $this->userAgency;
    }

    public function addUserAgency(UserAgency $userAgency): self
    {
        if (!$this->userAgency->contains($userAgency)) {
            $this->userAgency[] = $userAgency;
            $userAgency->setUser($this);
        }

        return $this;
    }

    public function removeUserAgency(UserAgency $userAgency): self
    {
        if ($this->userAgency->removeElement($userAgency)) {
            // set the owning side to null (unless already changed)
            if ($userAgency->getUser() === $this) {
                $userAgency->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Adress[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Adress $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setUser($this);
        }

        return $this;
    }

    public function removeAddress(Adress $address): self
    {
        if ($this->addresses->removeElement($address)) {
            // set the owning side to null (unless already changed)
            if ($address->getUser() === $this) {
                $address->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Sponsorship[]
     */
    public function getSponsorships(): Collection
    {
        return $this->sponsorships;
    }

    public function addSponsorship(Sponsorship $sponsorship): self
    {
        if (!$this->sponsorships->contains($sponsorship)) {
            $this->sponsorships[] = $sponsorship;
            $sponsorship->setUser($this);
        }

        return $this;
    }

    public function removeSponsorship(Sponsorship $sponsorship): self
    {
        if ($this->sponsorships->removeElement($sponsorship)) {
            // set the owning side to null (unless already changed)
            if ($sponsorship->getUser() === $this) {
                $sponsorship->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Management[]
     */
    public function getManagements(): Collection
    {
        return $this->managements;
    }

    public function addManagement(Management $management): self
    {
        if (!$this->managements->contains($management)) {
            $this->managements[] = $management;
            $management->setUser($this);
        }

        return $this;
    }

    public function removeManagement(Management $management): self
    {
        if ($this->managements->removeElement($management)) {
            // set the owning side to null (unless already changed)
            if ($management->getUser() === $this) {
                $management->setUser(null);
            }
        }

        return $this;
    }

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function setGroup(?Group $group): self
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @return Collection|NewsLetter[]
     */
    public function getNewsLetters(): Collection
    {
        return $this->newsLetters;
    }

    public function addNewsLetter(NewsLetter $newsLetter): self
    {
        if (!$this->newsLetters->contains($newsLetter)) {
            $this->newsLetters[] = $newsLetter;
            $newsLetter->setAuthor($this);
        }

        return $this;
    }

    public function removeNewsLetter(NewsLetter $newsLetter): self
    {
        if ($this->newsLetters->removeElement($newsLetter)) {
            // set the owning side to null (unless already changed)
            if ($newsLetter->getAuthor() === $this) {
                $newsLetter->setAuthor(null);
            }
        }

        return $this;
    }

    public function getMailjetId(): ?int
    {
        return $this->mailjet_id;
    }

    public function setMailjetId(?int $mailjet_id): self
    {
        $this->mailjet_id = $mailjet_id;

        return $this;
    }
}
