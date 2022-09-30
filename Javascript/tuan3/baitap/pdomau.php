<?php 
$host = "127.0.0.1";
$port = 8889;//3306 mac 8889
$database = "misctuandau";
$mk = "hibi";
$ten = "quang";

$pdo = new PDO("mysql:host=$host;port=$port;dbname=$database",$ten , $mk);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// cac chuc nang khac 

function validatePosi() {
    for ($i=1; $i <=9; $i++){
        if ( ! isset($_POST['nam'.$i]) ) continue;
        if ( ! isset($_POST['chitiet'.$i]) ) continue;
        $year = $_POST['nam'.$i];
        $desc = $_POST['chitiet'.$i];
        if ( strlen($year) == 0 || strlen($desc) == 0 ) {
            return "Khung Position  va year can duoc dien! ";
        }
        if ( ! is_numeric($year) ) {
            return "Khung Year phai la so";
        }
    }
    return true;
}

function validatetruonghoc() {
    for ($i = 0; $i<=9 ;$i++) {
        if ( ! isset($_POST['namhoc'.$i])) continue;
        if( ! isset($_POST['truong'.$i])) continue;
        $namhoc = $_POST['namhoc'.$i];
        $truong = $_POST['truong'.$i];
        if (strlen($namhoc) == 0 || strlen($truong) == 0){
            return "Ca nam hoc va Truong deu can duoc ghi";
        }
        if ( ! is_numeric($namhoc)) {
            return "Nam hoc can phai ghi so!";
        }
    }
    return true;
}



function dienO (){
    if (strlen($_POST['ten']) < 1 || strlen($_POST['tenho']) < 1 || strlen($_POST['mail']) < 1
    || strlen($_POST['head']) < 1 || strlen($_POST['sum']) < 1 ){
        return "Tất cả các ô cần phải điền !";
    } else {
        if (strpos($_POST['mail'], "@") === false){
            return "Email phải có @ !";
        }
    }
    return true;
}

function chenPosition($pdo, $profile_id) {
    $rank = 1;
    for ($i=1; $i <=9; $i++){
        if ( ! isset($_POST['nam'.$i]) ) continue;
        if ( ! isset($_POST['chitiet'.$i]) ) continue;
        $year = $_POST['nam'.$i];
        $desc = $_POST['chitiet'.$i];
        $sta = $pdo->prepare("insert into Position 
            (profile_id, rank, year, description) values 
            ( :pro, :ran, :yea, :des )");
        $sta->execute(array(
            ':pro' => $profile_id,
            ':ran' => $rank,
            ':yea' => $year,
            ':des' => $desc
             ));
        $rank++;
        }
}

function chenEducation($pdo, $profile_id){
    $rank = 1;
    for ($i=0; $i <=9; $i++){
        if( ! isset($_POST['namhoc'.$i])) continue;
        if( ! isset($_POST['truong'.$i])) continue;
        $namhoc = $_POST['namhoc'.$i];
        $truong = $_POST['truong'.$i];
 //neu truong da co trong hoso? moi no ra
        $institution_id = false;
        $chen = $pdo->prepare("select institution_id from institution where name = :nam");
        $chen->execute(array(":nam" => $truong));
        $row = $chen->fetch(PDO::FETCH_ASSOC);
        if($row !== false) $institution_id = $row['institution_id'];
// neu chua co thi chen vao
        if ($institution_id === false) {
            $chen = $pdo->prepare("insert into institution (name) values (:nam)");
            $chen->execute(array(':nam' => $truong));
            $institution_id = $pdo->lastInsertId();
        }
        $state = $pdo->prepare('insert into Education 
        (profile_id, institution_id, rank, year) values (:pro, :ins, :ran, :yea)');
        $state->execute(array(
            ':pro' => $profile_id,
            ':ran' => $rank,
            ':yea' => $namhoc,
            ':ins' => $institution_id
        ));
        $rank++;
    }
}

//loadup thong tin position
function loadupPosition($pdo, $profile_id){
    $lenh = $pdo->prepare('select * from position where profile_id = :pro');
    $lenh->execute(array(':pro' => $profile_id));
    $row = $lenh->fetchall(PDO::FETCH_ASSOC);
    return $row;
}


function loadupEdu($pdo, $profile_id){
    $lenhEdu = $pdo->prepare('select education.year, institution.name from education join institution
                        on education.institution_id = institution.institution_id 
                        where education.profile_id = :pro');
    $lenhEdu->execute(array(':pro' => $profile_id));
    $edu = $lenhEdu->fetchall(PDO::FETCH_ASSOC);
    return $edu;
}
