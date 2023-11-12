<?php
class OfficeVisitingModel
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

    function create(
        $visitorName,
        $comeFrom,
        $objective,
        $officeFloor,
        $idType,
        $idNo,
        $phone,
        $totalVisitor,
        $visitingCardId
    ) {
        $sql = "INSERT INTO office_visiting (visitor_name, come_from, objective, office_floor, id_type, id_no, phone,
         total_visitor, visiting_card_id, status) VALUES (:visitorName, :comeFrom, :objective, :officeFloor, :idType, :idNo, 
         :phone, :totalVisitor, :visitingCardId, 1)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':visitorName' => $visitorName,
            ':comeFrom' => $comeFrom,
            ':objective' => $objective,
            ':officeFloor' => $officeFloor,
            ':idType' => $idType,
            ':idNo' => $idNo,
            ':phone' => $phone,
            ':totalVisitor' => $totalVisitor,
            ':visitingCardId' => $visitingCardId
        );
        $query->execute($parameters);
    }

    // Get all visiting with pagination
    function getAllVisiting(
        $offset = 0,
        $limit = 20
    ) {
        // query office_visiting table with join visit_cards table
        $sql = "SELECT office_visiting.*, visit_cards.card_no FROM office_visiting  LEFT JOIN visit_cards 
        ON office_visiting.visiting_card_id = visit_cards.id 
        ORDER BY office_visiting.createdAt DESC LIMIT $offset, $limit";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function getTotalVisiting()
    {
        $sql = "SELECT COUNT(*) FROM office_visiting";
        $query = $this->db->prepare($sql);
        $query->execute();
        return (int) $query->fetchColumn();
    }

    function getActiveVisitingByCard($id)
    {
        $sql = "SELECT * FROM office_visiting WHERE visiting_card_id = :id AND status = 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetch();
    }

    function clearVisiting($id)
    {
        $sql = "UPDATE office_visiting SET status = 0 WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
    }

    function searyByCardOrName(
        $search,
    ) {
        $sql = "SELECT office_visiting.*, visit_cards.card_no FROM office_visiting  LEFT JOIN visit_cards 
        ON office_visiting.visiting_card_id = visit_cards.id 
        WHERE visitor_name LIKE :search OR visiting_card_id LIKE :search
        ORDER BY createdAt DESC";

        $query = $this->db->prepare($sql);
        $parameters = array(':search' => '%' . $search . '%');
        $query->execute($parameters);
        return $query->fetchAll();
    }
}
