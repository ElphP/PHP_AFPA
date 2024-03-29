<?php
if (isset($_POST)) {
    if (!empty($_POST["key"]) && !empty($_POST["mess"])) {
        // $mess = str_replace(' ', '', $_POST["mess"]);
        // $mess = strtoupper($mess);

        // $count = mb_strlen($mess);
        // $key = strtoupper($_POST["key"]);


        // while ($count > 0) {
        //     for ($i = 0; $i < mb_strlen($key); $i++) {

        //         if ($count == 0) {
        //             continue;
        //         } else {
        //             global $strKey;
        //             $strKey .= $key[$i];
        //             $count--;
        //         }
        //     }
        // }
        // $alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        // for ($i = 0; $i < mb_strlen($mess); $i++) {
        //     global $code;


        //     $code .= $alphabet[(array_search($mess[$i], $alphabet) + array_search($strKey[$i], $alphabet)) % 26];
        // }
        // echo "Message codé: " . $code;

        $mess = strtoupper(str_replace(' ', '', $_POST["mess"]));
        $key = strtoupper($_POST["key"]);
        $keyRepeated = strtoupper(str_repeat($key, ceil(strlen($mess) / strlen($key))));
        $alphabet = range('A', 'Z');

        $code = '';
        for ($i = 0; $i < strlen($mess); $i++) {
            $messIndex = array_search($mess[$i], $alphabet);
            $keyIndex = array_search($keyRepeated[$i], $alphabet);
            $code .= $alphabet[($messIndex + $keyIndex) % 26];
        }

        echo "Message codé: " . $code;
    }
}


?>
<h1 class="text-center">Module de chiffrement</h1>
<div class="container text-center ">
    <form action="" method="post" class="d-flex flex-column ">
        <div class="my-2">
            <label for=" key">Clé de chiffrement</label>
            <input type="text" name="key" id="key">
        </div>
        <div class="my-2 d-flex align-content-start justify-content-center">
            <label for="mess">Message à coder</label>
            <textarea type="text" name="mess" id="mess"></textarea>
        </div>
        <button type="submit" class="btn btn-primary col-2 offset-5 ">Coder le message</button>
    </form>
</div>