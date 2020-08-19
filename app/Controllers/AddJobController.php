<?php 

namespace App\Controllers;
use App\Models\Job;
use Respect\Validation\Validator as Val;

class AddJobController extends BaseController {
    public function getAddJobAction($request) {

        $responseMessage = null;


        if ($request->getMethod() == 'POST') {

            $postData = $request->getParsedBody();
            

            $jobValidator = Val::key('title', Val::stringType()->notEmpty())
                                ->key('description', Val::stringType()->notEmpty())
                                ->key('months', Val::number()->notEmpty());
            
            try {
                $jobValidator->assert($postData);

                $files = $request->getUploadedFiles();
                // var_dump($files);
                $logo = $files['logo'];
                
                $job = new Job();

                if ($logo->getError() == UPLOAD_ERR_OK) {
                    $fileName = $logo->getClientFilename();
                    $logo->moveTo("uploads/$fileName");
                    $job->image_filename = $fileName;
                }
                $job->title = $postData['title'];
                $job->description = $postData['description'];
                $job->months = $postData['months'];
                $job->save();

                $responseMessage = 'Saved';
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
            
            
        }

        return $this->renderHTML('addJob.twig', [
            'responseMessage' => $responseMessage 
        ]);
    }
}