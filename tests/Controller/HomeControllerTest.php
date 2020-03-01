<?php

/*
 * Copyright (C) 2019 Mazarini <mazarini@protonmail.com>.
 * This file is part of mazarini/bootstrap-bundle.
 *
 * mazarini/bootstrap-bundle is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.
 *
 * mazarini/bootstrap-bundle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License
 */

namespace App\Tests\Controller;

use Mazarini\TestBundle\Test\Controller\HomeControllerAbstractTest;

class HomeControllerTest extends HomeControllerAbstractTest
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * getUrls.
     *
     * @return \Traversable<mixed,array>
     */
    public function getUrls(): \Traversable
    {
        yield [''];
        yield ['/step'];
        yield ['/step/System'];
    }
}
