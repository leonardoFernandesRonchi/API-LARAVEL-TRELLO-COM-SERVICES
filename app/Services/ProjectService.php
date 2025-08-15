<?php
namespace App\Services;
use App\Models\User;
use App\Helpers\Responses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Project;




class ProjectService
{
    public function create ($data)
    {
        if (empty($data))
        {
          throw new \InvalidArgumentException('Informação vazia');
        }
       return Project::create($data);
    }

    public function update ($data, $project)
    {
      if (empty($data) || empty($data['name']) || empty($data['description']))
      {
        throw new \InvalidArgumentException('Name ou Description vazios');
      }
        return $project->update($data);
    }

    public function destroy ($id)
    {
      $project = Project::find($id);
      if(!$project)
      {
        return Responses::error('Id  de projeto não existente');
      }
      return Project::destroy($id);
    }
}
