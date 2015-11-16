# Mecab\_On\_PHP

## Description

形態素解析ソフト、MecabをPHP上で扱うためのクラス

## Usage

```
require_once('./mecab.php');

// mecabのパスを指定
$mecab_path = '/usr/local/bin/mecab';

// 解析対象の文章
$text = '富士には月見草がよく似合う';

// インスタンスを生成し、実行
$mecab = new Mecab($mecab_path);
$result = $mecab->execute($text);

var_dump($result);



// array(7) {
//   [0]=>
//   array(10) {
//     ["surface_form"]=>
//     string(6) "富士"
//     ["part_of_speech"]=>
//     string(6) "名詞"
//     ["subtype1"]=>
//     string(12) "固有名詞"
//     ["subtype2"]=>
//     string(6) "地域"
//     ["subtype3"]=>
//     string(6) "一般"
//     ["conjugational form"]=>
//     string(1) "*"
//     ["conjugational type"]=>
//     string(1) "*"
//     ["original"]=>
//     string(6) "富士"
//     ["katakana"]=>
//     string(6) "フジ"
//     ["pronounce"]=>
//     string(6) "フジ"
//   }
//   [1]=>
//   array(10) {
//     ["surface_form"]=>
//     string(3) "に"

.......

```

## Option

execute();の第二引数に`false`を指定すると、単語ごとの連想配列ではなく、文字列として出力されます。

```
// array(13) {
//   [0]=>
//   string(61) "我輩	名詞,一般,*,*,*,*,我輩,ワガハイ,ワガハイ"
//   [1]=>
//   string(40) "は	助詞,係助詞,*,*,*,*,は,ハ,ワ"
//   [2]=>
//   string(49) "ねこ	名詞,一般,*,*,*,*,ねこ,ネコ,ネコ"
//   [3]=>
//   string(54) "で	助動詞,*,*,*,特殊・ダ,連用形,だ,デ,デ"
//   [4]=>
//   string(75) "ある	助動詞,*,*,*,五段・ラ行アル,基本形,ある,アル,アル"
//   [5]=>
//   string(37) "。	記号,句点,*,*,*,*,。,。,。"
//   [6]=>
//   string(55) "名前	名詞,一般,*,*,*,*,名前,ナマエ,ナマエ"
//   [7]=>
//   string(40) "は	助詞,係助詞,*,*,*,*,は,ハ,ワ"
//   [8]=>
//   string(58) "まだ	副詞,助詞類接続,*,*,*,*,まだ,マダ,マダ"
//   [9]=>
//   string(83) "ない	形容詞,自立,*,*,形容詞・アウオ段,基本形,ない,ナイ,ナイ"
//   [10]=>
//   string(33) "ニャン	名詞,一般,*,*,*,*,*"
//   [11]=>
//   string(37) "。	記号,句点,*,*,*,*,。,。,。"
//   [12]=>
//   string(3) "EOS"
// }
```

## Author
ozawa  
https://github.com/tomoya-ozawa