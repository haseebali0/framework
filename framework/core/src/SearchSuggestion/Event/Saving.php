<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Flarum\SearchSuggestion\Event;

use Flarum\SearchSuggestion\SearchSuggestion;

class Saving
{
    /**
     * The Search Suggestion that will be saved.
     *
     * @var \Flarum\Post\Post
     */
    public $search_suggestion;

    /**
     * The attributes to update on the search_suggestion.
     *
     * @var string
     */
    public $search_term;

    /**
     * @param \Flarum\SearchSuggestion\SearchSuggestion $search_suggestion
     * @param string $search_term
     */
    public function __construct(SearchSuggestion $search_suggestion, string $search_term)
    {
        $this->search_suggestion = $search_suggestion;
        $this->search_term = $search_term;
    }
}
