<?php

$root_path = (!empty($_SERVER['DOCUMENT_ROOT'])) ? $_SERVER['DOCUMENT_ROOT'] : '';

/*
 * サブルーチンなど
 */
locate_template('functions/lib.php', true);

/*
 * TITLE META
 */
locate_template('functions/meta.php', true);

/*
 * Custom Fields
 */
locate_template('functions/scf.php', true);

/*
 * カスタム投稿タイプ
 */
locate_template('functions/post_type.php', true);

/*
 * ページネーション
 */
locate_template('functions/pagination.php', true);

/*
 * 表示カスタマイズ
 */
locate_template('functions/output.php', true);

/*
 * 管理画面関連
 */
locate_template('functions/admin.php', true);
