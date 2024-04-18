<?php

function getTyped(mysqli $mysqli, $username){
    $query = $mysqli->prepare("SELECT username,firstname, lastname, usertype FROM dorm WHERE username = ?");
    if ($query) {
        $query->bind_param("s", $username);
        if ($query->execute()) {
            $query->store_result();
            if ($query->num_rows === 1){
                $query->bind_result($username, $firstname,$lastname,$usertype);
                $query->fetch();
                $typeInformation = ['id'=>$username,'first'=>$firstname,'last'=>$lastname,'type'=>$usertype];
                $query->close();
                return $typeInformation;
            }
        }
    }
}

?>