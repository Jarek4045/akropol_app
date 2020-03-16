<?php namespace App\Modules\Utils;

use Response;

class Utils {

	public static function generatePassword($amount = 8) {

     	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $amount; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function replaceSpecialChars($text) {
    	return strtolower(preg_replace('/([^a-zA-Z0-9.])/', "_", $text));
    }

    public static function generateCsvFileFromData($data, $headItems, $fileName){


        return self::generateCsvFileFromList($list, $headItems, $fileName);

    }

    public static function generateCsvFileFromList($list, $headItems, $fileName){


        // print_r($list);
        // die();

        $filename = base_path() . '/storage/app/download/report.csv';

        $headers = [
                'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv;charset=UTF-8'
            ,   'Content-Disposition' => 'attachment; filename=galleries.csv'
            ,   'Expires'             => '0'
            ,   'Pragma'              => 'public'
        ];


        # add headers for each column in the CSV download
        //array_unshift($list, array_keys($headItems));
        array_unshift($list, $headItems);

        $FH = fopen($filename, 'w+');
        foreach ($list as $row) { 
            fputcsv($FH, $row);
        }
        fclose($FH);

        //return Response::stream($callback, 200, $headers);

        return Response::download($filename, $fileName, $headers);

    }
}