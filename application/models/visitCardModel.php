<?php

class VisitCardModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    function create($cardNo, $cardType)
    {
        $sql = "INSERT INTO visit_cards (card_no, card_type) VALUES (:cardNo, :cardType)";
        $query = $this->db->prepare($sql);
        $parameters = array(':cardNo' => $cardNo, ':cardType' => $cardType);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    // Get a card by card number
    function getCardByCardNo($cardNo)
    {
        $sql = "SELECT * FROM visit_cards WHERE card_no = :cardNo LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':cardNo' => $cardNo);

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    function getCardById($cId)
    {
        $sql = "SELECT * FROM visit_cards WHERE id = :cId LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':cId' => $cId);

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    // Get all cards
    function getAllCards(
        $offset = 0,
        $limit = 20
    ) {
        $sql = "SELECT * FROM visit_cards LIMIT $offset, $limit";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that get all result rows
        return $query->fetchAll();
    }

    function getAllCardsNoLimit()
    {
        $sql = "SELECT * FROM visit_cards";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that get all result rows
        return $query->fetchAll();
    }

    // Get total records
    function getTotalRecords()
    {
        $sql = "SELECT COUNT(*) FROM visit_cards";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return (int) $query->fetchColumn();
    }

    // Update card status
    function updateCardStatus($cardNo, $status)
    {
        $sql = "UPDATE visit_cards SET status = :status WHERE card_no = :cardNo";
        $query = $this->db->prepare($sql);
        $parameters = array(':cardNo' => $cardNo, ':status' => $status);

        $query->execute($parameters);
    }
}
