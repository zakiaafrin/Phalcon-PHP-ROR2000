<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    public function indexAction()
    {

    }
    public function registerAction()
    {
        $user = new Users();

        // Store and check for errors
        $success = $user->save(
            $this->request->getPost(),
            [
                "name",
                "email",
            ]
        );

        if ($success) {

            echo "<button style='background-color: #007bff; border-color: #007bff; border-radius:5px; font-size:18px; cursor: pointer; padding:6px; outline:none;'>";
                echo $this->tag->linkTo([
                    'phalconclass',
                    'Go Back',
                    'style' => " color: white; text-decoration:none;"]);
            echo "</button>";

            echo "<h1 style='text-align:center;margin-top:200px;'>Thanks for registering!</h1>";

        } else {
            echo "<h1 style='text-align:center;margin-top:200px;'>Sorry, the following problems were generated: </h1>";

            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo "<p style='text-align:center; font-size:22px;'>" . $message->getMessage() . "</p>";
            }
        }

        $this->view->disable();
    }
}