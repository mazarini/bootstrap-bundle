<?php

/*
 * Copyright (C) 2019 Mazarini <mazarini@protonmail.com>.
 * This file is part of mazarini/bootstrap.
 *
 * mazarini/bootstrap is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.
 *
 * mazarini/pagination is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License
 */

namespace App\Controller;

use Mazarini\TestBundle\Controller\StepController as BaseController;
use Mazarini\TestBundle\Fake\Pagination;
use Mazarini\ToolsBundle\Data\Data;
use Mazarini\ToolsBundle\Href\Hrefs;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class StepController extends BaseController
{
    public function __construct(RequestStack $requestStack, Hrefs $hrefs, Data $data)
    {
        parent::__construct($requestStack, $hrefs, $data);
        $this->parameters['datas'] = $this->getDatas($requestStack);
    }

    private function getDatas(RequestStack $requestStack): array
    {
        $datas = [];
        $a = [0, 1, 5, 6, 9];
        foreach ($a as $i) {
            $datas[] = $this->getData($requestStack, new Pagination(3, $i));
        }
        $a = [1, 2, 5, 6];
        foreach ($a as $i) {
            $datas[] = $this->getData($requestStack, new Pagination($i, 6));
        }

        return $datas;
    }

    private function getData(RequestStack $requestStack, Pagination $pagination): Data
    {
        $data = new Data();
        $data->setPagination($pagination);
        $data->setHrefs(new Hrefs($requestStack));
        $this->InitPaginationUrl($data);

        return $data;
    }
}
