<?php

namespace Nahoy\ApiPlatform\PlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * Class BasePaymentHistory
 *
 * @ORM\MappedSuperclass()
 */
class BasePaymentHistory
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups("paymentHistory")
     */
    protected $id;

    protected $createdAt;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Groups("paymentHistory")
     * @ApiFilter(SearchFilter::class, strategy="exact")
     */
    protected $name;

    /**
     * @ORM\Column(name="transactionId", type="string", length=255, nullable=false)
     * @Groups("paymentHistory")
     * @ApiFilter(SearchFilter::class, strategy="exact")
     */
    protected $transactionId;

    /**
     * @ORM\Column(name="method", type="string", length=255, nullable=false)
     * @Groups("paymentHistory")
     * @ApiFilter(SearchFilter::class, strategy="exact")
     */
    protected $method;

    protected $amount;

    /**
     * @Groups("paymentHistory")
     * @ApiFilter(SearchFilter::class, strategy="exact")
     */
    protected $plan;

    /**
     * @Groups("paymentHistory")
     * @ApiFilter(SearchFilter::class, strategy="exact")
     */
    protected $user;

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
     * Set name
     *
     * @param string $name
     *
     * @return BasePlan
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
