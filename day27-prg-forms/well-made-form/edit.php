<?php

require_once 'DBBlackbox.php';
require_once 'Song.php';

// start the session
session_start();

// extract the success message from the session
$success_message = $_SESSION['success_message'] ?? null;

// delete the success message from the session
unset($_SESSION['success_message']);

// extract error messages from the session
$error_messages = $_SESSION['error_messages'] ?? [];

// delete the error messages from the session
unset($_SESSION['error_messages']);

// find the ID of the record we want to edit in the request
$id = $_GET['id'];

// somehow retrieve existing song from some storage
$song = find( $id, 'Song' );

?>

<?php include 'top-menu.php'; ?>

<?php if ($success_message) : ?>

    <style>
        .success-message {
            background-color: lightgreen;
            padding: 1em;
            border: 1px solid green;
        }
    </style>
    <div class="success-message">
        <?= $success_message ?>
    </div>

<?php endif; ?>

<?php if ($error_messages) : ?>

    <style>
        .error-message {
            background-color: pink;
            padding: 1em;
            border: 1px solid red;
        }
    </style>

    <?php foreach ($error_messages as $input_name => $errors) : ?>

        <?php foreach ($errors as $error) : ?>

            <div class="error-message">
                <?= $error ?>
            </div>

        <?php endforeach; ?>

    <?php endforeach; ?>

<?php endif; ?>

<form action="update.php?id=<?= $id ?>" method="post">

    <!-- display the form prefilled with entity data -->

    Name:<br>
    <input type="text" name="name" value="<?= htmlspecialchars((string)$song->name) ?>"><br>
    <br>

    Author:<br>
    <input type="text" name="author" value="<?= htmlspecialchars((string)$song->author) ?>"><br>
    <br>

    Length:<br>
    <input type="number" name="length" value="<?= htmlspecialchars((string)$song->length) ?>"> seconds<br>
    <br>

    Album:<br>
    <input type="text" name="album" value="<?= htmlspecialchars((string)$song->album) ?>"><br>
    <br>

    <button type="submit">Save</button>

</form>