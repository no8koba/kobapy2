<?php


echo "����ɂ���IHello !! Watashi ha Hamachii Da Yo !!";

$str = "�I���W�i��";

//�@�����R�[�h��ϊ����ĕۑ����Ă݂悤�I

// �����G���R�[�f�B���O(UTF-8)����EUC-JP�ɕϊ����܂�
$euc =  mb_convert_encoding($str, "EUC-JP");
// UTF-8����SJIS�ɕϊ����܂�
$sjis =  mb_convert_encoding($str, "SJIS", "UTF-8");

// �ϊ�������������t�@�C���ɕۑ������EUC-JP�ŕۑ�����Ă��܂�
file_put_contents("euc.txt", $euc);
// �ϊ�������������t�@�C���ɕۑ������SHIFT-JIS�ŕۑ�����Ă��܂�
file_put_contents("sjis.txt", $sjis);


// �A ���s�t�@�C���Ƃ͈قȂ镶���R�[�h�̕������ϊ����ĕ\�����Ă݂悤�I

// ����ۑ������قȂ镶���R�[�h�̃t�@�C�����當������擾���܂�
$euc = file_get_contents("euc.txt");
$sjis = file_get_contents("sjis.txt");

// ���ꂼ�ꐳ���������R�[�h����UTF-8�ɕϊ�����Ɓu�I���W�i���v���\������܂�
echo '------------ �������ϊ� ------------ '.PHP_EOL;
echo mb_convert_encoding($euc, "UTF-8", "EUC-JP").PHP_EOL;
echo mb_convert_encoding($sjis, "UTF-8", "SJIS").PHP_EOL;

// ���̕����R�[�h�Ƃ͕ʂ̕����R�[�h���w�肵�ĕϊ�����ƕ����������������܂�
echo '------------ ������ϊ� ------------ '.PHP_EOL;
echo mb_convert_encoding($euc, "UTF-8", "SJIS").PHP_EOL;
echo mb_convert_encoding($sjis, "UTF-8", "EUC-JP").PHP_EOL;

// ��3�����ɃR���}��؂��z��ŕ����̕����R�[�h���w�肷�邱�Ƃ��ł��A�����̒�����Y�����镶���R�[�h�ŃG���R�[�f�B���O����܂�
echo '------------ �����̕����R�[�h���w�肵�ĕϊ� ------------ '.PHP_EOL;
echo mb_convert_encoding($euc, "UTF-8", "UTF-8,EUC-JP").PHP_EOL;
echo mb_convert_encoding($sjis, "UTF-8", ["JIS", "SJIS"]).PHP_EOL;