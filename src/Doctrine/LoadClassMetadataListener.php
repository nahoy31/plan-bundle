<?php

namespace Nahoy\ApiPlatform\PlanBundle\Doctrine;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;

/**
 * Class LoadClassMetadataListener
 */
class LoadClassMetadataListener implements EventSubscriber
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var string
     */
    protected $plan;

    /**
     * @var string
     */
    protected $paymentHistory;

    /**
     * @var string
     */
    protected $user;

    /**
     * Constructor
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        $this->plan           = $container->getParameter('nahoy_api_platform_plan.class.plan');
        $this->paymentHistory = $container->getParameter('nahoy_api_platform_plan.class.payment_history');
        $this->user           = $container->getParameter('nahoy_api_platform_plan.class.user');
    }

    public function getSubscribedEvents()
    {
        return array(
            Events::loadClassMetadata,
        );
    }

    /**
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        // the $metadata is the whole mapping info for this class
        $metadata = $eventArgs->getClassMetadata();

        $class = new \ReflectionClass($metadata->getName());

        /*
        if (
            $this->plan === $class->getName() &&
            !$metadata->isMappedSuperclass
        ) {
            $metadata->mapManyToOne([
                'targetEntity'  => $this->user,
                'fieldName'     => 'user',
                'joinColumns' => [[
                    'name'                 => 'user_id',
                    'referencedColumnName' => 'id',
                    'nullable'             => true,
                ]]
            ]);
        }
        */

        if (
            $this->paymentHistory === $class->getName() &&
            !$metadata->isMappedSuperclass
        ) {
            $metadata->mapManyToOne([
                'targetEntity'  => $this->user,
                'fieldName'     => 'user',
                'joinColumns' => [[
                    'name'                 => 'user_id',
                    'referencedColumnName' => 'id',
                    'nullable'             => true,
                ]]
            ]);

            $metadata->mapManyToOne([
                'targetEntity'  => $this->plan,
                'fieldName'     => 'plan',
                'joinColumns' => [[
                    'name'                 => 'plan_id',
                    'referencedColumnName' => 'id',
                    'nullable'             => true,
                ]]
            ]);
        }
    }
}
