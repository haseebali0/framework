<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Flarum\SearchSuggestion\Command;

use Flarum\User\User;

class SaveSearchSuggestion
{
    /**
     * The attributes to assign to the new post.
     *
     * @var array
     */
    public $search_term;

    /**
     * @param string $ipAddress The IP address of the actor.
     */
    public function __construct(string $search_term)
    {
        $this->search_term = $search_term;
    }
}
