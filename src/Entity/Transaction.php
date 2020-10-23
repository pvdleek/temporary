<?php
declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Transaction
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public int $id;

    /**
     * @var Account
     * @ORM\ManyToOne(targetEntity="App\Entity\Account", inversedBy="transactions")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     */
    public Account $account;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    public DateTime $timestamp;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    public float $mutation;
}
