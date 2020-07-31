<?php

namespace Sunriseqf\LaravelShop\Data\Goods\Observers;

use Sunriseqf\LaravelShop\Data\Goods\Models\Category;

class CategoryObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \Sunriseqf\LaravelShop\Data\Goods\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    public function creating()
    {

    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \Sunriseqf\LaravelShop\Data\Goods\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \Sunriseqf\LaravelShop\Data\Goods\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \Sunriseqf\LaravelShop\Data\Goods\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \Sunriseqf\LaravelShop\Data\Goods\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
