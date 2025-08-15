<?php

namespace App\Http\Controllers;

use App\Models\ProjectUser;
use App\Services\ProjectUserService;
use Illuminate\Http\Request;
use App\Helpers\Responses;
use App\Models\User;
use App\Models\Project;

class ProjectUsersController extends Controller
{
    protected $projectUserService;

    public function __construct(ProjectUserService $projectUserService)
    {
        $this->projectUserService = $projectUserService;
    }

    public function destroy (User $user, Project $project, ProjectUser $projectUser)
    {
      $id = $projectUser->id;
      $deleted = $this->projectUserService->destroy($id);
      return Responses::success('deletado com sucesso!');
    }

    public function create (Project $project, Request $request)
    {
      $validated = $request->validate ([
      'user_id' => 'required|integer|exists:users,id'
      ]);
      $data = ['user_id' => $validated['user_id'] ,'project_id' => $project->id];
      $created = $this->projectUserService->create($data);
      return Responses::success('Criado com sucesso', $created);
    }
}
