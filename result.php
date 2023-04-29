<?php

require "vendor/autoload.php";

session_start();

// 4.

use App\QuestionManager;

$score = null;
try {
    $manager = new QuestionManager;
    $manager->initialize();

    $_SESSION["answers"]=$_POST;

    if (!isset($_SESSION['answers'])) {
        throw new Exception('Missing answers');
    }

    $score = $manager->computeScore($_SESSION['answers']);
    
} catch (Exception $e) {
    echo '<h1>An error occurred:</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Results</title>
</head>
<body>

<h1>Thank You!</h1>
<h3>
    Congratulations <?php echo $_SESSION['user_fullname']; ?>! (<?php echo $_SESSION['email'] ?>)</br>
    Score: <?php echo $score; ?> out of <?php echo $manager->getQuestionSize() ;?> items<br>Your Answers</h3>
    <h4 style="margin:-12pt"><ul><?php $ex = $manager->Question($_SESSION["answers"]);?></ul></h4>
</body>
</html>
