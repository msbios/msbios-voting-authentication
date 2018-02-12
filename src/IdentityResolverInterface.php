<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication;

use MSBios\Voting\Authentication\Resolver\IdentityInterface;

/**
 * Interface IdentityResolverInterface
 * @package MSBios\Voting\Authentication
 */
interface IdentityResolverInterface extends IdentityInterface
{
    /**
     * @param IdentityInterface $resolver
     * @param int $priority
     * @return mixed
     */
    public function attach(IdentityInterface $resolver, $priority = 1);
}
