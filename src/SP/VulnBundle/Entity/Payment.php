<?php
/**
 * Created by PhpStorm.
 * User: sprudnikov
 * Date: 07.12.2016
 * Time: 15:56
 */

namespace SP\VulnBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="SP\VulnBundle\Entity\Repository\PaymentRepository")
 * @ORM\Table(name="payment")
 */
class Payment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")x
     */
    protected $id;

    /**
     * @var Account
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumn(name="from_acc", referencedColumnName="id")
     */
    protected $fromAccount;

    /**
     * @var Account
     * @ORM\ManyToOne(targetEntity="Account")
     * @ORM\JoinColumn(name="to_acc", referencedColumnName="id")

     */
    protected $toAccount;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $paymentTime;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $amount;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $description;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $status;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set paymentTime
     *
     * @param \DateTime $paymentTime
     *
     * @return Payment
     */
    public function setPaymentTime($paymentTime)
    {
        $this->paymentTime = $paymentTime;
    
        return $this;
    }

    /**
     * Get paymentTime
     *
     * @return \DateTime
     */
    public function getPaymentTime()
    {
        return $this->paymentTime;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Payment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Payment
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Payment
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set fromAccount
     *
     * @param \SP\VulnBundle\Entity\Account $fromAccount
     *
     * @return Payment
     */
    public function setFromAccount(Account $fromAccount = null)
    {
        $this->fromAccount = $fromAccount;
    
        return $this;
    }

    /**
     * Get fromAccount
     *
     * @return \SP\VulnBundle\Entity\Account
     */
    public function getFromAccount()
    {
        return $this->fromAccount;
    }

    /**
     * Set toAccount
     *
     * @param \SP\VulnBundle\Entity\Account $toAccount
     *
     * @return Payment
     */
    public function setToAccount(Account $toAccount = null)
    {
        $this->toAccount = $toAccount;
    
        return $this;
    }

    /**
     * Get toAccount
     *
     * @return \SP\VulnBundle\Entity\Account
     */
    public function getToAccount()
    {
        return $this->toAccount;
    }
}
