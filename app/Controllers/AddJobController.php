<?php 

namespace App\Controllers;
use App\Models\Job;

class AddJobController {
    public function getAddJobAction($request) {

        //var_dump($request->getMethod());
        //var_dump((string)$request->getBody());
        //var_dump($request->getParsedBody());

        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $job = new Job();
            $job->title = $postData['title'];
            $job->description = $postData['description'];
            $job->months = $postData['months'];
            $job->save();
        }

        include '../views/addJob.php';
    }
}