<?php 

namespace App\Controllers;
use App\Models\{Project, Technology, ProjectAndTechnologyRelation};
use Respect\Validation\Validator as Val;

class AddProjectController extends BaseController {
    public function getAddProjectAction($request) {
        $technologies = Technology::all();
        $responseMessage = null;
     
        if ($request->getMethod() == 'POST') {

            $postData = $request->getParsedBody();

            $projectValidator = Val::key('title', Val::stringType()->notEmpty())
                                ->key('description', Val::stringType()->notEmpty())
                                ->key('technologies_selected', Val::arrayType()->notEmpty());
            
            try {
                $projectValidator->assert($postData);
                $project = new Project();
                $project->title = $postData['title'];
                $project->description = $postData['description'];
                $project->save();

                foreach ($postData['technologies_selected'] as $value => $selected) {
                    $projectTechnologies = new ProjectAndTechnologyRelation();
                    $projectTechnologies->technology_id = Technology::where('name', $value)->first()->id;
                    $projectTechnologies->project_id = $project->id;
                    $projectTechnologies->save();
                }

                $responseMessage = 'Saved';

            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }

            

            
            
        }

        return $this->renderHTML('addProject.twig', [
            'technologies' => $technologies,
            'responseMessage' => $responseMessage
        ]);
        
    }
}