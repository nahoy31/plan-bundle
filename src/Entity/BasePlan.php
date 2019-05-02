<?php

namespace Nahoy\ApiPlatform\PlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * Class BasePlan
 *
 * @ORM\MappedSuperclass()
 */
class BasePlan
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups("plan")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Groups("plan")
     * @ApiFilter(SearchFilter::class, strategy="exact")
     */
    protected $name;

    /**
     * @ORM\Column(name="code", type="string", length=255, nullable=false)
     * @Groups("plan")
     * @ApiFilter(SearchFilter::class, strategy="exact")
     */
    protected $code;

    /**
     * @ORM\Column(name="amount", type="integer", nullable=true)
     * @Groups("plan")
     */
    protected $amount;

    /**
     * @ORM\Column(name="subtitle", type="string", length=255, nullable=true)
     * @Groups("plan")
     * @ApiFilter(SearchFilter::class, strategy="exact")
     */
    protected $subtile;

    /**
     * @ORM\Column(name="descriptionRows", type="simple_array", nullable=true)
     * @Groups("plan")
     */
    protected $descriptionRows;

    /**
     * @ORM\Column(name="buttonText", type="string", length=255, nullable=true)
     * @Groups("plan")
     * @ApiFilter(SearchFilter::class, strategy="exact")
     */
    protected $buttonText;

    /**
     * @ORM\Column(name="buttonVariant", type="string", length=255, nullable=true)
     * @Groups("plan")
     * @ApiFilter(SearchFilter::class, strategy="exact")
     */
    protected $buttonVariant;

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

    /**
     * Set code
     *
     * @param string $code
     *
     * @return BasePlan
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return BasePlan
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
     * Set subtitle
     *
     * @param string $subtile
     *
     * @return BasePlan
     */
    public function setSubtile($subtile)
    {
        $this->subtile = $subtile;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string
     */
    public function getSubtile()
    {
        return $this->subtile;
    }

    /**
     * Set descriptionRows
     *
     * @param array $descriptionRows
     *
     * @return BasePlan
     */
    public function setDescriptionRows($descriptionRows)
    {
        $this->descriptionRows = $descriptionRows;

        return $this;
    }

    /**
     * Get descriptionRows
     *
     * @return array
     */
    public function getDescriptionRows()
    {
        return $this->descriptionRows;
    }

    /**
     * Set buttonText
     *
     * @param string $buttonText
     *
     * @return BasePlan
     */
    public function setButtonText($buttonText)
    {
        $this->buttonText = $buttonText;

        return $this;
    }

    /**
     * Get buttonText
     *
     * @return string
     */
    public function getButtonText()
    {
        return $this->buttonText;
    }

    /**
     * Set buttonVariant
     *
     * @param string $buttonVariant
     *
     * @return BasePlan
     */
    public function setButtonVariant($buttonVariant)
    {
        $this->buttonVariant = $buttonVariant;

        return $this;
    }

    /**
     * Get buttonVariant
     *
     * @return string
     */
    public function getButtonVariant()
    {
        return $this->buttonVariant;
    }
}
