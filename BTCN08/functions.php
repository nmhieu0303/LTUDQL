<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sum($a, $b)
{
    return $a + $b;
}

function findUserById($id)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE id=?");
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findUserByEmail($email)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute(array($email));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findUserByUsername($username)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute(array($username));
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function changePass($id, $password)
{
    try {
        global $db;
        $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute(array($password, $id));
    } catch (PDOException $e) {
        echo 'Lỗi' . "<br>" . $e->getMessage();
    }
}

function createUser($fullname, $username, $password, $email, $code)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO users (fullname,username,password,email,activation) VALUES(?,?,?,?,?)");
    $stmt->execute(array($fullname, $username, $password, $email, $code));
    return findUserById($db->lastInsertId());
}

function getCurrentUser()
{
    if (isset($_SESSION['userId'])) {
        return findUserById($_SESSION['userId']);
    }
    return null;
}

function upload_avatar($userId, $avatar)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET avatar = ? WHERE id = ?");
    $stmt->execute(array($avatar, $userId));
}

// ===================IMG============================
function resizeImage($filename, $max_width, $max_height)
{
    list($orig_width, $orig_height) = getimagesize($filename);

    $width = $orig_width;
    $height = $orig_height;

    # taller
    if ($height > $max_height) {
        $width = ($max_height / $height) * $width;
        $height = $max_height;
    }

    # wider
    if ($width > $max_width) {
        $height = ($max_width / $width) * $height;
        $width = $max_width;
    }

    $image_p = imagecreatetruecolor($width, $height);

    $image = imagecreatefromjpeg($filename);

    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

    return $image_p;
}

function repquireLoggedIn()
{
    $currentUser = getCurrentUser();
    if (!$currentUser) {
        header('Location: login.php');
        exit();
    }
}


// ===========================     POST  ==============================


function getPosts()
{
    global $db;
    $stmt = $db->query("SELECT * FROM post ORDER BY created desc");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPostsOfUser(int $userid)
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM post WHERE userId = ? ORDER BY created DESC");
    $stmt->execute(array($userid));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function renderNewFeed()
{
    global $posts;
    foreach ((array)$posts as $post) {
        renderNews($post);
    }
}

function renderNews($post)
{
    $elementImg = $post['images']  == NULL ? '' : '<img src="post/' . $post['images'] . '" alt="" class="newfeed__item--img w-100">';
    $str = '<div class="newfeed__item">
        <div class="d-flex">
            <!-- Avatar -->
            <a href="#" class="newfeed__item--img"> 
                <img class="newfeed--avatar--img" src="avatar.php?id=' . $post['userId'] . '" alt="">
            </a>
            <!-- Info post -->
            <div class="newfeed__item--info ml-3 flex-grow-1">
                <div class = "d-flex justify-content-between">
                    <a href="#" class="info--username">' . findUserById($post['userId'])['fullname'] . '</a>
                    <a class="newfeed__item--more">
                        <i class="fas fa-angle-down"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <span class="info--time">' . $post['created'] . '</span>
                    <div class="info--separator">-</div>
                    <a href="#" class="info--privacy">
                        <i class="fas fa-globe-americas"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Content text -->
        <p class="newfeed__item--caption">'
        . $post['content'] .
        '</p>
        <!-- content media -->
        <div class="newfeed__item--media">'
        . $elementImg .
        '</div>
        <!-- Interactives -->
        <div class="newfeed__item--interactives">
            <div class="interactives__item">
                <div class="interactives__item--icon" onclick="like(this)">
                    <i class="far fa-heart"></i>
                </div>
                <span class="interactives__item--number">500</span>
            </div>
            <div id="interactives__item--comment" class="interactives__item">
                <a class="interactives__item--icon">
                    <i class="fas fa-comment-alt"></i>
                </a>
                <span class="interactives__item--number">500</span>
            </div>
            <div id="interactives__item--share" class="interactives__item">
                <a class="interactives__item--icon">
                    <i class="fas fa-share-alt"></i>
                </a>
                <span class="interactives__item--number">500</span>
            </div>
        </div>
    
    </div>';
    echo ($str);
}

function createNewPost($userId, $connent, $image)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO post (userId,content,images) VALUES(?, ?,?)");
    $stmt->execute(array($userId, $connent, $image));
    return $db->lastInsertId();
}

// Send mail
function sendMail($to, $subject, $content)
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'nmhieu03032000@gmail.com';                     // SMTP username
        $mail->Password   = 'hhiieeuu11';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('nmhieu03032000@gmail.com', 'Hờ Mờ Channel');
        $mail->addAddress($to);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject =  $subject;
        $mail->Body = $content;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function activateUser($userId)
{
    global $db;
    $stmt = $db->prepare("UPDATE users SET activation = NULL WHERE id = ?");
    $stmt->execute(array($userId));
}
