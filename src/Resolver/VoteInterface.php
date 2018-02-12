<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication\Resolver;

use MSBios\Voting\Resource\Record\PollInterface;

/**
 * Interface VoteInterface
 * @package MSBios\Voting\Authentication\Resolver
 */
interface VoteInterface
{
    /**
     * @param PollInterface $poll
     * @return mixed
     */
    public function find(PollInterface $poll);
}
