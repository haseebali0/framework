<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

use Flarum\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

return Migration::createTable(
    'search_suggestions',
    function (Blueprint $table) {
        $table->increments('id');
        $table->string('search_term', 200);
        $table->integer('count')->unsigned()->default(1);
        $table->timestamp('created_at');
    }
);
