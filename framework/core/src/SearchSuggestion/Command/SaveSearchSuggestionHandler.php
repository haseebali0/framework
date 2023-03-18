<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Flarum\SearchSuggestion\Command;

use Carbon\Carbon;
use Flarum\SearchSuggestion\Command\SaveSearchSuggestion;
use Flarum\SearchSuggestion\SearchSuggestionRepository;
use Flarum\Foundation\DispatchEventsTrait;
use Flarum\Notification\NotificationSyncer;
use Flarum\SearchSuggestion\Event\Saving;
use Flarum\Post\PostValidator;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Arr;

class SaveSearchSuggestionHandler
{
    use DispatchEventsTrait;
    public $search_suggestion;
    
    public function __construct(
        Dispatcher $events,
        SearchSuggestionRepository $search_suggestion,
    ) {
        $this->events = $events;
        $this->search_suggestion = $search_suggestion;
    }

    /**
     * 
     */
    public function handle(SaveSearchSuggestion $command)
    {

        $search_suggestion =  $this->search_suggestion->getByTerm($command->search_term);

        if(!empty($search_suggestion)){
            $search_suggestion->increment('count',1);
        }else{
            $search_suggestion = $this->search_suggestion->query()->create([
                'search_term' => $command->search_term,
                'count' => 1
            ]);
        }

        $this->events->dispatch(
            new Saving($search_suggestion,$command->search_term)
        );

        return $search_suggestion;
    }
}
