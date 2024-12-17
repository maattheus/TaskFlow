<?php

namespace App\Services;

use App\Repositories\Projects\ProjectRepository;

class ProjectService
{

    private $projectRepo;

    public function __construct(ProjectRepository $projectRepo)
    {

        $this->projectRepo = $projectRepo;

    }

    public function create($data)
    {

        return $this->projectRepo->create($data);

    }


    public function getAllByUser()
    {

        return $this->projectRepo->getAllByUser();

    }


}