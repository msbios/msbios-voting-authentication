<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Voting\Authentication\Exception\ResolverServiceNotFoundException;
use MSBios\Voting\Authentication\IdentityResolver;
use MSBios\Voting\Authentication\IdentityResolverInterface;
use MSBios\Voting\Authentication\Module;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class IdentityResolverFactory
 * @package MSBios\Voting\Authentication\Factory
 */
class IdentityResolverFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return IdentityResolver|IdentityResolverInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var IdentityResolverInterface $identityResolver */
        $identityResolver = new IdentityResolver;

        /** @var array $options */
        $options = $container->get(Module::class);

        /**
         * @var string $resolver
         * @var int $priority
         */
        foreach ($options['identity_resolvers'] as $resolver => $priority) {
            if (! $container->has($resolver)) {
                throw new ResolverServiceNotFoundException(
                    "Resolver '{$resolver}' Service is not found in Service Locator."
                );
            }
            $identityResolver->attach($container->get($resolver), $priority);
        }

        return $identityResolver;
    }
}
