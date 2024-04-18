<?php

declare(strict_types=1);

namespace MyProject\Services;

class FileService extends Service
{
    /**
     * @param array $users
     * @return void
     */
    public function getCsvActiveUser(array $users) :void
    {
        $srcFile = date("Y-m-d-H-i-s"); //Получили для имени нового файла
        $srcFileNameCsv = $srcFile . ".csv"; //Добавили расширение для нового файла
        $fpl = fopen(__DIR__ . "/../../../www/uploads/" . $srcFileNameCsv, "w"); //Открыли новый файл для записи
        fputs($fpl, chr(0xEF) . chr(0xBB) . chr(0xBF));

        foreach($users as $val) {
            fwrite($fpl,  $val->fio . ";"
                . $val->login . ";"
                . $val->birth . ";"
                . PHP_EOL);
        }
        fclose($fpl);

        $file = __DIR__ . "/../../../www/uploads/" . $srcFileNameCsv;
        if (file_exists($file)) {
            if (ob_get_level()) {
                ob_end_clean();
            }
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            unlink($file);
        }
    }
}