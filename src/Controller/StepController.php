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

namespace App\Controller;

use Mazarini\TestBundle\Controller\StepController as BaseController;
use Mazarini\TestBundle\Fake\Repository;
use Mazarini\TestBundle\Fake\UrlGenerator;
use Mazarini\TestBundle\Tool\Folder;
use Mazarini\ToolsBundle\Data\Data;
use Mazarini\ToolsBundle\Pagination\PaginationInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class StepController extends BaseController
{
    /**
     * @var UrlGenerator
     */
    protected $router;

    public function __construct(RequestStack $requestStack, UrlGenerator $router, Folder $folder)
    {
        parent::__construct($requestStack, $folder);
        $this->router = $router;

        $this->parameters['datas'] = $this->getDatas();
    }

    /**
     * getDatas.
     *
     * @return array<Data>
     */
    private function getDatas(): array
    {
        $repository = new Repository();
        $datas = [];
        $a = [0, 1, 45, 56, 119];
        foreach ($a as $i) {
            $datas[] = $this->getData($repository->getpage(3, $i));
        }
        $a = [1, 2, 5, 6];
        foreach ($a as $i) {
            $datas[] = $this->getData($repository->getpage($i));
        }

        return $datas;
    }

    private function getData(PaginationInterface $pagination): Data
    {
        $data = new Data(
            $this->router,
            'page',
            sprintf('page_index-%d', $pagination->getCurrentPage()),
            sprintf('#page_index-%d', $pagination->getCurrentPage())
        );
        $data->setPagination($pagination);
        $this->setPaginationUrl($data);

        return $data;
    }
}
