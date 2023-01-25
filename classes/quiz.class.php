<?php

class Quiz extends Dbh {
    public function getAll() {
        $sql = 'SELECT *
                FROM Quizes
                ;';

        $result = self::connect()->query($sql);
        return $result->fetchAll();
    }

    public function getQuiz($quizId) {
        $sql = 'SELECT quiz_data
                FROM Quizes
                WHERE id = ?
                ;';

        $stm = self::connect()->prepare($sql);
        $stm->execute([$quizId]);
        return $stm->fetch()['quiz_data'];
    }

    public function deleteQuiz($quizId) {
        $sql = 'DELETE
                FROM Quizes
                WHERE id = ?
                ;';

        try {
            $stm = self::connect()->prepare($sql);
            $result = $stm->execute([$quizId]);
        } catch (PDOException $e) {
            return false;
        }
        return $result;
    }
}