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

namespace App\Controller;

use App\Form\FakeType;
use Mazarini\TestBundle\Controller\StepController as BaseController;
use Mazarini\ToolsBundle\Data\Data;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/step")
 */
class StepController extends BaseController
{
    protected function afterAction(string $action): void
    {
        parent::afterAction($action);
        $this->parameters['datas'] = $this->getDatas();
        $this->parameters['dataNew'] = $this->fakeFactory->getCrudData('crud_new');
        $this->parameters['dataShow'] = $this->fakeFactory->getCrudData('crud_show');
        $this->parameters['dataEdit'] = $this->fakeFactory->getCrudData('crud_edit');
        $this->parameters['form'] = $this->container
            ->get('form.factory')
            ->createNamed('Entity', FakeType::class)
            ->createView()
        ;
    }

    /**
     * getDatas.
     *
     * @return array<Data>
     */
    private function getDatas(): array
    {
        $datas[] = $this->fakeFactory->getPaginationData('crud_page', 1, 0);
        $datas[] = $this->fakeFactory->getPaginationData('crud_page', 1, 1);

        foreach ([45, 56, 119] as $i) {
            $datas[] = $this->fakeFactory->getPaginationData('crud_page', 3, $i);
        }
        foreach ([1, 2, 5, 6] as $i) {
            $datas[] = $this->fakeFactory->getPaginationData('crud_page', $i);
        }

        return $datas;
    }
}
