<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Flarum\SearchSuggestion;

use Illuminate\Database\Eloquent\Builder;

class SearchSuggestionRepository
{
    /**
     * Get a new query builder for the posts table.
     *
     * @return Builder<SearchSuggestion>
     */
    public function query()
    {
        return SearchSuggestion::query();
    }

    public function getByTerm(string $term){
        return $this->query()->where('search_term', $term)->first();
    }
}
