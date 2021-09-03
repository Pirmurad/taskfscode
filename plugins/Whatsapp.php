<?php

namespace Core\Plugins;

use Core\SenderService;

class Whatsapp extends SenderService {

    public function formBuilder()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $html = '
                   <div class="col-md-4">
                       <label for="name" class="form-label">Name</label>
                       <input id="name" name="name" type="text" class="form-control">
                   </div>  
                     <div class="col-md-4">
                       <label for="phone" class="form-label">Phone</label>
                       <input id="phone" name="phone" type="number" class="form-control">
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

            array_shift($_POST);

            $name = $_POST[0]['value'];
            $phone = $_POST[1]['value'];
            $message = $_POST[2]['value'];

            $errors = [];
            $success = true;

            if (empty($name)) {
                array_push($errors, 'Name is required');
                $success = false;
            }

            if (empty($phone)) {
                array_push($errors, 'Phone is required');
                $success = false;
            }

            if (empty($message)) {
                array_push($errors, 'Message is required');
                $success = false;
            }

//            // Whatsappla bagli emeliyyatlar

            echo json_encode(['success' => $success, 'errors' => $errors]);
        }
    }
}