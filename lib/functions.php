<?php

function generateRandomString($length = 6) {
    $characters = '123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}


function generateRandomLink($length = 11) {
    $characters = '123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateIOI($length = 11) {
    $characters = '123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}


function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

// Makes the first character of the sentence upper case. It checks if the first word is not abbrivation to keep it unchanged.
function lc_first_word($sentence){
    
    // checking if the first word of the title is abbrivation if yes do not lower case it 
    $first_title_letter = mb_substr($sentence, 0, 1);
    
    if (mb_substr($sentence, 1, 1)!='.' && mb_substr($sentence, 1, 1)!=' '){
        $second_title_letter = mb_substr($sentence, 1, 1);
    } elseif(mb_substr($sentence, 1, 1)=='.') {
        $second_title_letter = mb_substr($sentence, 2, 1);
    } 
    
    if (ctype_upper($first_title_letter) && !ctype_upper($second_title_letter)){
        
        $lc_first_sentence = lcfirst($sentence);
    } else {
        $lc_first_sentence = $sentence;
    }
    
    return $lc_first_sentence;
}


function keyword_extract($text){
   
        $unimportant_words = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'more','the','this', 'i', 'you', 'he', 'she', 'they', 'we', 'it','my', 'your', 'his', 'him', 'her', 'their', 'our', 'that', 'use', 'am', 'is', 'are', 'be', 'do', 'does', 'can', 'have', 'has', 'could', 'should', 'would', 'how', 'so', 'then', 'a', 'an', 'the', 'and', 'or', 'but', 'aboard', 'about', 'above', 'across', 'after', 'against', 'along', 'amid', 'among', 'anti', 'around', 'as', 'at', 'now', 'when', 'then','before', 'behind', 'below', 'beneath', 'beside', 'besides', 'between', 'beyond', 'but', 'by', 'concerning', 'considering', 'despite', 'down', 'during', 'except', 'excepting', 'excluding', 'following', 'for', 'from', 'in', 'inside', 'into', 'like', 'minus', 'near', 'of', 'off', 'on', 'onto', 'opposite', 'outside', 'over', 'past', 'per', 'plus', 'regarding', 'round', 'save', 'since', 'than', 'through', 'to', 'toward', 'towards', 'under', 'underneath', 'unlike', 'until', 'up', 'upon', 'versus', 'via', 'with', 'within', 'without', 'long', 'à', 'à côté de', 'après',  'au sujet de',  'avant', 'avec', 'chez', 'contre', 'dans', 'daprès',  'de', 'depuis', 'derrière' , 'devant', 'durant',  'en', 'en dehors de',  'en face de' , 'entre', 'envers', 'environ' ,'hors de',  'jusque' , 'loin de', 'malgré', 'par'  ,'parmi' , 'pendant' , 'pour', 'près de', 'quant à' , 'sans', 'selon',  'sous',  'suivant', 'sur', 'vers', 'le', 'la', 'les', 'un', 'une', 'des', 'du', 'de', 'la', 'plus', 'le', 'je', 'tu', 'il', 'elle', 'ils', 'nous', 'ça', 'mon', 'votre', 'son', 'lui ', 'elle', 'leur', 'notre', 'cela', 'suis', 'est', 'sont', 'être', 'faire', 'fait', 'peut', 'avoir', 'a', 'pourrait', 'devrait', 'ferait', 'comment', 'ainsi', 'alors', 'un', 'un', 'le', 'et', 'ou', 'mais ', 'à bord', 'environ', 'au-dessus', 'à travers', 'après', 'contre', 'le long', 'au milieu', 'parmi', 'anti', 'autour', 'comme', 'à', 'avant', 'derrière', 'en dessous', 'en dessous', 'à côté', 'à côté', 'entre', 'au-delà', 'mais', 'par', 'concernant', 'considérant ', 'malgré', 'bas', 'pendant', 'sauf', 'excluant', 'excluant', 'suivant', 'pour', 'de', 'dans', 'dedans', 'dans', 'comme', 'moins', 'près', 'de', 'hors', 'sur', 'sur', 'opposé', 'dehors', 'plus', 'passé', 'par', 'plus ', 'concernant', 'rond', 'sauver', 'depuis', 'que', 'à travers', 'à', 'vers', 'vers', 'en dessous', 'en dessous', 'contrairement', 'jusquà', 'en haut', 'sur', 'versus', 'via', 'avec', 'dans', 'sans', 'ce', 'ne', 'se', 'tes','au', 'tre', 'sa','si', 'na', 'ca', 'ma', 'ni', 'ans', 'ces', 'qui', 'vous', 'aux');
        $pattern = '/\b(?:' . join('|', $unimportant_words) . ')\b/i';
        $text = strip_tags($text); 
        //remove numbers from text
        $text = preg_replace('/\d+/u', '', $text);
        //remove nonalephabet
        $text = preg_replace("/[^A-Za-z0-9 ]/", '', $text);
        $important_words = preg_replace($pattern, '', $text); 
        $important_words = str_replace(",", " ", $important_words); 
        $important_words = str_replace(":", " ", $important_words); 
        $important_words = str_replace(".", " ", $important_words); 
        $important_words = str_replace('"', ' ', $important_words); 
        $important_words = trim(preg_replace('!\s+!', ' ', $important_words));
        $important_words = strtolower(str_replace(" ", ",", $important_words));
        return $important_words;
}

function keyword_analysis ($text) {
        
        $important_words = keyword_extract($text);
        $keywords_array= array_unique(explode(',', $important_words));
                  
        $i=0;
        foreach ($keywords_array as $keyword){
                $keywords[$i] = array("frequency"=>number_format((float)((substr_count($text, $keyword)/str_word_count($text))*100), 2, '.', ''), "keyword"=>$keyword);
                $i++;
        }
        arsort($keywords);
        return array_slice($keywords,0,4);
}

function randomPassword($len = 8) {

    //enforce min length 8
    if($len < 8)
        $len = 8;

    //define character libraries - remove ambiguous characters like iIl|1 0oO
    $sets = array();
    $sets[] = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
    $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    $sets[] = '23456789';
    $sets[]  = '~!@#$%^&*(){}[],./?';

    $password = '';
    
    //append a character from each set - gets first 4 characters
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
    }

    //use all characters to fill up to $len
    while(strlen($password) < $len) {
        //get a random set
        $randomSet = $sets[array_rand($sets)];
        
        //add a random char from the random set
        $password .= $randomSet[array_rand(str_split($randomSet))]; 
    }
    
    //shuffle the password string before returning!
    return str_shuffle($password);
}


function remove_braket($string){
    
    $string = str_replace('(', '', $string);
    $string = str_replace(')', '', $string);
    $string = str_replace('{', '', $string);
    $string = str_replace('}', '', $string);
    
    return $string;
    
}

function clear_non_english($string) {
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
            
            $string = strtr($string, $unwanted_array);
            return $string;
}


function string_to_url ($string) {
    
    $string = Strip_tags($string);
    $string = strtolower(trim(strip_tags($string)));
    $string = remove_braket($string);
    $url = preg_replace('/\p{P}/', ' ', $string);
    
    $url = preg_replace('/[^\00-\255]+/u', ' ', $url);
    
    $url = preg_replace("/[^A-Za-z0-9 ]/", ' ', $url);
    $url = preg_replace('/\s+/', ' ', $url);
    $url = str_replace(' ','-', $url);
    return clear_non_english($url);
    
}



function count_url ($string) {
    $url_number = substr_count($string,"src=") + substr_count($string,"href=");
    return $url_number; 
}


function check_empty($variable){
    if(isset($variable)){
        $checked_variable = $variable;
    } else {
        $checked_variable = '';
    }  
   return $checked_variable;
} 



function duplicate_check($scan_id){
$headers = array(
    "Authorization: Bearer xZa1zzRds7hjcZmUwAr8PtAcEziwjZDLNfd9iUAI",
    "Accept: application/json",
    "Content-Type: application/json",
);

$ch = curl_init("https://app.killduplicate.com/api/public/scan/".$scan_id);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);
$result= json_decode($result);
$status= $result->status;
$data = $result->data;
$is_dublicated= $data->duplicate;

$duplicate_percentage= $data->dup_percentage;
$used_credits = $data->credits;
//$data->phrases_checked;

$similar_results;
$data = $data->results;
foreach ($data as $key=>$value) {
    $similar_results .= $key.' Similarity: ('.$value.'%)</br>';
}

$check_result = ["status"=>$status, "is_duplicated"=>$is_duplicated, "duplicate_percentage"=>$duplicate_percentage, "used_credits"=>$used_credits, "similar_results"=>$similar_results];

return $check_result;
}

/** Map 0–2 to words for randomized write-article hints. */
function clama_number_to_text($number)
{
    $text_numbers = ['no', 'one', 'two'];

    return $text_numbers[(int) $number] ?? 'no';
}

/** Max .docx upload size (bytes). */
function clama_word_upload_max_bytes(): int
{
    return 5 * 1024 * 1024;
}

/**
 * @param array{name?:string, type?:string, tmp_name?:string, error?:int, size?:int} $file
 * @return array{ok:bool, error:string}
 */
function clama_validate_word_upload(array $file): array
{
    $max = clama_word_upload_max_bytes();
    $size = (int) ($file['size'] ?? 0);
    if ($size > $max) {
        return ['ok' => false, 'error' => 'File is too large (maximum 5 MB).'];
    }
    $name = (string) ($file['name'] ?? '');
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    if ($ext !== 'docx') {
        return ['ok' => false, 'error' => 'Only .docx files are supported. In Word use Save As → Word Document (.docx).'];
    }
    if (class_exists('finfo')) {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file((string) ($file['tmp_name'] ?? '')) ?: '';
        $allowed = [
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/zip',
            'application/octet-stream',
        ];
        if ($mime !== '' && !in_array($mime, $allowed, true)) {
            return ['ok' => false, 'error' => 'That file does not look like a Word document.'];
        }
    }

    return ['ok' => true, 'error' => ''];
}

/**
 * Read a .docx (Office Open XML) and return simple HTML paragraphs.
 */
function clama_docx_to_html(string $path): ?string
{
    if (!class_exists('ZipArchive')) {
        return null;
    }
    $zip = new ZipArchive();
    if ($zip->open($path) !== true) {
        return null;
    }
    $xml = $zip->getFromName('word/document.xml');
    $zip->close();
    if ($xml === false || $xml === '') {
        return null;
    }
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    if (!$dom->loadXML($xml)) {
        return null;
    }
    $xpath = new DOMXPath($dom);
    $xpath->registerNamespace('w', 'http://schemas.openxmlformats.org/wordprocessingml/2006/main');
    $out = [];
    $paragraphs = $xpath->query('//w:p');
    if (!$paragraphs) {
        return null;
    }
    foreach ($paragraphs as $p) {
        $texts = $xpath->query('.//w:t', $p);
        $line = '';
        if ($texts) {
            foreach ($texts as $t) {
                $line .= $t->textContent;
            }
        }
        $line = trim($line);
        if ($line !== '') {
            $out[] = '<p>' . htmlspecialchars($line, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</p>';
        }
    }
    if ($out === []) {
        return null;
    }

    return implode("\n", $out);
}

/** Default row for write-article.tpl / submit flows (avoids undefined array keys). */
function clama_empty_article_form(): array
{
    return [
        'title' => '',
        'content' => '',
        'keywords' => '',
        'metadescription' => '',
        'url' => '',
        'web_id' => '',
        'related_links_1' => '',
        'related_links_text_1' => '',
        'related_links_2' => '',
        'related_links_text_2' => '',
        'related_links_3' => '',
        'related_links_text_3' => '',
    ];
}

/** Defaults for write-scientific-article-step-1.tpl (avoids undefined array keys). */
function clama_empty_scientific_article_step1_form(): array
{
    return [
        'title' => '',
        'authors' => '',
        'problem' => '',
        'problem_importance' => '',
        'prev_solution_1' => '',
        'prev_solution_2' => '',
        'prev_solution_3' => '',
        'prev_solution_drawback_1' => '',
        'prev_solution_drawback_2' => '',
        'prev_solution_drawback_3' => '',
        'sloution' => '',
        'sloution_advantage_1' => '',
        'sloution_advantage_2' => '',
        'content' => '',
        'keywords' => '',
        'ref_authors_1' => '',
        'ref_article_title_1' => '',
        'ref_journal_title_1' => '',
        'ref_vol_issue_1' => '',
        'ref_authors_2' => '',
        'ref_article_title_2' => '',
        'ref_journal_title_2' => '',
        'ref_vol_issue_2' => '',
        'ref_authors_3' => '',
        'ref_article_title_3' => '',
        'ref_journal_title_3' => '',
        'ref_vol_issue_3' => '',
    ];
}

/** Step 1 fields plus step-2 expansion fields (draft row / form repopulation). */
function clama_empty_scientific_article_step2_form(): array
{
    return array_merge(clama_empty_scientific_article_step1_form(), [
        'problem_exp' => '',
        'problem_importance_exp' => '',
        'prev_solution_drawback_1_exp' => '',
        'prev_solution_drawback_2_exp' => '',
        'prev_solution_drawback_3_exp' => '',
        'sloution_exp' => '',
        'sloution_advantage_1_exp' => '',
        'sloution_advantage_2_exp' => '',
    ]);
}

/** @param array<string, mixed> $row */
function clama_scientific_step1_article(array $row): array
{
    return array_merge(clama_empty_scientific_article_step1_form(), array_intersect_key($row, clama_empty_scientific_article_step1_form()));
}

/** @param array<string, mixed> $row */
function clama_scientific_step2_article(array $row): array
{
    return array_merge(clama_empty_scientific_article_step2_form(), array_intersect_key($row, clama_empty_scientific_article_step2_form()));
}

/**
 * Defaults for a submission row shown in article.tpl (avoids undefined keys on partial DB rows).
 */
function clama_submission_row_for_view(): array
{
    return array_merge(clama_empty_scientific_article_step2_form(), [
        'submission_id' => '',
        'published' => 0,
        'rejected' => 0,
        'date' => '',
        'url' => '',
        'metadescription' => '',
        'is_scientific' => 0,
        'problem_p' => '',
        'problem_importance_p' => '',
        'prev_solution_1_p' => '',
        'prev_solution_2_p' => '',
        'prev_solution_3_p' => '',
        'prev_solution_drawback_1_p' => '',
        'prev_solution_drawback_2_p' => '',
        'prev_solution_drawback_3_p' => '',
        'sloution_p' => '',
        'sloution_advantage_1_p' => '',
        'sloution_advantage_2_p' => '',
        'solution_part_1' => '',
        'solution_image_1' => '',
        'solution_image_caption_1' => '',
        'solution_part_2' => '',
        'solution_image_2' => '',
        'solution_image_caption_2' => '',
        'solution_part_3' => '',
        'solution_image_3' => '',
        'solution_image_caption_3' => '',
        'solution_part_4' => '',
        'solution_image_4' => '',
        'solution_image_caption_4' => '',
        'solution_part_5' => '',
        'solution_image_5' => '',
        'solution_image_caption_5' => '',
        'solution_part_6' => '',
        'solution_image_6' => '',
        'solution_image_caption_6' => '',
        'solution_part_7' => '',
        'solution_image_7' => '',
        'solution_image_caption_7' => '',
        'solution_final_part' => '',
        'solution_advantages' => '',
        'conclusion' => '',
        'related_links_1' => '',
        'related_links_text_1' => '',
        'related_links_2' => '',
        'related_links_text_2' => '',
        'related_links_3' => '',
        'related_links_text_3' => '',
    ]);
}

/** @param array<string, mixed> $row */
function clama_submission_for_view(array $row): array
{
    return array_merge(clama_submission_row_for_view(), $row);
}

function clama_empty_edit_article_form(): array
{
    return array_merge(clama_empty_article_form(), [
        'submission_id' => '',
    ]);
}