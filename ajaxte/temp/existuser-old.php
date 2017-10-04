<?php
//function existsUser($username, $password = null){
//    try{
//        $pdo = connect();
//        $statement = $pdo->prepare("SELECT id, username, email, password FROM members WHERE username = ?");
//        $statement->execute(array($username));
//
//        if($password == null){
//            return $statement->rowCount() > 0;
//        }
//
//        if($statement->rowCount() > 0){
//            $user = $statement->fetch(PDO::FETCH_ASSOC);
//            if($user["password"] == sha1($password)){
//                return $user;
//            }
//            else{
//                return false;
//            }
//        }
//        else{
//            return false;
//        }
//    }