<?php

/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Voting\Authentication;

return [

    'service_manager' => [
        'factories' => [
            Module::class =>
                Factory\ModuleFactory::class,
            VoteResolver::class =>
                Factory\IdentityResolverFactory::class
        ]
    ],

    Module::class => [

        // /**
        //  *
        //  * Expects: array
        //  * Default: [
        //  *     Resolver\VoteRepositoryResolver::class => -100
        //  * ]
        //  */
        // 'identity_resolvers' => [
        // ],
    ]
];
