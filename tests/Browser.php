<?php

namespace Tests;

use Laravel\Dusk\Browser as BaseBrowser;

class Browser extends BaseBrowser
{
    /**
     * The default wait time in seconds.
     *
     * @var int
     */
    public static $waitSeconds = 10;

    /**
     * Get the element text at the given selector.
     */
    public function getTextIn($selector): string
    {
        return $this->resolver->findOrFail($selector)->getText();
    }
}
