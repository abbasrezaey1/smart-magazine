<?php

/**
 * Scientific article wizard: uses $conn_builder (see lib/sql_connect.php) for draft rows,
 * then inserts the finished article into main $conn / submissions.
 */

function clama_scientific_assign_content_hints($smarty)
{
    $text_numbers = ["no", "one", "two"];
    $image_number = rand(0, 2);
    $image_number_text = $text_numbers[$image_number];
    $image = $image_number < 2 ? $image_number_text . ' image' : $image_number_text . ' images';
    $video_number = rand(0, 2);
    $video_number_text = $text_numbers[$video_number];
    $video = $video_number < 2 ? $video_number_text . ' video' : $video_number_text . ' videos';
    $link_number = rand(0, 2);
    $link_number_text = $text_numbers[$link_number];
    $link = $link_number < 2 ? $link_number_text . ' link' : $link_number_text . ' links';
    $smarty->assign('content_hint_message', 'Note: use ' . $image . ', ' . $video . ' and ' . $link);
    $smarty->assign('related_link_number', rand(0, 3));
}

function clama_scientific_insert_draft(PDO $builder, $user_id, $post)
{
    $sql = 'INSERT INTO `scientific_article_drafts` (
        `user_id`, `target_web_id`, `step`,
        `title`, `authors`, `problem`, `problem_importance`,
        `prev_solution_1`, `prev_solution_2`, `prev_solution_3`,
        `prev_solution_drawback_1`, `prev_solution_drawback_2`, `prev_solution_drawback_3`,
        `sloution`, `sloution_advantage_1`, `sloution_advantage_2`, `content`, `keywords`,
        `ref_authors_1`, `ref_article_title_1`, `ref_journal_title_1`, `ref_vol_issue_1`,
        `ref_authors_2`, `ref_article_title_2`, `ref_journal_title_2`, `ref_vol_issue_2`,
        `ref_authors_3`, `ref_article_title_3`, `ref_journal_title_3`, `ref_vol_issue_3`,
        `related_link_number`
    ) VALUES (
        ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
    )';
    $sth = $builder->prepare($sql);
    $rln = isset($post['related_link_number']) ? (int)$post['related_link_number'] : null;
    $sth->execute([
        (int)$user_id,
        CLAMA_ARTICLE_PUBLISH_WEB_ID,
        1,
        strip_tags(trim($post['title'] ?? '')),
        strip_tags(trim($post['authors'] ?? '')),
        strip_tags(trim($post['problem'] ?? '')),
        strip_tags(trim($post['problem_importance'] ?? '')),
        strip_tags(trim($post['prev_solution_1'] ?? '')),
        strip_tags(trim($post['prev_solution_2'] ?? '')),
        strip_tags(trim($post['prev_solution_3'] ?? '')),
        strip_tags(trim($post['prev_solution_drawback_1'] ?? '')),
        strip_tags(trim($post['prev_solution_drawback_2'] ?? '')),
        strip_tags(trim($post['prev_solution_drawback_3'] ?? '')),
        strip_tags(trim($post['sloution'] ?? '')),
        strip_tags(trim($post['sloution_advantage_1'] ?? '')),
        strip_tags(trim($post['sloution_advantage_2'] ?? '')),
        $post['content'] ?? '',
        strip_tags(trim($post['keywords'] ?? '')),
        strip_tags(trim($post['ref_authors_1'] ?? '')),
        strip_tags(trim($post['ref_article_title_1'] ?? '')),
        strip_tags(trim($post['ref_journal_title_1'] ?? '')),
        strip_tags(trim($post['ref_vol_issue_1'] ?? '')),
        strip_tags(trim($post['ref_authors_2'] ?? '')),
        strip_tags(trim($post['ref_article_title_2'] ?? '')),
        strip_tags(trim($post['ref_journal_title_2'] ?? '')),
        strip_tags(trim($post['ref_vol_issue_2'] ?? '')),
        strip_tags(trim($post['ref_authors_3'] ?? '')),
        strip_tags(trim($post['ref_article_title_3'] ?? '')),
        strip_tags(trim($post['ref_journal_title_3'] ?? '')),
        strip_tags(trim($post['ref_vol_issue_3'] ?? '')),
        $rln,
    ]);
    return (int)$builder->lastInsertId();
}

function clama_scientific_finalize(PDO $main, PDO $builder, $user_id, $post)
{
    $draft_id = (int)($post['submission_id'] ?? 0);
    if ($draft_id <= 0) {
        return ['ok' => false, 'message' => 'Invalid draft.'];
    }
    $st = $builder->prepare('SELECT * FROM `scientific_article_drafts` WHERE `draft_id` = ? AND `user_id` = ? LIMIT 1');
    $st->execute([$draft_id, (int)$user_id]);
    $d = $st->fetch(PDO::FETCH_ASSOC);
    if (!$d) {
        return ['ok' => false, 'message' => 'Draft not found or access denied.'];
    }

    $title = $d['title'];
    $authors = $d['authors'];
    $target_web = $d['target_web_id'];
    $content = $d['content'];
    $keywords = strip_tags(trim($post['keywords_exp'] ?? $d['keywords']));

    $problem = $d['problem'];
    $problem_exp = strip_tags(trim($post['problem_exp'] ?? ''));
    $problem_importance = $d['problem_importance'];
    $problem_importance_exp = strip_tags(trim($post['problem_importance_exp'] ?? ''));
    $prev_solution_1 = $d['prev_solution_1'];
    $prev_solution_2 = $d['prev_solution_2'];
    $prev_solution_3 = $d['prev_solution_3'];
    $prev_solution_drawback_1 = $d['prev_solution_drawback_1'];
    $prev_solution_drawback_2 = $d['prev_solution_drawback_2'];
    $prev_solution_drawback_3 = $d['prev_solution_drawback_3'];
    $prev_solution_drawback_1_exp = strip_tags(trim($post['prev_solution_drawback_1_exp'] ?? ''));
    $prev_solution_drawback_2_exp = strip_tags(trim($post['prev_solution_drawback_2_exp'] ?? ''));
    $prev_solution_drawback_3_exp = strip_tags(trim($post['prev_solution_drawback_3_exp'] ?? ''));
    $sloution = $d['sloution'];
    $sloution_exp = strip_tags(trim($post['sloution_exp'] ?? ''));
    $sloution_advantage_1 = $d['sloution_advantage_1'];
    $sloution_advantage_2 = $d['sloution_advantage_2'];
    $sloution_advantage_1_exp = strip_tags(trim($post['sloution_advantage_1_exp'] ?? ''));
    $sloution_advantage_2_exp = strip_tags(trim($post['sloution_advantage_2_exp'] ?? ''));

    $problem_p = $problem;
    $problem_importance_p = $problem_importance;
    $prev_solution_1_p = $prev_solution_1;
    $prev_solution_2_p = $prev_solution_2;
    $prev_solution_3_p = $prev_solution_3;
    $prev_solution_drawback_1_p = $prev_solution_drawback_1;
    $prev_solution_drawback_2_p = $prev_solution_drawback_2;
    $prev_solution_drawback_3_p = $prev_solution_drawback_3;
    $sloution_p = $sloution;
    $sloution_advantage_1_p = $sloution_advantage_1;
    $sloution_advantage_2_p = $sloution_advantage_2;

    $url = string_to_url($title);
    $metadescription = $title;
    $is_scientific = 1;
    $empty = '';

    $sql = 'INSERT INTO `submissions` (
        `web_id`, `url`, `title`, `content`, `keywords`, `metadescription`, `user_id`,
        `related_links_1`, `related_links_text_1`, `related_links_2`, `related_links_text_2`, `related_links_3`, `related_links_text_3`,
        `is_scientific`, `authors`,
        `problem`, `problem_p`, `problem_exp`,
        `problem_importance`, `problem_importance_p`, `problem_importance_exp`,
        `prev_solution_1`, `prev_solution_1_p`, `prev_solution_drawback_1`, `prev_solution_drawback_1_p`, `prev_solution_drawback_1_exp`,
        `prev_solution_2`, `prev_solution_2_p`, `prev_solution_drawback_2`, `prev_solution_drawback_2_p`, `prev_solution_drawback_2_exp`,
        `prev_solution_3`, `prev_solution_3_p`, `prev_solution_drawback_3`, `prev_solution_drawback_3_p`, `prev_solution_drawback_3_exp`,
        `sloution`, `sloution_p`, `sloution_exp`,
        `sloution_advantage_1`, `sloution_advantage_1_p`, `sloution_advantage_1_exp`,
        `sloution_advantage_2`, `sloution_advantage_2_p`, `sloution_advantage_2_exp`,
        `ref_authors_1`, `ref_article_title_1`, `ref_journal_title_1`, `ref_vol_issue_1`,
        `ref_authors_2`, `ref_article_title_2`, `ref_journal_title_2`, `ref_vol_issue_2`,
        `ref_authors_3`, `ref_article_title_3`, `ref_journal_title_3`, `ref_vol_issue_3`
    ) VALUES (
        ?,?,?,?,?,?,?,
        ?,?,?,?,?,?,
        ?,?,
        ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
    )';

    $sth = $main->prepare($sql);
    try {
        $sth->execute([
        $target_web,
        $url,
        $title,
        $content,
        $keywords,
        $metadescription,
        (int)$user_id,
        $empty,
        $empty,
        $empty,
        $empty,
        $empty,
        $empty,
        $is_scientific,
        $authors,
        $problem,
        $problem_p,
        $problem_exp,
        $problem_importance,
        $problem_importance_p,
        $problem_importance_exp,
        $prev_solution_1,
        $prev_solution_1_p,
        $prev_solution_drawback_1,
        $prev_solution_drawback_1_p,
        $prev_solution_drawback_1_exp,
        $prev_solution_2,
        $prev_solution_2_p,
        $prev_solution_drawback_2,
        $prev_solution_drawback_2_p,
        $prev_solution_drawback_2_exp,
        $prev_solution_3,
        $prev_solution_3_p,
        $prev_solution_drawback_3,
        $prev_solution_drawback_3_p,
        $prev_solution_drawback_3_exp,
        $sloution,
        $sloution_p,
        $sloution_exp,
        $sloution_advantage_1,
        $sloution_advantage_1_p,
        $sloution_advantage_1_exp,
        $sloution_advantage_2,
        $sloution_advantage_2_p,
        $sloution_advantage_2_exp,
        $d['ref_authors_1'],
        $d['ref_article_title_1'],
        $d['ref_journal_title_1'],
        $d['ref_vol_issue_1'],
        $d['ref_authors_2'],
        $d['ref_article_title_2'],
        $d['ref_journal_title_2'],
        $d['ref_vol_issue_2'],
        $d['ref_authors_3'],
        $d['ref_article_title_3'],
        $d['ref_journal_title_3'],
        $d['ref_vol_issue_3'],
        ]);
    } catch (PDOException $e) {
        return ['ok' => false, 'message' => 'Database error while saving the article. Ensure `submissions` has scientific columns (is_scientific, problem, …) or check server logs.'];
    }

    $del = $builder->prepare('DELETE FROM `scientific_article_drafts` WHERE `draft_id` = ? AND `user_id` = ?');
    $del->execute([$draft_id, (int)$user_id]);

    return ['ok' => true, 'message' => 'Scientific article saved.'];
}
