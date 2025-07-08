<?php 
function query1() {
    require "conn.php";
    $query1 = "SELECT 
                u.id AS user_id,
                u.nom,
                m.message,
                m.created_at
                FROM (
                    SELECT 
                        CASE 
                            WHEN sender_id = :current_user THEN received_id
                            ELSE sender_id
                        END AS other_user_id,
                        MAX(created_at) AS latest
                    FROM messages
                    WHERE sender_id = :current_user OR received_id = :current_user
                    GROUP BY other_user_id
                ) AS latest_msgs
                JOIN messages m 
                    ON ((m.sender_id = :current_user AND m.received_id = latest_msgs.other_user_id)
                    OR (m.received_id = :current_user AND m.sender_id = latest_msgs.other_user_id))
                AND m.created_at = latest_msgs.latest
                JOIN user u ON u.id = latest_msgs.other_user_id
                ORDER BY m.created_at DESC";
    $stmt1 = $conn->prepare($query1);
    $stmt1->execute(array(":current_user"=>$_SESSION["user"]["id"]));
    return $stmt1->fetchAll(PDO::FETCH_ASSOC);
}
?>