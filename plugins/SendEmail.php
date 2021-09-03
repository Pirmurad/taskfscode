<?php

namespace Core\Plugins;

use Core\SenderService;

class SendEmail extends SenderService
{
    public function formBuilder()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $html = '
                        <input type="hidden" value="SendEmail">
                   <div class="col-md-4">
                       <label for="email" class="form-label">Email</label>
                       <input id="email" name="email" type="email" class="form-control">
                   </div>
                   <div class="col-md-4">
                       <label for="subject" class="form-label">Subject</label>
                       <input id="subject" name="subject" type="text" class="form-control">
                   </div>
                   <div class="col-md-4">
                       <label for="message" class="form-label">Message</label>
                       <textarea  id="message" name="message" class="form-control" cols="30" rows="10"></textarea>
                   </div>
                   <div class="col-md-4">
                       <button id="submit" class="btn btn-primary mt-3">Send</button>
                   </div>';

            echo json_encode($html);
        }
    }

    public function send()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $_POST = json_decode(file_get_contents("php://input"),true);

            $mail = $_POST['data'][0]['value'];
            $subject = $_POST['data'][1]['value'];
            $message = $_POST['data'][2]['value'];

            $errors = [];
            $success= true;

            if (empty($mail)){
                array_push($errors,'Email is required');
                $success = false;
            }
            if (empty($subject)){
                array_push($errors,'Subject is required');
                $success = false;
            }
            if (empty($message)){
                array_push($errors,'Message is required');
                $success = false;
            }

            // maille bagli emeliyyatlar

            echo json_encode(['success'=>$success,'errors'=>$errors]);
        }
    }
}