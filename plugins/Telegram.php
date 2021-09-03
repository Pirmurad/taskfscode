<?php

namespace Core\Plugins;

use Core\SenderService;

class Telegram extends SenderService {

    public function formBuilder()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $html = '
                    <div class="col-md-4">
                       <label for="user_id" class="form-label">User ID</label>
                        <input type="text" id="user_id" name="user_id" class="form-control">
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = json_decode(file_get_contents("php://input"), true);

            array_shift($_POST);

            $User_id = $_POST[0]['value'];
            $message = $_POST[1]['value'];

            $errors = [];
            $success = true;

            if (empty($User_id)) {
                array_push($errors, 'User ID is required');
                $success = false;
            }

            if (empty($message)) {
                array_push($errors, 'Message is required');
                $success = false;
            }

//            // Telegramla bagli emeliyyatlar

            echo json_encode(['success' => $success, 'errors' => $errors]);
        }

    }
}