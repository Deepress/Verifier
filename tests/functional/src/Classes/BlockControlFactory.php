<?php

declare(strict_types=1);

namespace Tests\Functional\Classes;

/**
 * @author Jáchym Toušek <enumag@gmail.com>
 */
interface BlockControlFactory
{
    /**
     * @return BlockControl
     */
    public function create(): BlockControl;
}
