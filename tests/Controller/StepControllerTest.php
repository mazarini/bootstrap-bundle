<?php

/*
 * Copyright (C) 2019 Mazarini <mazarini@protonmail.com>.
 * This file is part of mazarini/bootstrap.
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

use Mazarini\TestBundle\Test\Controller\UrlControllerAbstractTest;
use Mazarini\TestBundle\Tool\Folder;

class StepControllerTest extends UrlControllerAbstractTest
{
    /**
     * getUrls.
     *
     * @return \Traversable<int,array>
     */
    public function getUrls(): \Traversable
    {
        $folder = new Folder();
        $steps = $folder->getSteps();
        foreach ($steps as $step => $dummy) {
            yield ['/'.$step.'.html'];
        }
    }
}