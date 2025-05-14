<?php
    class ConfessionController{
        public function showWall(){
            require_once __DIR__ . '/../models/confession.php';
            $confession = new Confession();
            $confessions = $confession->showAll();
            include __DIR__ . '/../views/confession_form.php';
        }

        public function postConfession(){
            $data = json_decode(file_get_contents('php://input'), true);

            if(empty($data['message']) || strlen($data['message']) < 20 ){
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Confession must be atleast 20 characters']);
                return;
            }

            require_once __DIR__ . '/../models/confession.php';
            $confession = new Confession();
            $confession->saveConfession($data['message']);

            echo json_encode([
                'success' => true,
                'message' => 'Confession Submitted',
                'entry' => [
                    'message' => htmlspecialchars($data['message']),
                    'date' => date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
?>