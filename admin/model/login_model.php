<?php
    require_once('config/config.php');
    function xl_login($username, $password)
    {
        $data = array();
        $conn = connection();
        $sql  = "SELECT * FROM admin AS a WHERE a.username= :username AND a.password= :password AND a.status= 1 LIMIT 1";
        $stmt = $conn->prepare($sql);
        if($stmt)
        {
            $stmt->bindParam(':username',$username,PDO::PARAM_STR);
            $stmt->bindParam(':password',$password,PDO::PARAM_STR);
            if($stmt->execute())
            {
                if($stmt->rowCount() > 0)
                {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
            $stmt->closeCursor();
        }
        disconnection($conn);
        return $data;
    }
?>