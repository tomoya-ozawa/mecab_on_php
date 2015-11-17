<?php

/*
* Mecabをphp上から実行するためのクラス
*/

namespace MecabOnPhp;

class Mecab
{
    private $mecab_path;
    private $tmp_file;

    /*
    * コンストラクタ
    * @param $mecab_path[String] Mecabをインストールしているパス
    * @param $tmp_file[String] 解析対象の文字列を一時的に置くファイル
    * @return[void]
    */
    public function __construct($mecab_path, $tmp_file = './mecab_tmp.txt')
    {
        $this->mecab_path = $mecab_path;
        $this->tmp_file = $tmp_file;
    }

    /*
    * 文字列に対して、mecabにて形態素解析を行い、結果を配列で出力する
    * @param $text[String] 解析対象の文字列
    * @param $assoc[Boolean] trueの場合は、連想配列として出力
    * @return [Array]
    */
    public function execute($text, $assoc = true)
    {
        // エラー防止のために終了記号をつける
        $text .= PHP_EOL;
        // 解析する文字列を、解析用のファイルに出力する
        file_put_contents($this->tmp_file, $text);
        // 実行コマンド
        $exec_command = $this->mecab_path . ' ' . $this->tmp_file;
        $raw_result = array();
        //コマンドを実行する
        exec($exec_command, $raw_result, $res);

        // assocがtrueであれば、連想配列にして出力する
        if ($assoc === true) {
            $assoc_result = array();
            // 各要素ごと処理
            foreach ($raw_result as $key) {
                // 文章の終了記号の場合はスキップする
                if ($key === 'EOS') {
                    continue;
                }

                // データを整形して連想配列にする
                $data = explode("\t", $key);
                $data_ex = explode(",", $data[1]);
                $comp = array(
                    'surface_form' => $data[0],
                    'part_of_speech' => $data_ex[0],
                    'subtype1' => $data_ex[1],
                    'subtype2' => $data_ex[2],
                    'subtype3' => $data_ex[3],
                    'conjugational form' => $data_ex[4],
                    'conjugational type' => $data_ex[5],
                    'original' => $data_ex[6],
                    'katakana' => $data_ex[7],
                    'pronounce' => $data_ex[8]
                );

                array_push($assoc_result, $comp);
            }

            $result = $assoc_result;
        // assoc = falseであれば、そのまま結果を出力
        } else {
            $result = $raw_result;
        }
        // 解析用のtmpファイルを削除
        unlink($this->tmp_file);

        return $result;
    }
}
