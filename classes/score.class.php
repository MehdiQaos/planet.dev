<?php

class Score extends Dbh {
    public function topScores($quizId, $top) {
        $sql = "SELECT Scores.points as score, Users.username as name
                FROM Scores
                JOIN Users
                ON Scores.user_id = Users.id
                WHERE Scores.quiz_id = ?
                ORDER BY Scores.points DESC
                LIMIT $top
                ;";
        
        try {
            $stm = self::connect()->prepare($sql);
            $stm->execute([$quizId]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo $stm->debugDumpParams();
        }
        $result = $stm->fetchAll();
        $result = json_encode($result);

        return $result;
    }

    public function saveScore($userId, $quizId, $points) {
        $sql = "SELECT *
                FROM Scores
                WHERE user_id = ?
                AND quiz_id = ?
                ;";
        $pdo = self::connect();
        $stm = $pdo->prepare($sql);
        $stm->execute([$userId, $quizId]);
        if ($stm->fetch()) {
            $sql = "UPDATE Scores
                    SET points = ?
                    WHERE user_id = ?
                    AND quiz_id = ?
                    ;";
            $stm = $pdo->prepare($sql);
            $stm->execute([$points, $userId, $quizId]);
        }
        else {
            $sql = "INSERT INTO Scores (quiz_id, user_id, points)
                    VALUES (?, ?, ?)
                    ;";
            $stm = $pdo->prepare($sql);
            $stm->execute([$quizId, $userId, $points]);
        }
    }
}