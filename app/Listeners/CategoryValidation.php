<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CategoryValidation
{

  private $category;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
      $this->category = $category;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Request $request, $event)
    {
        $event->category->validation($request[

        ],[

        ]);
    }
}
