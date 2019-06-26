<?php


echo "こんにちわ！Hello !! Watashi ha Hamachii Da Yo !!";

$str = "オリジナル";

//①文字コードを変換して保存してみよう！

// 内部エンコーディング(UTF-8)からEUC-JPに変換します
$euc =  mb_convert_encoding($str, "EUC-JP");
// UTF-8からSJISに変換します
$sjis =  mb_convert_encoding($str, "SJIS", "UTF-8");

// 変換した文字列をファイルに保存するとEUC-JPで保存されています
file_put_contents("euc.txt", $euc);
// 変換した文字列をファイルに保存するとSHIFT-JISで保存されています
file_put_contents("sjis.txt", $sjis);


// ② 実行ファイルとは異なる文字コードの文字列を変換して表示してみよう！

// 先程保存した異なる文字コードのファイルから文字列を取得します
$euc = file_get_contents("euc.txt");
$sjis = file_get_contents("sjis.txt");

// それぞれ正しい文字コードからUTF-8に変換すると「オリジナル」が表示されます
echo '------------ 正しい変換 ------------ '.PHP_EOL;
echo mb_convert_encoding($euc, "UTF-8", "EUC-JP").PHP_EOL;
echo mb_convert_encoding($sjis, "UTF-8", "SJIS").PHP_EOL;

// 元の文字コードとは別の文字コードを指定して変換すると文字化けが発生します
echo '------------ 誤った変換 ------------ '.PHP_EOL;
echo mb_convert_encoding($euc, "UTF-8", "SJIS").PHP_EOL;
echo mb_convert_encoding($sjis, "UTF-8", "EUC-JP").PHP_EOL;

// 第3引数にコンマ区切りや配列で複数の文字コードを指定することもでき、複数の中から該当する文字コードでエンコーディングされます
echo '------------ 複数の文字コードを指定して変換 ------------ '.PHP_EOL;
echo mb_convert_encoding($euc, "UTF-8", "UTF-8,EUC-JP").PHP_EOL;
echo mb_convert_encoding($sjis, "UTF-8", ["JIS", "SJIS"]).PHP_EOL;