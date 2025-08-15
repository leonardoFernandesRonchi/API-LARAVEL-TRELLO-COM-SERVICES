<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreateRequest;
use App\Models\Project;
use App\Models\User;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Helpers\Responses;
use App\Services\ProjectUserService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Container\Attributes\Auth;

class ProjectsController extends Controller
{
    use AuthorizesRequests;

    protected $projectService;
    protected $projectUserService;

    public function __construct(ProjectService $projectService, ProjectUserService $projectUserService)
    {
        $this->projectService = $projectService;
        $this->projectUserService = $projectUserService;
    }

    public function create (ProjectCreateRequest $project)
    {
        $user = Auth()->user(); 
        $data = $project->validated();
        $data['user_id'] = $user->id;
        try{
            $created = $this->projectService->create($data);
            $data['project_id'] = $created->id;
             $this->projectUserService->create($data);
            return Responses::success("Criado com sucesso", $created);
        } catch (\InvalidArgumentException $e){
            return Responses::error($e->getMessage());
        } 
       }

    public function update (Project $project, ProjectCreateRequest $ProjectCreateRequest)
    {
         $user = Auth()->user(); 
        $this->authorize('allow', $project);
        $data = $ProjectCreateRequest->validated();;
        $data['user_id'] = $user->id;
        $updated = $this->projectService->update($data, $project);
        return Responses::success('Atualizado com sucesso', $updated);
    }

    public function destroy (Project $project)
    {
        $user = Auth()->user(); 
        $id = $project->id;
        $deleted = $this->projectService->destroy($id);
        return Responses::success('deletado com sucesso');
    }

}
