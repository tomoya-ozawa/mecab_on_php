<?php

require 'vendor/autoload.php';
use MecabOnPhp\mecab;

// mecabのパスを指定
$mecab_path = '/usr/local/bin/mecab';
// 解析対象の文章
$text = '富士には月見草がよく似合う';

// インスタンスを生成し、実行
$mecab = new Mecab($mecab_path);
$result = $mecab->execute($text);

var_dump($result);
