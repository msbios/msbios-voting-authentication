<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication;

use MSBios\Voting\Authentication\Resolver\IdentityInterface;
use MSBios\Voting\Resource\Record\PollInterface;
use Zend\Stdlib\PriorityQueue;

/**
 * Class IdentityResolver
 * @package MSBios\Voting\Authentication
 */
class IdentityResolver implements IdentityResolverInterface
{
    /**
     * @var PriorityQueue|IdentityInterface[]
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
            /** @var IdentityInterface $resolver */
            foreach ($this->queue as $resolver) {
                if ($resource = $resolver->find($poll)) {
                    return $resource;
                }
            }
        }
    }

    /**
     * @param IdentityInterface $resolver
     * @param int $priority
     * @return $this
     */
    public function attach(IdentityInterface $resolver, $priority = 1)
    {
        $this->queue->insert($resolver, $priority);
        return $this;
    }
}
