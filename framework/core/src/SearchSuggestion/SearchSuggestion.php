<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Flarum\SearchSuggestion;

use Flarum\Database\AbstractModel;
use Flarum\Database\ScopeVisibilityTrait;
use Flarum\Foundation\EventGeneratorTrait;

/**
 */
class SearchSuggestion extends AbstractModel
{
    use EventGeneratorTrait;
    use ScopeVisibilityTrait;

    protected $fillable =['search_term', 'count'];
    
    protected $table = 'search_suggestions';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'id'];
}
