<?php

// Debug: show PHP errors in the browser (helps when you only see HTTP 500). Set to false when the site is live.
const CLAMA_DEBUG_SHOW_ERRORS = true;
if (CLAMA_DEBUG_SHOW_ERRORS) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
}

include 'lib/functions.php';
include 'lib/sql_connect.php';
require_once __DIR__ . '/lib/scientific_article.php';
require 'libs/Smarty.class.php';


session_start();

$isAdmin = !empty($_SESSION['user_id']);
$isAdminWebsite = $isAdmin;

$smarty = new Smarty;
$smarty->assign('article_publish_web_id', CLAMA_ARTICLE_PUBLISH_WEB_ID);
$url_path = $_SERVER['REQUEST_URI'] ?? '/';
$last_url_part = basename(parse_url((string) $url_path, PHP_URL_PATH) ?: '/');
if ($last_url_part === '' || $last_url_part === '/') {
    $last_url_part = 'home';
}
$directory_path = isset($directory_path) ? (string) $directory_path : '';
$tok = strtok($last_url_part, '?');
$last_url_part_path = ($tok !== false) ? $tok : $last_url_part;
$last_url_part_path = str_replace($directory_path, '', $last_url_part_path);
$eqPos = strrpos($last_url_part, '=');
$last_url_part_query = ($eqPos !== false) ? substr($last_url_part, $eqPos + 1) : '';

$web_id = trim($_SERVER['HTTP_HOST']);
$web_id = str_replace("www.","", $web_id);
$website = $web_id;
$base_url = $web_id;
$date = date("Y-m-d");

$smarty->assign("base_url", 'http://' . $base_url);
$smarty->assign('date', $date);


$sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";

$tracker = '';
$web_no = '';
$logo = '';
$logo_small = '';
$board = '';
$collection = '';
$type = '';
$object = '';
$object_description = '';
$title = 'Clama Magazine';
$metadescription = '';
$keywords = '';
$web_settings = null;
$submission_id = '';

foreach ($conn->query($sql) as $row)
{
    $tracker = $row['tracker'] ?? '';
    $web_no = $row['web_no'] ?? '';
    $logo = $row['logo'] ?? '';
    $logo_small = $row['logo_small'] ?? '';
    $type = $row['type'] ?? '';
    if (!empty($row['name'])) {
        $title = (string) $row['name'];
    }
}

if ($type === '') {
    $type = 'magazine';
}
if ($object === '') {
    $object = 'article';
}
if ($object_description === '') {
    $object_description = 'main text';
}

$smarty->assign('tracker', $tracker);

$navbar = ['home'=>'Home', 'about'=>'About', 'board'=>$board, 'collection'=>$collection, 'contact'=>'Contact'];
$site = ['type'=>$type, 'object'=>$object, 'object_description'=>$object_description];
$smarty->assign('navbar', $navbar);
$smarty->assign('site', $site);

$smarty->assign('website', $website);
$smarty->assign('website', $website);
$smarty->assign('logo', $logo);
$smarty->assign('logo_small', $logo_small);
$smarty->assign('web_no', $web_no);
$smarty->assign('title', $title);
$smarty->assign('metadescription', $metadescription);
$smarty->assign('keywords', $keywords);
$smarty->assign('isAdmin', $isAdmin);
$smarty->assign('isAuthor', false);
$smarty->assign('year', (string) date('Y'));
$smarty->assign('loading_time', '');
$smarty->assign('msg', '');
$smarty->assign('message', '');
$smarty->assign('article', clama_empty_article_form());
$smarty->assign('content_hint_message', '');
$smarty->assign('message_type', 'info');
switch ($last_url_part_path)
{



case 'energy-articles':
   
    
     
         $homepage_post_number = 100;
         $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
            foreach ($conn->query($sql) as $row)
            {
                $homepage_post_number = $row["homepage_post_number"];
                if ($homepage_post_number == 'random')
                {
                    $homepage_post_number = rand(5, 25);
                }
                elseif ($homepage_post_number == '' || $homepage_post_number == 0)
                {
                    $homepage_post_number = 100;
                }
            }

            $sql = "SELECT * FROM `submissions` WHERE `web_id` = '$web_id'";
            $articles = $conn->query($sql);

            $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
           /// $web_settings = $conn->query($sql);

            $smarty->assign("web_settings", $web_settings);
            $smarty->assign("articles", $articles);
            $smarty->assign("homepage_post_number", $homepage_post_number);
            $smarty->assign('title', 'Energy Articles');
         
            $smarty->display('archive.tpl');
break;
   
   
   case 'car-review':
    
         $homepage_post_number = 100;
         $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
            foreach ($conn->query($sql) as $row)
            {
                $homepage_post_number = $row["homepage_post_number"];
                if ($homepage_post_number == 'random')
                {
                    $homepage_post_number = rand(5, 25);
                }
                elseif ($homepage_post_number == '' || $homepage_post_number == 0)
                {
                    $homepage_post_number = 100;
                }
            }

            $sql = "SELECT * FROM `submissions` WHERE `web_id` = '$web_id'";
            $articles = $conn->query($sql);

            $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
           /// $web_settings = $conn->query($sql);

            $smarty->assign("web_settings", $web_settings);
            $smarty->assign("articles", $articles);
            $smarty->assign("homepage_post_number", $homepage_post_number);
            $smarty->assign('title', 'Archive');
         
            $smarty->display('car-review.tpl');
break;
   
   
case 'new-electric-cars':
    
         $homepage_post_number = 100;
         $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
            foreach ($conn->query($sql) as $row)
            {
                $homepage_post_number = $row["homepage_post_number"];
                if ($homepage_post_number == 'random')
                {
                    $homepage_post_number = rand(5, 25);
                }
                elseif ($homepage_post_number == '' || $homepage_post_number == 0)
                {
                    $homepage_post_number = 100;
                }
            }

            $sql = "SELECT * FROM `submissions` WHERE `web_id` = '$web_id'";
            $articles = $conn->query($sql);

            $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
           /// $web_settings = $conn->query($sql);

            $smarty->assign("web_settings", $web_settings);
            $smarty->assign("articles", $articles);
            $smarty->assign("homepage_post_number", $homepage_post_number);
            $smarty->assign('title', 'Archive');
         
            $smarty->display('new-electric-cars.tpl');
break;
   
    case "validate":

        if (isset($_POST['submitbutton']))
        {

            $username = $_POST['username'];
            $password = $_POST['password'];
        }

        $sql = "SELECT * FROM `users` WHERE `email` = '$username'";
        foreach ($conn->query($sql) as $row)
        {
            $actual_password = $row['password'];
            $user_id = $row['user_id'];
        }

        if (password_verify($password, $actual_password) || isset($_SESSION["user_id"]))
        {
            session_start();
            $_SESSION['user_id'] = $user_id;
            header('Location: write-article');
        }
        else
        {
            header('Location: login');
        }

    break;

    case "login":
        $smarty->assign("title", "Login");
        $smarty->display('login.tpl');
    break;

case "forgot-password":

        if (!isset($_POST['send_password_button']))
        {
            $smarty->assign("title", "Forgot Password");
            $smarty->display('forgot-password.tpl');
        }

        if (isset($_POST['send_password_button']))
        {

            $new_password = randomPassword();

            $email = $_POST['email'];

            $sql = "SELECT * FROM `users` WHERE `email` = '$email'";

            foreach ($conn->query($sql) as $row)
            {
                $email_exist = $row["email"];
            }

            if ($email_exist)
            {

                $name = $row["name"];

                $message = "
Dear $name, 
                        
Your password was reset. 
Your username: $email 
Your new password is: $new_password 
Sign in page: http://xafh7070.odns.fr
                        
Regards
                        
Webmaster";
                mail($email, "Password Reset", $message);
                $sth = $conn->prepare('UPDATE `users` SET  `password`=? WHERE `email`=?');
                $sth->bindParam(1, password_hash($new_password, PASSWORD_DEFAULT));
                $sth->bindParam(2, $email);
                $done = $sth->execute();
                $smarty->assign("success", true);
                $smarty->assign("message", "The password reset and sent to your email address!", true);
                $smarty->display('forgot-password.tpl');
            }
            else
            {
                $smarty->assign("success", false);
                $smarty->assign("message", "The email does not exists!", true);
                $smarty->assign("title", "Forgot Password");
                $smarty->display('forgot-password.tpl');
            }
        }

    break;

    case 'write-article':

        $image_number = rand(0, 2);
        $image_number_text = clama_number_to_text($image_number);
        if ($image_number < 2)
        {
            $image = $image_number_text . ' image';
        }
        else
        {
            $image = $image_number_text . ' images';
        }

        $video_number = rand(0, 2);
        $video_number_text = clama_number_to_text($video_number);
        if ($video_number < 2)
        {
            $video = $video_number_text . ' video';
        }
        else
        {
            $video = $video_number_text . ' videos';
        }

        $link_number = rand(0, 2);
        $link_number_text = clama_number_to_text($link_number);
        if ($link_number < 2)
        {
            $link = $link_number_text . ' link';
        }
        else
        {
            $link = $link_number_text . ' links';
        }

        $content_hint_message = 'Note: use ' . $image . ', ' . $video . ' and ' . $link;
        $message_type = 'info';
        $related_link_number = rand(0, 3);
        $total_allowed_link_number = $image_number + $video_number + $link_number;
        $smarty->assign('content_hint_message', $content_hint_message);
        $smarty->assign('related_link_number', $related_link_number);
        $smarty->assign('message_type', $message_type);
        $smarty->assign("title", "Write Article");
        $smarty->assign('total_allowed_link_number', $total_allowed_link_number);
        $smarty->assign('article', clama_empty_article_form());

        $smarty->display('write-article.tpl');

    break;

    case 'write-scientific-article':

        clama_scientific_assign_content_hints($smarty);
        $smarty->assign('title', 'Write Scientific Article');
        $smarty->assign('article', clama_empty_scientific_article_step1_form());
        $smarty->display('write-scientific-article-step-1.tpl');

    break;

    case 'submit-scientific-article':

        $clama_submit_user_id = (int) ($_SESSION['user_id'] ?? 0);

        if (isset($_POST['submit']))
        {
            try {
                $draft_id = clama_scientific_insert_draft($conn_builder, $clama_submit_user_id, $_POST);
            } catch (PDOException $e) {
                clama_scientific_assign_content_hints($smarty);
                $smarty->assign('title', 'Write Scientific Article');
                $smarty->assign('article', clama_scientific_step1_article($_POST));
                $smarty->assign('message', 'Could not save draft. Import sql/article_builder_drafts.sql into your article-builder database (see lib/sql_connect.php).');
                $smarty->assign('message_type', 'danger');
                $smarty->display('write-scientific-article-step-1.tpl');
                break;
            }

            $st = $conn_builder->prepare('SELECT * FROM `scientific_article_drafts` WHERE `draft_id` = ? LIMIT 1');
            $st->execute([$draft_id]);
            $article = $st->fetch(PDO::FETCH_ASSOC);
            if (!is_array($article)) {
                $article = [];
            }
            $article = clama_scientific_step2_article($article);

            $smarty->assign('title', 'Write Scientific Article — step 2');
            $smarty->assign('submission_id', $draft_id);
            $smarty->assign('keywords', $article['keywords']);
            $smarty->assign('article', $article);
            $smarty->display('write-scientific-article-step-2.tpl');
        }
        else
        {
            header('location: write-scientific-article');
        }

    break;

    case 'submit-scientific-article-finilize':

        $clama_submit_user_id = (int) ($_SESSION['user_id'] ?? 0);

        if (isset($_POST['submit']))
        {
            $res = clama_scientific_finalize($conn, $conn_builder, $clama_submit_user_id, $_POST);
            if ($res['ok'])
            {
                if ($clama_submit_user_id > 0) {
                    header('Location: my-articles');
                } else {
                    header('Location: energy-articles');
                }
                exit;
            }

            $draft_id = (int)($_POST['submission_id'] ?? 0);
            $st = $conn_builder->prepare('SELECT * FROM `scientific_article_drafts` WHERE `draft_id` = ? LIMIT 1');
            $st->execute([$draft_id]);
            $article = $st->fetch(PDO::FETCH_ASSOC) ?: [];
            $article = clama_scientific_step2_article($article);

            $smarty->assign('title', 'Write Scientific Article — step 2');
            $smarty->assign('submission_id', $draft_id);
            $smarty->assign('keywords', $article['keywords'] ?? '');
            $smarty->assign('article', $article);
            $smarty->assign('message', $res['message']);
            $smarty->assign('message_type', 'danger');
            $smarty->display('write-scientific-article-step-2.tpl');
        }
        else
        {
            header('location: write-scientific-article');
        }

    break;

    case 'waiting-articles':

        if ($isAdmin)
        {

            $sql = "SELECT * FROM `submissions` ORDER BY `submission_id` DESC;";
            $i = 0;
            foreach ($conn->query($sql) as $article)
            {

                $web_id = $article["web_id"];
                $submission_id = $article["submission_id"];
                $scan_id = $article["scan_id"];

                //find web_no using web_id
                $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
                foreach ($conn->query($sql) as $row)
                {
                    $web_no = $row["web_no"];
                }

                //check if the duplicate results exists in database
                if ($article["similar_results"])
                {

                    $status = $article["status"];
                    $scan_id = $article["scan_id"];
                    $is_duplicated = $article["is_duplicated"];
                    $duplicate_percentage = $article["duplicate_percentage"];
                    $used_credits = $article["used_credits"];
                    $similar_results = $article["similar_results"];

                    // check if the article is under duplicate checking
                    
                }
                elseif ($article["scan_id"] && !$article["similar_results"])
                {

                    $check_result = duplicate_check($article["scan_id"]);
                    $status = $check_result["status"];

                    if ($status == 'success')
                    {

                        $is_duplicated = $check_result["is_duplicated"];
                        $duplicate_percentage = $check_result["duplicate_percentage"];
                        $used_credits = $check_result["used_credits"];
                        $similar_results = $check_result["similar_results"];

                        $sth = $conn->prepare('UPDATE `submissions` SET `scan_status`=?, `is_duplicated`=?, `duplicate_percentage`=?, `used_credits`=?, `similar_results`=? WHERE `submission_id`=?');
                        $sth->bindParam(1, $status);
                        $sth->bindParam(2, $is_duplicated);
                        $sth->bindParam(3, $duplicate_percentage);
                        $sth->bindParam(4, $used_credits);
                        $sth->bindParam(5, $similar_results);
                        $sth->bindParam(6, $submission_id);
                        $sth->execute();

                    }
                    else
                    {

                        $sth = $conn->prepare('UPDATE `submissions` SET `scan_status`=? WHERE `submission_id`=?');
                        $sth->bindParam(1, $status);
                        $sth->execute();

                    }
                }

                $articles[$i] = array(
                    "web_no" => $web_no,
                    "keywords" => keyword_analysis(strtolower($article['content'] . $article['title'])) ,
                    "title" => $article['title'],
                    "rejected" => $article['rejected'],
                    "published" => $article['published'],
                    "web_id" => $article['web_id'],
                    "url" => $article['url'],
                    "submission_id" => $article['submission_id'],
                    "submitted" => $article['submitted'],
                    "status" => $status,
                    "is_duplicated" => $is_duplicated,
                    "scan_id" => $scan_id,
                    "duplicate_percentage" => $duplicate_percentage,
                    "similar_results" => $similar_results
                );
                $i++;
            }

            $smarty->assign("articles", $articles);
            $smarty->assign("title", "Waiting Articles");
            $smarty->display('articles-list.tpl');

        }
        else
        {
            header('location: login');
        }

    break;

    case 'save':

        $title = strip_tags(trim($_POST['title'] ?? ''));

        $body_mode = $_POST['body_mode'] ?? 'type';
        $word_upload_used = false;
        $content = $_POST['content'] ?? '';

        $submission_web_id = CLAMA_ARTICLE_PUBLISH_WEB_ID;

        $url = string_to_url($title);

        $content_hint_message = $_POST['content_hint_message'] ?? '';

        $keywords = $_POST['keywords'] ?? '';
        $metadescription = $_POST['metadescription'] ?? '';
        $related_link_number = $_POST['related_link_number'] ?? '';

        $related_links_1 = check_empty($_POST['related_links_1'] ?? '');
        $related_links_text_1 = check_empty($_POST['related_links_text_1'] ?? '');

        $related_links_2 = check_empty($_POST['related_links_2'] ?? '');
        $related_links_text_2 = check_empty($_POST['related_links_text_2'] ?? '');

        $related_links_3 = check_empty($_POST['related_links_3'] ?? '');
        $related_links_text_3 = check_empty($_POST['related_links_text_3'] ?? '');
        $user_id = (int) ($_SESSION['user_id'] ?? 0);

        $publish_web_no = '';
        $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$submission_web_id'";
        foreach ($conn->query($sql) as $row)
        {
            $publish_web_no = $row["web_no"];
        }

        $message = '';
        $message_type = 'info';

        $article_form = [
            "title" => $title,
            "content" => $content,
            "web_id" => $submission_web_id,
            "url" => $url,
            "keywords" => $keywords,
            "metadescription" => $metadescription,
            "related_links_1" => $related_links_1,
            "related_links_text_1" => $related_links_text_1,
            "related_links_2" => $related_links_2,
            "related_links_text_2" => $related_links_text_2,
            "related_links_3" => $related_links_3,
            "related_links_text_3" => $related_links_text_3,
        ];

        if ($body_mode === 'upload') {
            $uf = $_FILES['word_document'] ?? null;
            $upload_err = null;
            if (!$uf || ($uf['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
                $upload_err = 'Please select a .docx file, or switch to “Write here”.';
            } elseif (($uf['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
                $upload_err = 'File upload failed (error ' . (int) ($uf['error'] ?? 0) . ').';
            } else {
                $check = clama_validate_word_upload($uf);
                if (!$check['ok']) {
                    $upload_err = $check['error'];
                } elseif (!is_uploaded_file((string) $uf['tmp_name'])) {
                    $upload_err = 'Invalid upload.';
                } else {
                    $parsed = clama_docx_to_html((string) $uf['tmp_name']);
                    if ($parsed === null) {
                        $upload_err = 'Could not read this file. Save from Word as .docx and try again.';
                    } elseif (trim(strip_tags($parsed)) === '') {
                        $upload_err = 'No text was found in the document.';
                    } else {
                        $content = $parsed;
                        $word_upload_used = true;
                    }
                }
            }
            if ($upload_err !== null) {
                $message = $upload_err;
                $message_type = 'danger';
                $total_allowed_link_number = $_POST['total_allowed_link_number'] ?? '';
                $smarty->assign('web_no', $publish_web_no);
                $smarty->assign('message', $message);
                $smarty->assign('message_type', $message_type);
                $smarty->assign('content_hint_message', $content_hint_message);
                $smarty->assign('related_link_number', $related_link_number);
                $smarty->assign('total_allowed_link_number', $total_allowed_link_number);
                $smarty->assign('article', array_merge(clama_empty_article_form(), $article_form));
                $smarty->assign('title', 'Write Article');
                $smarty->assign('body_mode_restore', 'upload');
                $smarty->display('write-article.tpl');
                break;
            }
        }

        $url_number = count_url($content);
        $total_allowed_link_number = $_POST['total_allowed_link_number'] ?? '';
        if ($word_upload_used) {
            $total_allowed_link_number = $url_number;
        }

        if ($url_number == $total_allowed_link_number)
        {

            $sth = $conn->prepare('INSERT INTO `submissions`(`web_id`, `url`, `title`, `content`, `keywords`, `related_links_1`,`related_links_text_1`, `related_links_2`, `related_links_text_2`,`related_links_3`, `related_links_text_3`, `metadescription`, `user_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)');

            $sth->bindParam(1, $submission_web_id);
            $sth->bindParam(2, $url);
            $sth->bindParam(3, $title);
            $sth->bindParam(4, $content);
            $sth->bindParam(5, $keywords);
            $sth->bindParam(6, $related_links_1);
            $sth->bindParam(7, $related_links_text_1);
            $sth->bindParam(8, $related_links_2);
            $sth->bindParam(9, $related_links_text_2);
            $sth->bindParam(10, $related_links_3);
            $sth->bindParam(11, $related_links_text_3);
            $sth->bindParam(12, $metadescription);
            $sth->bindParam(13, $user_id);
            $sth->execute();

            if ($user_id > 0) {
                header('Location: my-articles');
            } else {
                header('Location: energy-articles');
            }
            exit;
        }

        $content_hint_message = $_POST['content_hint_message'] ?? '';
        $message_type = 'danger';
        $message = 'The number of links in the content does not match the required number.';
        $article = array_merge(clama_empty_article_form(), $article_form);

        $smarty->assign('web_no', $publish_web_no);
        $smarty->assign('message', $message);
        $smarty->assign('message_type', $message_type);
        $smarty->assign('content_hint_message', $content_hint_message);
        $smarty->assign('related_link_number', $related_link_number);
        $smarty->assign('total_allowed_link_number', $total_allowed_link_number);
        $smarty->assign('article', $article);
        $smarty->assign("title", "Write Article");

        $smarty->display('write-article.tpl');

    break;

    case 'account':

        if ($isAdmin)
        {

            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM `users` WHERE `user_id`= '$user_id'";
            foreach ($conn->query($sql) as $user)
            {
                $user = ['name' => $user['name'], 'last_name' => $user['last_name'], 'country' => $user['country'], 'email' => $user['email'], 'gender' => $user['gender'], 'post_code' => $user['post_code']];
            }
            $smarty->assign('title', 'Account');
            $smarty->assign('user', $user);
            $smarty->display('account.tpl');

        }
        else
        {
            header('location:login');
        }

    break;

    case 'my-articles':

        if ($isAdmin)
        {

            $sql = "SELECT * FROM `submissions` ORDER BY `submission_id` DESC;";
            $i = 0;
            foreach ($conn->query($sql) as $article)
            {

                $web_id = $article["web_id"];
                $submission_id = $article["submission_id"];

                //find web_no using web_id
                $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
                foreach ($conn->query($sql) as $row)
                {
                    $web_no = $row["web_no"];
                } //check if the duplicate results exists in database
                if ($article["similar_results"])
                {

                    $status = $article["status"];
                    $scan_id = $article["scan_id"];
                    $is_duplicated = $article["is_duplicated"];
                    $duplicate_percentage = $article["duplicate_percentage"];
                    $used_credits = $article["used_credits"];
                    $similar_results = $article["similar_results"];

                    // check if the article is under duplicate checking
                    
                }
                elseif ($article["scan_id"] && !$article["similar_results"])
                {

                    $check_result = duplicate_check($article["scan_id"]);
                    $status = $check_result["status"];

                    if ($status == 'success')
                    {

                        $is_duplicated = $check_result["is_duplicated"];
                        $duplicate_percentage = $check_result["duplicate_percentage"];
                        $used_credits = $check_result["used_credits"];
                        $similar_results = $check_result["similar_results"];

                        $sth = $conn->prepare('UPDATE `submissions` SET `scan_status`=?, `is_duplicated`=?, `duplicate_percentage`=?, `used_credits`=?, `similar_results`=? WHERE `submission_id`=?');
                        $sth->bindParam(1, $status);
                        $sth->bindParam(2, $is_duplicated);
                        $sth->bindParam(3, $duplicate_percentage);
                        $sth->bindParam(4, $used_credits);
                        $sth->bindParam(5, $similar_results);
                        $sth->bindParam(6, $submission_id);
                        $sth->execute();

                    }
                    else
                    {

                        $sth = $conn->prepare('UPDATE `submissions` SET `scan_status`=? WHERE `submission_id`=?');
                        $sth->bindParam(1, $status);
                        $sth->execute();

                    }
                }

                $articles[$i] = array(
                    "web_no" => $web_no,
                    "keywords" => keyword_analysis(strtolower($article['content'] . $article['title'])) ,
                    "object" => $article['object'],
                    "title" => $article['title'],
                    "rejected" => $article['rejected'],
                    "published" => $article['published'],
                    "web_id" => $article['web_id'],
                    "authors" => $article['authors'],
                    "publisher" => $article['publisher'],
                    "email" => $article['email'],
                    "issn" => $article['issn'],
                    "country" => $article['country'],
                    "submission_id" => $article['submission_id'],
                    "submitted" => $article['submitted'],
                     "url" => $article['url'],
                    "status" => $status,
                    "is_duplicated" => $is_duplicated,
                    "scan_id" => $scan_id,
                    "duplicate_percentage" => $duplicate_percentage,
                    "similar_results" => $similar_results
                );
                $i++;
            }

            $smarty->assign("articles", $articles);
            $smarty->assign("title", "My Articles");
            $smarty->assign("isAuthor", true);
            $smarty->display('articles-list.tpl');

        }
        else
        {
            header('location: login');
        }

    break;

    case 'inbox':

        if ($isAdmin)
        {
            $sql = "SELECT * FROM `messages`";
            $messages = $conn->query($sql);
            $smarty->assign("messages", $messages);
            $smarty->assign("title", "Inbox");
            $smarty->display('inbox.tpl');
        }
        else
        {
            header('location: login');
        }

    break;

case 'add-article': 
    
    
            if (isset($_POST['add_button']))
            {
                
                $title = $_POST['title'];
                $authors = $_POST['authors'];
                $submission_id = $_POST['submission_id'];
                
                $sql = "SELECT * FROM `author_articles`";
                $author_articles = $conn->query($sql);
                
                foreach ($author_articles as $author_article)
                {
                    if ($author_article["title"] == $title)
                    {
                        $message = "The article already exists!";
                        $type = 'danger';
                        $article_exists = true;
                        break;
                    }
                }
                
                if (!$article_exists)
                {
                    $sth = $conn->prepare('INSERT INTO `author_articles`(`submission_id`,`title`,`authors`) VALUES (?,?,?)');
                    $sth->bindParam(1, $submission_id);
                    $sth->bindParam(2, $title);
                    $sth->bindParam(3, $authors);
                    $sth->execute();
                    $message = "The article added sucessfully!";
                    $type = 'success';
                }
            }
    
break;
    
case 'add-author':
    
            if (isset($_POST['add_button']))
            {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $web_id = $_POST['web_id'];
                $sql = "SELECT * FROM `submissions`";
                $submissions = $conn->query($sql);
                
                foreach ($submissions as $submission)
                {
                    if ($submission["name"] == $name)
                    {
                        $message = "The author already exists!";
                        $type = 'danger';
                        $author_exists = true;
                        break;
                    }
                }
                
                if (!$author_exists)
                {
                    $object = 'author';
                    $sth = $conn->prepare('INSERT INTO `submissions`(`submission_id`,`authors`,`object`,`email`) VALUES (?,?,?,?)');
                    $sth->bindParam(1, $submission_id);
                    $sth->bindParam(2, $name);
                    $sth->bindParam(3, $object);
                    $sth->bindParam(4, $email);
                    $sth->execute();
                    $message = "The author added sucessfully!";
                    $type = 'success';
                }
            }
            
            $smarty->assign("title", "Add Author");
            $smarty->assign("message", $message);
            $smarty->assign("type", $type);
            $smarty->display('add-author.tpl');
break;
    
case 'users':
         
            if(0){
                $message = "The website added sucessfully!";
                $type = 'success';
            }

            $sql = "SELECT * FROM `users`";
            $users = $conn->query($sql);
            $smarty->assign("users", $users);
            $smarty->assign("title", "Users");
            $smarty->assign("message", $message);
            $smarty->assign("type", $type);
            $smarty->display('users.tpl');

break;

    case 'rejected-articles':

        if ($isAdmin)
        {
            $sql = "SELECT * FROM `submissions` ORDER BY `submission_id` DESC;";
            $i = 0;
            foreach ($conn->query($sql) as $article)
            {

                $web_id = $article["web_id"];
                $submission_id = $article["submission_id"];

                //find web_no using web_id
                $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
                foreach ($conn->query($sql) as $row)
                {
                    $web_no = $row["web_no"];
                }
                //check if the duplicate results exists in database
                if ($article["similar_results"])
                {
                    $status = $article["status"];
                    $scan_id = $article["scan_id"];
                    $is_duplicated = $article["is_duplicated"];
                    $duplicate_percentage = $article["duplicate_percentage"];
                    $used_credits = $article["used_credits"];
                    $similar_results = $article["similar_results"];

                    // check if the article is under duplicate checking
                    
                }
                elseif ($article["scan_id"] && !$article["similar_results"])
                {

                    $check_result = duplicate_check($article["scan_id"]);
                    $status = $check_result["status"];

                    if ($status == 'success')
                    {

                        $is_duplicated = $check_result["is_duplicated"];
                        $duplicate_percentage = $check_result["duplicate_percentage"];
                        $used_credits = $check_result["used_credits"];
                        $similar_results = $check_result["similar_results"];

                        $sth = $conn->prepare('UPDATE `submissions` SET `scan_status`=?, `is_duplicated`=?, `duplicate_percentage`=?, `used_credits`=?, `similar_results`=? WHERE `submission_id`=?');
                        $sth->bindParam(1, $status);
                        $sth->bindParam(2, $is_duplicated);
                        $sth->bindParam(3, $duplicate_percentage);
                        $sth->bindParam(4, $used_credits);
                        $sth->bindParam(5, $similar_results);
                        $sth->bindParam(6, $submission_id);
                        $sth->execute();

                    }
                    else
                    {

                        $sth = $conn->prepare('UPDATE `submissions` SET `scan_status`=? WHERE `submission_id`=?');
                        $sth->bindParam(1, $status);
                        $sth->execute();

                    }
                }

                $articles[$i] = array(
                    "web_no" => $web_no,
                    "keywords" => keyword_analysis(strtolower($article['content'] . $article['title'])) ,
                    "title" => $article['title'],
                    "rejected" => $article['rejected'],
                    "published" => $article['published'],
                    "web_id" => $article['web_id'],
                    "url" => $article['url'],
                    "submission_id" => $article['submission_id'],
                    "status" => $status,
                    "is_duplicated" => $is_duplicated,
                    "scan_id" => $scan_id,
                    "duplicate_percentage" => $duplicate_percentage,
                    "similar_results" => $similar_results
                );
                $i++;
            }

            $smarty->assign("articles", $articles);
            $smarty->assign("isLoggedIn", $_SESSION['user_id']);
            $smarty->assign("title", "Rejected Articles");
            $smarty->assign("isAuthor", true);
            $smarty->display('articles-list.tpl');

        }
        else
        {
            header('location: login');
        }

    break;

    case 'edit':

        if ($isAdminWebsite && !$isAdmin)
        {
            header('location: login');
        }

        $before_last_url_part = basename(str_replace($last_url_part, '', $url_path));

        $sql = "SELECT * FROM `submissions` WHERE `web_id` = '$web_id' AND `url` = '$before_last_url_part'";

        foreach ($conn->query($sql) as $row)
        {

            $title = $row["title"];
            $content = $row["content"];
            $submission_id = $row["submission_id"];

            $web_id = $row["web_id"];
            $keywords = $row["keywords"];

            $metadescription = $row['metadescription'];
            $related_links_1 = $row["related_links_1"];
            $related_links_text_1 = $row["related_links_text_1"];

            $related_links_2 = $row["related_links_2"];
            $related_links_text_2 = $row["related_links_text_2"];

            $related_links_3 = $row["related_links_3"];
            $related_links_text_3 = $row["related_links_text_3"];
            $page_content = strtolower($title . $content . $keywords . $metadescription . $related_links_text_1 . $related_links_text_2 . $related_links_text_3);

        }

        $unimportant_words = array(
            'a',
            'an',
            'the',
            'and',
            'or',
            'but',
            'aboard',
            'about',
            'above',
            'across',
            'after',
            'against',
            'along',
            'amid',
            'among',
            'anti',
            'around',
            'as',
            'at',
            'now',
            'before',
            'behind',
            'below',
            'beneath',
            'beside',
            'besides',
            'between',
            'beyond',
            'but',
            'by',
            'concerning',
            'considering',
            'despite',
            'down',
            'during',
            'except',
            'excepting',
            'excluding',
            'following',
            'for',
            'from',
            'in',
            'inside',
            'into',
            'like',
            'minus',
            'near',
            'of',
            'off',
            'on',
            'onto',
            'opposite',
            'outside',
            'over',
            'past',
            'per',
            'plus',
            'regarding',
            'round',
            'save',
            'since',
            'than',
            'through',
            'to',
            'toward',
            'towards',
            'under',
            'underneath',
            'unlike',
            'until',
            'up',
            'upon',
            'versus',
            'via',
            'with',
            'within',
            'without',
            'long',
            'à',
            'à côté de',
            'après',
            'au sujet de',
            'avant',
            'avec',
            'chez',
            'contre',
            'dans',
            'daprès',
            'de',
            'depuis',
            'derrière',
            'devant',
            'durant',
            'en',
            'en dehors de',
            'en face de',
            'entre',
            'envers',
            'environ',
            'hors de',
            'jusque',
            'loin de',
            'malgré',
            'par',
            'parmi',
            'pendant',
            'pour',
            'près de',
            'quant à',
            'sans',
            'selon',
            'sous',
            'suivant',
            'sur',
            'vers',
            'le',
            'la',
            'les',
            'un',
            'une',
            'des',
            'du',
            'de',
            'la'
        );
        $pattern = '/\b(?:' . join('|', $unimportant_words) . ')\b/i';

        if (isset($_POST['submitbutton']) || isset($_POST['check_keyword_button']))
        {

            $title = $_POST['title'];
            $content = $_POST['content'];
            $keyword_check = strtolower($_POST['keyword_check']);

            $web_id = $_POST['web_id'];
            $url = trim($_POST['url']);

            $submission_id = $_POST['submission_id'];

            $related_links_text_1 = $_POST['related_links_text_1'];
            $related_links_1 = $_POST['related_links_1'];

            $related_links_text_2 = $_POST['related_links_text_2'];
            $related_links_2 = $_POST['related_links_2'];

            $related_links_text_3 = $_POST['related_links_text_3'];
            $related_links_3 = $_POST['related_links_3'];

            $keywords = $_POST['keywords'];

            $metadescription = $_POST['metadescription'];

            $unwanted_array = array(
                'Š' => 'S',
                'š' => 's',
                'Ž' => 'Z',
                'ž' => 'z',
                'À' => 'A',
                'Á' => 'A',
                'Â' => 'A',
                'Ã' => 'A',
                'Ä' => 'A',
                'Å' => 'A',
                'Æ' => 'A',
                'Ç' => 'C',
                'È' => 'E',
                'É' => 'E',
                'Ê' => 'E',
                'Ë' => 'E',
                'Ì' => 'I',
                'Í' => 'I',
                'Î' => 'I',
                'Ï' => 'I',
                'Ñ' => 'N',
                'Ò' => 'O',
                'Ó' => 'O',
                'Ô' => 'O',
                'Õ' => 'O',
                'Ö' => 'O',
                'Ø' => 'O',
                'Ù' => 'U',
                'Ú' => 'U',
                'Û' => 'U',
                'Ü' => 'U',
                'Ý' => 'Y',
                'Þ' => 'B',
                'ß' => 'Ss',
                'à' => 'a',
                'á' => 'a',
                'â' => 'a',
                'ã' => 'a',
                'ä' => 'a',
                'å' => 'a',
                'æ' => 'a',
                'ç' => 'c',
                'è' => 'e',
                'é' => 'e',
                'ê' => 'e',
                'ë' => 'e',
                'ì' => 'i',
                'í' => 'i',
                'î' => 'i',
                'ï' => 'i',
                'ð' => 'o',
                'ñ' => 'n',
                'ò' => 'o',
                'ó' => 'o',
                'ô' => 'o',
                'õ' => 'o',
                'ö' => 'o',
                'ø' => 'o',
                'ù' => 'u',
                'ú' => 'u',
                'û' => 'u',
                'ý' => 'y',
                'þ' => 'b',
                'ÿ' => 'y'
            );
            $url = strtr($url, $unwanted_array);

            $sth = $conn->prepare('UPDATE `submissions` SET `url`=?, `title`=?, `content`=? , `keywords`=?, `related_links_1`=?, `related_links_text_1`=?, `related_links_2`=?, `related_links_text_2`=?, `related_links_3`=?, `related_links_text_3`=?, `metadescription`=? WHERE `submission_id`=?');

            $sth->bindParam(1, $url);
            $sth->bindParam(2, $title);
            $sth->bindParam(3, $content);
            $sth->bindParam(4, $keywords);
            $sth->bindParam(5, $related_links_1);
            $sth->bindParam(6, $related_links_text_1);
            $sth->bindParam(7, $related_links_2);
            $sth->bindParam(8, $related_links_text_2);
            $sth->bindParam(9, $related_links_3);
            $sth->bindParam(10, $related_links_text_3);
            $sth->bindParam(11, $metadescription);
            $sth->bindParam(12, $submission_id);

            $done = $sth->execute();

            if (!isset($_POST['check_keyword_button']))
            {
                $message = 'Article Updated!';
            }

        }

        $sql = "SELECT * FROM `submissions` WHERE `web_id` = '$web_id' AND `url` = '$before_last_url_part'";

        $article = [];
        foreach ($conn->query($sql) as $row)
        {
            $article = $row;
        }
        $article = array_merge(clama_empty_edit_article_form(), is_array($article) ? $article : []);
        $important_words = preg_replace($pattern, '', $keywords);
        $important_words = str_replace(",", " ", $important_words);
        $important_words = trim(preg_replace('!\s+!', ' ', $important_words));
        $important_words = strtolower(str_replace(" ", ",", $important_words));
        $keywords_array = array_unique(explode(',', $important_words));

        $i = 0;
        foreach ($keywords_array as $unique_keyword)
        {
            $frequency = substr_count($page_content, $unique_keyword) / str_word_count($page_content) * 100;
            $frequency = number_format((float)$frequency, 2, '.', '');
            $keywords_info[$i] = array(
                "frequency" => $frequency,
                "keyword" => $unique_keyword
            );
            $i++;
        }

        arsort($keywords_info);
        $keyword_check_frequency = substr_count($page_content, $keyword_check) / str_word_count($page_content) * 100;
        $keyword_check_frequency = number_format((float)$keyword_check_frequency, 2, '.', '');

        $smarty->assign("keywords_info", $keywords_info);
        $smarty->assign("keyword_check", $keyword_check);
        $smarty->assign("keyword_check_frequency", $keyword_check_frequency);
        $smarty->assign("article", $article);
        $smarty->assign("title", 'Edit Article');
        $smarty->assign("message", $message);
        $smarty->display('edit.tpl');

    break;

    case 'publish':

        $sql = $conn->prepare('UPDATE `submissions` SET `published`=? WHERE `submission_id`=?');
        $active = 1;
        $sql->bindParam(1, $active);
        $sql->bindParam(2, $last_url_part_query);
        $sql->execute();

        header('location: waiting-articles');

    break;

    case 'reject':

        $sql = $conn->prepare('UPDATE `submissions` SET `rejected`=?, `submitted`=? WHERE `submission_id`=?');
        $active = 1;
        $innactive = 0;
        $sql->bindParam(1, $active);
        $sql->bindParam(2, $innactive);
        $sql->bindParam(3, $last_url_part_query);
        $sql->execute();

        header('location: rejected-articles');

    break;

    case 'submit':

        $submission_id = $last_url_part_query;
        $sql = $conn->prepare('UPDATE `submissions` SET `submitted`=? WHERE `submission_id`=?');
        $active = 1;
        $sql->bindParam(1, $active);
        $sql->bindParam(2, $last_url_part_query);
        $sql->execute();

        $sql = "SELECT * FROM `submissions` WHERE `submission_id` = '$submission_id'";

        foreach ($conn->query($sql) as $row)
        {
            $title = $row['title'];
            $content = $row['content'];
        }

        $article = strip_tags($title . ' ' . $content);

        $headers = array(
            "Authorization: Bearer xZa1zzRds7hjcZmUwAr8PtAcEziwjZDLNfd9iUAI",
            "Accept: application/json",
            "Content-Type: application/json",
        );

        $body = ["text" => $article, "callback" => "http://xafh7070.odns.fr/status", "exclude_domains" => ['example.com', 'example.org'], ];

        $ch = curl_init("https://app.killduplicate.com/api/public/scan");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        $result = json_decode($result);
        $status = $result->status;
        $data = $result->data;
        $scan_id = $data->text_id;

        if ($status == 'success')
        {
            $sth = $conn->prepare('UPDATE `submissions` SET `scan_id`=? WHERE `submission_id`=?');
            $sth->bindParam(1, $scan_id);
            $sth->bindParam(2, $submission_id);
            $sth->execute();
        }

        header('location: my-articles');

    break;



    case 'delete':

        echo $submission_id = $_POST['submission_id'];

        $sql = "DELETE FROM `submissions` WHERE `submission_id` = '$submission_id'";
        $conn->query($sql);

        header('location: waiting-articles');

    break;
    



    case 'submit-item':

        if (isset($_POST['submit'])) {

            $title = strip_tags(trim($_POST['title']));
            $content = $_POST['content'];
            $authors = $_POST['authors'];
            $publisher = $_POST['publisher'];
            $issn = $_POST['issn'];
            $email = $_POST['email'];
            $country = $_POST['country'];
            
            $url = string_to_url($title);
            $keywords = keyword_extract($content);
            $metadescription = $title;
            
            $publish_web_id = CLAMA_ARTICLE_PUBLISH_WEB_ID;
            $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$publish_web_id'";
            foreach ($conn->query($sql) as $row)
            {
                $web_no = $row["web_no"];
            }
            //  $sth = $conn->prepare('INSERT INTO `submissions`(`web_id`, `url`, `title`, `content`, `keywords`, `metadescription`, `authors`, `publisher`, `issn`, `email`, `country`) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
            $sql = "INSERT INTO `submissions`(`web_id`, `url`, `title`,  `content`, `keywords`, `metadescription`, `authors`, `publisher`, `issn`, `email`, `country`, `object`) VALUES ('$publish_web_id', '$url', '$title', '$content', '$keywords', '$metadescription', '$authors', '$publisher', '$issn', '$email', '$country', '$object')";
            $conn->query($sql);
            // $sth->execute();
            
            $object = ["title" => $title, "content" => $content];
            $smarty->assign('web_no', $web_no);
            $smarty->assign('message', 'Submission Sent Successfully!');
            $smarty->assign('msg', 'Submission Sent Successfully!');
            $smarty->assign('object', $object);
        }
            $smarty->display('submit.tpl');
break;
    


    case 'register':

        if (isset($_POST['singup_button']))
        {

            $email = $_POST['email'];
            $sql = "SELECT * FROM `users` WHERE `email` = '$email'";

            foreach ($conn->query($sql) as $row)
            {
                $email_exist = $row["email"];
            }

            if (!$email_exist)
            {

                $sth = $conn->prepare('INSERT INTO `users`(`email`, `password`) VALUES (?,?)');
                $sth->bindParam(1, $email);
                $sth->bindParam(2, password_hash($_POST['password'], PASSWORD_DEFAULT));
                $done = $sth->execute();

                $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
                foreach ($conn->query($sql) as $row)
                {
                    $user_id = $row["user_id"];
                }

            }
            else
            {

                $message = 'The email exists!';

            }

        }

        if (!isset($_POST['complete_registration_button']) && !isset($_POST['singup_button']))
        {
            $smarty->assign('message', $message);
            $smarty->assign("title", "Sign Up");
            $smarty->display('signup.tpl');
        }

        if (isset($_POST['singup_button']) && !$message)
        {
            $smarty->assign('user_id', $user_id);
            
            $smarty->assign('email', $email);
            $smarty->assign("title", "Complete Registration");
            $smarty->display('complete-registration.tpl');
        }

        if (isset($_POST['complete_registration_button']))
        {

            $sth = $conn->prepare('UPDATE `users` SET  `name`=?,  `last_name`=?, `country`=?, `post_code`=?, `gender`=? WHERE `user_id`=?');
            $sth->bindParam(1, $_POST['name']);
            $sth->bindParam(2, $_POST['last_name']);
            $sth->bindParam(3, $_POST['country']);
            $sth->bindParam(4, $_POST['post_code']);
            $sth->bindParam(5, $_POST['gender']);
            $sth->bindParam(6, $_POST['user_id']);
            $done = $sth->execute();
            session_start();
            $_SESSION["user_id"] = $_POST['user_id'];
            header('location: write-article');

        }

    break;

    case 'contact':

        $body = '';
        $website_settings = [];
        $msg = '';

        if (isset($_POST['save_button']))
        {
            $body = $_POST['content'];
            $sth = $conn->prepare('UPDATE `web_settings` SET `contact`=? WHERE `web_id`=?');
            $sth->bindParam(1, $body);
            $sth->bindParam(2, $web_id);
            $sth->execute();
        }

        $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
        foreach ($conn->query($sql) as $row)
        {
            $website_settings = $row;
            $body = $row['contact'];
        }

        if (!$body)
        {
            $sql = "SELECT * FROM `content`";
            foreach ($conn->query($sql) as $row)
            {
                $body = $row['contact'];
            }
        }

        if (isset($_POST['send_button']))
        {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $sth = $conn->prepare('INSERT INTO `messages`(`web_id`,`name`, `email`, `message`) VALUES (?,?,?,?)');
            $sth->bindParam(1, $web_id);
            $sth->bindParam(2, $name);
            $sth->bindParam(3, $email);
            $sth->bindParam(4, $message);
            $sth->execute();

            $msg = "The message sent sucessfuly!";
        }


            $smarty->assign('body', $body);
            $smarty->assign('website_settings', $website_settings);
            $smarty->assign('msg', $msg);
            $smarty->assign('title', 'Contact');
            $smarty->display('contact.tpl');


    break;

    case 'privacy-policy':

        $body = '';
        $website_settings = [];

        $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
        foreach ($conn->query($sql) as $row)
        {
            $website_settings = $row;
            $body = $row['privacy'];
        }

        if (!$body)
        {
            $sql = "SELECT * FROM `content`";
            foreach ($conn->query($sql) as $row)
            {
                $body = $row['privacy'];
            }
        }

        if (isset($_POST['save_button']))
        {

            $body = $_POST['content'];
            $sth = $conn->prepare('UPDATE `web_settings` SET `privacy`=? WHERE `web_id`=?');
            $sth->bindParam(1, $body);
            $sth->bindParam(2, $web_id);
            $sth->execute();
        }

        $smarty->assign('body', $body);
        $smarty->assign('website_settings', $website_settings);
        $smarty->assign('msg', '');
        $smarty->assign('title', 'Privacy Policy');
        $smarty->assign('web_id', $web_id);
        if (!isset($_POST['edit_button']))
        {
            $smarty->display('privacy.tpl');
        }
        else
        {   $smarty->assign("title", "Edit");
            $smarty->display('page-edit.tpl');
        }

    break;

    case 'terms-conditions':

        $body = '';
        $website_settings = [];

        if (isset($_POST['save_button']))
        {
            $body = $_POST['content'];
            $sth = $conn->prepare('UPDATE `web_settings` SET `terms_condition`=? WHERE `web_id`=?');
            $sth->bindParam(1, $body);
            $sth->bindParam(2, $web_id);
            $sth->execute();
        }

        $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
        foreach ($conn->query($sql) as $row)
        {
            $website_settings = $row;
            $body = $row['terms_condition'];
        }

        if (!$body)
        {
            $sql = "SELECT * FROM `content`";
            foreach ($conn->query($sql) as $row)
            {
                $body = $row['terms_condition'];
            }
        }

        $smarty->assign('body', $body);
        $smarty->assign('website_settings', $website_settings);
        $smarty->assign('msg', '');
        $smarty->assign('title', 'Terms and Condition');
        if (!isset($_POST['edit_button']))
        {
            $smarty->display('terms-condition.tpl');
        }
        else
        {   $smarty->assign("title", "Edit");
            $smarty->display('page-edit.tpl');
        }

    break;

    case 'about':

        $body = '';
        $website_settings = [];
        $msg = '';

        if (isset($_POST['save_button']))
        {
            $body = $_POST['content'];
            $sth = $conn->prepare('UPDATE `web_settings` SET `about`=? WHERE `web_id`=?');
            $sth->bindParam(1, $body);
            $sth->bindParam(2, $web_id);
            $sth->execute();
        }

        $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
        foreach ($conn->query($sql) as $row)
        {
            $website_settings = $row;
            $body = $row['about'];
        }

        if (!$body)
        {
            $sql = "SELECT * FROM `content`";
            foreach ($conn->query($sql) as $row)
            {
                $body = $row['about'];
            }
        }

        $smarty->assign('body', $body);
        $smarty->assign('website_settings', $website_settings);
        $smarty->assign('msg', $msg);
        $smarty->assign('title', 'About');

        if (!isset($_POST['edit_button']))
        {
            $smarty->display('about.tpl');
        }
        else
        {   $smarty->assign("title", "Edit");
            $smarty->display('page-edit.tpl');
        }

    break;

    case 'settings':

        if ($isAdmin)
        {

            if (isset($_POST['submitbutton']))
            {

                $homepage_post_number = $_POST['homepage_post_number'];
                $general_robot_array= ["contact"=>$_POST['index_contact'], "about"=>$_POST['index_about'], "privacy"=>$_POST['index_privacy'], "terms_conditions"=>$_POST['index_terms_conditions']];
                $general_robot_array = json_encode($general_robot_array);
                $footer_link_1 = $_POST['footer_link_1'];
                $footer_link_text_1 = $_POST['footer_link_text_1'];
                $footer_link_width_1 = $_POST['footer_link_width_1'];

                $footer_link_2 = $_POST['footer_link_2'];
                $footer_link_text_2 = $_POST['footer_link_text_2'];
                $footer_link_width_2 = $_POST['footer_link_width_2'];

                $footer_link_3 = $_POST['footer_link_3'];
                $footer_link_text_3 = $_POST['footer_link_text_3'];
                $footer_link_width_3 = $_POST['footer_link_width_3'];

                $footer_link_4 = $_POST['footer_link_4'];
                $footer_link_text_4 = $_POST['footer_link_text_4'];
                $footer_link_width_4 = $_POST['footer_link_width_4'];

                $footer_link_5 = $_POST['footer_link_5'];
                $footer_link_text_5 = $_POST['footer_link_text_5'];
                $footer_link_width_5 = $_POST['footer_link_width_5'];

                $footer_link_6 = $_POST['footer_link_6'];
                $footer_link_text_6 = $_POST['footer_link_text_6'];
                $footer_link_width_6 = $_POST['footer_link_width_6'];

                $footer_link_7 = $_POST['footer_link_7'];
                $footer_link_text_7 = $_POST['footer_link_text_7'];
                $footer_link_width_7 = $_POST['footer_link_width_7'];

                $footer_link_8 = $_POST['footer_link_8'];
                $footer_link_text_8 = $_POST['footer_link_text_8'];
                $footer_link_width_8 = $_POST['footer_link_width_8'];

                $sql = "SELECT * FROM `web_settings` WHERE `web_id` ='$web_id'";
                foreach ($conn->query($sql) as $row)
                {
                    $web_no = $row['web_no'];
                }

                $sth = $conn->prepare('UPDATE `web_settings` SET `footer_link_1`=?, `footer_link_text_1`=?, `footer_link_width_1`=?, `footer_link_2`=?, `footer_link_text_2`=?, `footer_link_width_2`=?,`footer_link_3`=?, `footer_link_text_3`=?, `footer_link_width_3`=?,`footer_link_4`=?, `footer_link_text_4`=?, `footer_link_width_4`=?, `footer_link_5`=?, `footer_link_text_5`=?, `footer_link_width_5`=?, `footer_link_6`=?, `footer_link_text_6`=?, `footer_link_width_6`=?, `footer_link_7`=?, `footer_link_text_7`=?, `footer_link_width_7`=?, `footer_link_8`=?, `footer_link_text_8`=?, `footer_link_width_8`=?, `homepage_post_number`=?, `logo`=?, `logo_small`=?, `general_robot_array`=? WHERE `web_no`=?');
                $sth->bindParam(1, $footer_link_1);
                $sth->bindParam(2, $footer_link_text_1);
                $sth->bindParam(3, $footer_link_width_1);

                $sth->bindParam(4, $footer_link_2);
                $sth->bindParam(5, $footer_link_text_2);
                $sth->bindParam(6, $footer_link_width_2);

                $sth->bindParam(7, $footer_link_3);
                $sth->bindParam(8, $footer_link_text_3);
                $sth->bindParam(9, $footer_link_width_3);

                $sth->bindParam(10, $footer_link_4);
                $sth->bindParam(11, $footer_link_text_4);
                $sth->bindParam(12, $footer_link_width_4);

                $sth->bindParam(13, $footer_link_5);
                $sth->bindParam(14, $footer_link_text_5);
                $sth->bindParam(15, $footer_link_width_5);

                $sth->bindParam(16, $footer_link_6);
                $sth->bindParam(17, $footer_link_text_6);
                $sth->bindParam(18, $footer_link_width_6);

                $sth->bindParam(19, $footer_link_7);
                $sth->bindParam(20, $footer_link_text_7);
                $sth->bindParam(21, $footer_link_width_7);
                $sth->bindParam(22, $footer_link_8);
                $sth->bindParam(23, $footer_link_text_8);
                $sth->bindParam(24, $footer_link_width_8);
                $sth->bindParam(25, $homepage_post_number);

                if (file_exists($_FILES['large_logo']['tmp_name']) || is_uploaded_file($_FILES['large_logo']['tmp_name']))
                {

                    $target_dir = "logo/";
                    $target_file = $target_dir . basename($_FILES["large_logo"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["large_logo"]["tmp_name"]);

                    if ($check == false)
                    {
                        $message = "File is not an image.";
                        $message_type = "danger";
                    }
                    else
                    {
                        $temp = explode(".", $_FILES["large_logo"]["name"]);
                        $newfilename = $web_no . '.png';
                        move_uploaded_file($_FILES["large_logo"]["tmp_name"], "logo/" . $newfilename);
                        $logo = 1;
                        $message_type = "success";
                        $message = 'Settings Saved! - <a href="' . $website . '}">View Website</a>';
                    }

                }

                if (file_exists($_FILES['small_logo']['tmp_name']) || is_uploaded_file($_FILES['small_logo']['tmp_name']))
                {

                    $target_dir = "logo/";
                    $target_file = $target_dir . basename($_FILES["small_logo"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["small_logo"]["tmp_name"]);

                    if ($check == false)
                    {
                        $message = "File is not an image.";
                        $message_type = "danger";
                    }
                    else
                    {
                        $temp = explode(".", $_FILES["small_logo"]["name"]);
                        $newfilename = 'small-' . $web_no . '.png';
                        move_uploaded_file($_FILES["small_logo"]["tmp_name"], "logo/" . $newfilename);
                        $logo_small = 1;
                        $message_type = "success";
                        $message = 'Settings Saved! - <a href="' . $website . '}">View Website</a>';
                    }

                }

                $sth->bindParam(26, $logo);
                $sth->bindParam(27, $logo_small);
                $sth->bindParam(28, $general_robot_array);
                $sth->bindParam(29, $web_no);

                $done = $sth->execute();

            }

            $sql = "SELECT * FROM `web_settings` WHERE `web_id` = '$web_id'";
            foreach ($conn->query($sql) as $row)
            {
                $homepage_post_number = $row['homepage_post_number'];
                $setting = $row;
                $indexing= json_decode($row['general_robot_array']);
            }

            $smarty->assign("page_number_option_values", array(
                "",
                "3",
                "8",
                "10",
                "28",
                "random"
            ));
            $smarty->assign("page_number_option_output", array(
                "Select",
                "3",
                "8",
                "10",
                "28",
                "Random: between 1 - 25"
            ));
            $smarty->assign("page_number_option_selected", "$homepage_post_number");

            $smarty->assign("width_option_values", array(
                "auto",
                "50%",
                "100%"
            ));
            
            $smarty->assign("width_option_output", array(
                "Rational",
                "Random: right or left",
                "Center"
            ));

            $smarty->assign('setting', $setting);
            $smarty->assign('indexing', $indexing);
            $smarty->assign("Settings", "Settings");
            $smarty->assign('message', $message);
            $smarty->assign('message_type', $message_type);
            $smarty->display('settings.tpl');

        }

    break;

case 'logout':

        session_start();
        session_destroy();
        header("Location: login");

break;

case '404':
    $smarty->display('404.tpl');
break;



case 'pdf':
    
include 'lib/TCPDF-main/examples/tcpdf_include.php';
$before_last_url_part = basename(str_replace($last_url_part, '', $url_path));
$sql = "SELECT * FROM `submissions` WHERE `web_id` = '$web_id' AND `url` = '$before_last_url_part'";
    
foreach($conn->query($sql) as $article) {

    $title=$article['title'];
    $authors=$article['authors'];
    $keywords=$article['keywords'];

    $problem=$article['problem'];
    $problem_p=$article['problem_p'];
    $problem_exp=$article['problem_exp'];

    $problem_importance=$article['problem_importance'];
    $problem_importance_p=$article['problem_importance_p'];
    $problem_importance_exp=$article['problem_importance_exp']; 
    $prev_solution_1=$article['prev_solution_1'];
    $prev_solution_1_p=$article['prev_solution_1_p'];
    $prev_solution_drawback_1=$article['prev_solution_drawback_1'];
    $prev_solution_drawback_1_p=$article['prev_solution_drawback_1_p'];
    $prev_solution_drawback_1_exp=$article['prev_solution_drawback_1_exp'];
    
    $prev_solution_2=$article['prev_solution_2'];
    $prev_solution_2_p=$article['prev_solution_2_p'];
    
    $prev_solution_drawback_2 = $article['prev_solution_drawback_2'];
    $prev_solution_drawback_2_p = $article['prev_solution_drawback_2_p'];
    
    $prev_solution_drawback_2_exp = $article['prev_solution_drawback_2_exp'];
    $prev_solution_3 = $article['prev_solution_3'];
    $prev_solution_3_p = $article['prev_solution_3_p'];
    $prev_solution_drawback_3= $article['prev_solution_drawback_3'];
    $prev_solution_drawback_3_p= $article['prev_solution_drawback_3_p'];
    $prev_solution_drawback_3_exp= $article['prev_solution_drawback_3_exp'];
    $sloution=$article['sloution'];
    $sloution_p=$article['sloution_p'];
    $sloution_exp = $article['sloution_exp'];
    $sloution_advantage_1 = $article['sloution_advantage_1'];
    $sloution_advantage_1_p = $article['sloution_advantage_1_p'];
    $sloution_advantage_1_exp = $article['sloution_advantage_1_exp'];
    $sloution_advantage_2 = $article['sloution_advantage_2'];
    $sloution_advantage_2_p = $article['sloution_advantage_2_p'];
    $sloution_advantage_2_exp = $article['sloution_advantage_2_exp'];
    
    $solution_part_1 = $article['solution_part_1'];
    $solution_image_1 = $article['solution_image_1'];
    $solution_image_caption_1 = $article['solution_image_caption_1'];
    
    $solution_part_2 = $article['solution_part_2'];
    $solution_image_2 = $article['solution_image_2'];
    $solution_image_caption_2 = $article['solution_image_caption_2'];
    
    $solution_part_3 = $article['solution_part_3'];
    $solution_image_3 = $article['solution_image_3'];
    $solution_image_caption_3 = $article['solution_image_caption_3'];
    
        
    $solution_part_4 = $article['solution_part_4'];
    $solution_image_4 = $article['solution_image_4'];
    $solution_image_caption_4 = $article['solution_image_caption_4'];
    
        
    $solution_part_5 = $article['solution_part_5'];
    $solution_image_5 = $article['solution_image_5'];
    $solution_image_caption_5 = $article['solution_image_caption_5'];
    
    $solution_part_6 = $article['solution_part_6'];
    $solution_image_6 = $article['solution_image_6'];
    $solution_image_caption_6 = $article['solution_image_caption_6'];
    
        
    $solution_part_7 = $article['solution_part_7'];
    $solution_image_7 = $article['solution_image_7'];
    $solution_image_caption_7 = $article['solution_image_caption_7'];

}
        
$abstract =  $problem.'. '. $problem_importance.'. '.  $prev_solution_1  .'. But, '. lcfirst($prev_solution_drawback_1) . '. '. $prev_solution_2 . '. But, '. lcfirst($prev_solution_drawback_2).'. '. $prev_solution_3. '. But, '. lcfirst($prev_solution_drawback_3).'. Therefore, in this paper, '. lcfirst($sloution) . '. '. $sloution_advantage_1. '. '. $sloution_advantage_2;
$introduction =  $problem_p. '. '. $problem_exp.'. '.$problem_importance_p.'. '. $prev_solution_1_p  .' But, '. lcfirst($prev_solution_drawback_1_p) . '. '. $prev_solution_2_p . '. But, '. lcfirst($prev_solution_drawback_2_p).'. '. $prev_solution_3_p. '. But, '. lcfirst($prev_solution_drawback_3_p).'. '.$prev_solution_drawback_2_exp.' Therefore, in this paper, '. lcfirst($sloution_p) .'. ' . $sloution_exp .'. '. $sloution_advantage_1_p. '. '. $sloution_advantage_1_exp.'. '. $sloution_advantage_2_p .'. '. $sloution_advantage_2_exp;
$part_1 =  $solution_part_1. '.<br><br><img style="text-align:center; height:150px" src="images/'. $solution_image_1.'"><br><br><span style="font-size:10px; text-align:center">Fig.1. '.$solution_image_caption_1.'</span><br><br>' ; 
$part_2 =  $solution_part_2. '.<br><br><img style="text-align:center; height:150px" src="images/'. $solution_image_2.'"><br><br><span style="font-size:10px; text-align:center">Fig.2. '.$solution_image_caption_2.'</span><br><br>'; 
$part_3 =  $solution_part_3. '.<br><br><img style="text-align:center; height:150px" src="images/'. $solution_image_3.'"><br><br><span style="font-size:10px; text-align:center">Fig.3. '.$solution_image_caption_3.'</span><br><br>'; 
$part_4 =  $solution_part_4. '.<br><br><img style="text-align:center; height:150px" src="images/'. $solution_image_4.'"><br><br><span style="font-size:10px; text-align:center">Fig.4. '.$solution_image_caption_4.'</span><br><br>'; 
$part_5 =  $solution_part_5. '.<br><br><img style="text-align:center; height:150px" src="images/'. $solution_image_5.'"><br><br><span style="font-size:10px; text-align:center">Fig.5. '.$solution_image_caption_5.'</span><br><br>'; 
$part_6 =  $solution_part_6. '.<br><br><img style="text-align:center; height:150px" src="images/'. $solution_image_6.'"><br><br><span style="font-size:10px; text-align:center">Fig.6. '.$solution_image_caption_6.'</span><br><br>'; 
$part_7 =  $solution_part_7. '.<br><br><img style="text-align:center; height:150px" src="images/'. $solution_image_7.'"><br><br><span style="font-size:10px; text-align:center">Fig.7. '.$solution_image_caption_7.'</span><br><br>'; 
$methodology =  $part_1 .$part_2. $part_3.$part_4.$part_5.$part_6.$part_7;
// create new PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setHeaderData('',0,'','',array(0,0,0), array(255,255,255) );  

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set font
$pdf->SetFont('Helvetica', 4);
$pdf->SetTextColor(128,128,128);

// add a page
$pdf->AddPage();

$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(128,128,128),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 7,
    'stretchtext' => 6
    );

$pdf->writeHTML($htmlhead, true, false, true, false, '');
$line= '<b>'.$site_title .' <br>www.'.$web_id.' Vol.1, Issue 1</b><br>';
$pdf->writeHTML($line, true, false, true, false, '');


// title PDF
$htmltitle='<br><h2 style="font-size:14px; text-align:center">'. strtoupper($title).'</h2><br><span style="text-align:center">' . $authors . '<br><br></span>';
$pdf->writeHTML($htmltitle, true, false, true, false, '');

// body PDFbvc 
$htmlbody='
<p style="font-size:13px; text-align:center"><b>ABSTRACT</b></p>
'.$abstract. '. 
<br><br><b>Keywords:</b> '. $keywords .
'.'.'<p style="text-align:center"><b>INTRODUCTION</b></p></center><br>'. $introduction.'
<p style="text-align:center"><b>CONTENT</b></p>'.$methodology.'
<p style="text-align:center"><b>REFERENCES</b></p><br>';

$refrences = '
<span style="font-size:10px">[1]. '.$article['ref_authors_1'].', "'. $article['ref_article_title_1'] .'", '. $article['ref_journal_title_1'] .', '. $article['ref_vol_issue_1']
.'<br>[2]. '.$article['ref_authors_2'].', "'. $article['ref_article_title_2'] .'", '. $article['ref_journal_title_2'] .', '. $article['ref_vol_issue_2']
.'<br>[3]. '. $article['ref_authors_3'].', "'. $article['ref_article_title_3'] .'", '. $article['ref_journal_title_3'] .', '. $article['ref_vol_issue_3'].'</span>';

$pdf->writeHTML($htmlbody, true, false, true, false, '');
$pdf->writeHTML($refrences, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF
$pdf->Output('article.pdf', 'I');
//--------------------------------------------------------

break;

case 'submit-now':
    
$smarty->assign('title', 'Submit '. ucfirst((string) $object));
$smarty->assign('msg', '');
$smarty->assign('article', clama_empty_article_form());
$smarty->assign('content_hint_message', '');
$smarty->assign('message_type', 'info');
$smarty->display('submit.tpl');

break;

case 'editorial-team':
    
$smarty->assign('title', 'Editorial Team');
$smarty->display('editorial-team.tpl');

break;



default:

     if ($last_url_part_path == '' || $last_url_part_path == 'home')
     {
            $smarty->assign('title', $title);
            $smarty->assign('metadescription', $metadescription);
            $smarty->assign('keywords', $keywords);
            $smarty->display('homepage.tpl');
      } else {
        $sql = "SELECT * FROM `submissions` WHERE `web_id` = '$web_id' AND `url` = '$last_url_part_path'";
        $article_rows = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $article_rows = array_map('clama_submission_for_view', $article_rows);
        $page_title = $title;
        $page_meta = $metadescription;
        $page_keywords = $keywords;
        foreach ($article_rows as $ar) {
            $page_title = $ar['title'] ?? $page_title;
            $page_meta = $ar['metadescription'] ?? $ar['title'] ?? $page_meta;
            $page_keywords = $ar['keywords'] ?? $page_keywords;
            if (!empty($ar['submission_id'])) {
                $submission_id = $ar['submission_id'];
            }
            break;
        }
        $smarty->assign("title", $page_title);
        $smarty->assign("metadesciption", $page_meta);
        $smarty->assign("keywords", $page_keywords);
        $smarty->assign("web_settings", $web_settings);
        $smarty->assign("article_array", $article_rows);
        $sql = "SELECT * FROM `comments` WHERE `submission_id` = '$submission_id'";
        $comments = $conn->query($sql);
        $smarty->assign('comments', $comments);
      
        //  $sth = $conn->prepare('INSERT INTO `web_settings`(`submission_id`,`web_id`, `name`, `comment`, `date`) VALUES (?,?,?,?,?)');
        //    $sth->bindParam(1, $submission_id);
        //  $sth->bindParam(2, $web_id);
     
        $smarty->display('article.tpl');
        
      }

}