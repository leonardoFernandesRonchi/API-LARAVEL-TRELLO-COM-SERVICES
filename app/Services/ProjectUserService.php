<?php
namespace App\Services;
use App\Models\User;
use App\Helpers\Responses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Project;
use App\Models\ProjectUser;


class ProjectUserService
{
    public function create ($data)
    {
      return ProjectUser::create($data);
    }

    public function destroy ($id)
    {
      $projectUser = ProjectUser::find($id);
      if(!$projectUser)
      {
        return Responses::error('Id de projeto não existente');

      }
      return ProjectUser::destroy($id);
    }

}


