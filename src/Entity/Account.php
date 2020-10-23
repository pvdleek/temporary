<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\Entity()
 */
class Account
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public int $id;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="accounts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    public User $user;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public string $number;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    public float $balance;

    /**
     * @var PersistentCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="account")
     */
    private PersistentCollection $transactions;

    /**
     * @return PersistentCollection
     */
    public function getTransactions(): PersistentCollection
    {
        return $this->transactions;
    }
}
