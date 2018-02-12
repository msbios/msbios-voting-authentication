<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication;

use MSBios\Voting\Authentication\Resolver\VoteInterface;
use MSBios\Voting\Resource\Record\PollInterface;
use Zend\Stdlib\PriorityQueue;

/**
 * Class VoteResolver
 * @package MSBios\Voting\Authentication
 */
class VoteResolver implements VoteResolverInterface
{
    /**
     * @var PriorityQueue|VoteInterface[]
     */
    protected $queue;

    /**
     * Constructor
     *
     * Instantiate the internal priority queue
     */
    public function __construct()
    {
        $this->queue = new PriorityQueue;
    }

    /**
     * @param PollInterface $poll
     * @return mixed
     */
    public function find(PollInterface $poll)
    {
        if (count($this->queue)) {
            /** @var VoteInterface $resolver */
            foreach ($this->queue as $resolver) {
                if ($resource = $resolver->find($poll)) {
                    return $resource;
                }
            }
        }
    }

    /**
     * @param VoteInterface $resolver
     * @param int $priority
     * @return $this
     */
    public function attach(VoteInterface $resolver, $priority = 1)
    {
        $this->queue->insert($resolver, $priority);
        return $this;
    }
}
