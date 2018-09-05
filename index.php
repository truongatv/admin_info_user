<?php
    require('connect_db.php');
    $sql = "SELECT * FROM accounts";
    if($conn->query($sql)->num_rows > 0){
        $username = array();
        $furigana = array();
        $region = array();
        $address = array();
        $mail = array();
        $i = 0;
        $exp_special = '/\d|[\$,\！,\＠,\＃,\＄,\％,\＾,\＆,\＊,\（,\）,\ー,\＝,\＋,\？,\＜,\＞,\・,\!,\@,\#,\%,\^,\&,\*,\(,\),\<,\>,\+,\=,\?]/';
        $exp_special_address = '/[\$,\！,\＠,\＃,\＄,\％,\＾,\＆,\＊,\（,\）,\ー,\＝,\＋,\？,\＜,\＞,\・,\!,\@,\#,\%,\^,\&,\*,\(,\),\<,\>,\+,\=,\?]/';
        $exp_special_mail = '/[\$,\！,\＃,\＄,\％,\＾,\＆,\＊,\（,\）,\ー,\＝,\＋,\？,\＜,\＞,\・,\!,\#,\%,\^,\&,\*,\(,\),\<,\>,\+,\=,\?]/';
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            if(!preg_match($exp_special, $username) || !preg_match($exp_special, $furigana) || !preg_match($exp_special,$region) || !preg_match($exp_special_address, $address) || !preg_match($exp_special_mail, $mail)){
                $username[$i] = $row["username"];
                $furigana[$i] = $row["furigana"];
                $region[$i] = $row["region"];
                $address[$i] = $row["address"];
                $mail[$i] = $row["email"];
                $i ++;
            }
        }
    }
?>

<html>
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <div class="main-signup">
        <h1>List info user</h1>
        <div class="content-list-user">
            <div>
                <table class="table table-striped">
                    <tr>
                        <th class="title">名前</th>
                        <th class="title">ふりがな</th>
                        <th class="title">都道府県</th>
                        <th class="title">住所</th>
                        <th class="title">Eメールアドレス</th>
                    </tr>
                    <?php 
                        for ($j = 0; $j < $i; $j++){
                    ?>
                    <tr>
                        <th><?php echo $username[$j]; ?></th>
                        <th><?php echo $furigana[$j]; ?></th>
                        <th><?php echo $region[$j]; ?></th>
                        <th><?php echo $address[$j]; ?></th>
                        <th><?php echo $mail[$j]; ?></th>
                    </tr>
                        <?php  } ?>
                   
                </table>
            </div>
        </div>
    </div>
</body>
</html>