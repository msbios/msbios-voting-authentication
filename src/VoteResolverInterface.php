<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication;

use MSBios\Voting\Authentication\Resolver\VoteInterface;

/**
 * Interface IdentityResolverInterface
 * @package MSBios\Voting\Authentication
 */
interface VoteResolverInterface extends VoteInterface
{
    /**
     * @param VoteInterface $resolver
     * @param int $priority
     * @return mixed
     */
    public function attach(VoteInterface $resolver, $priority = 1);
}
