<?php

class CategoryModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }



		
		
		public function Checkcategory($catid)
		{
				
				
				$sql = "SELECT  COUNT(*) AS total from  category where  catid=:catid ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':catid' => $catid));
				
				return $query->fetch()->total;
				
		}
		
// add new ===========
		
		public function CheckcategoryandID($id,$categoryname)
		{
				$sql = "SELECT  COUNT(*) AS totalcategory from  category where  categoryname=:categoryname  and catid=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':categoryname' => $categoryname,':id' => $id));
				return $query->fetch()->totalcategory;
				
		}
		
	   public function CheckcategoryandnotID($id,$categoryname)
		{
				$sql = "SELECT  COUNT(*) AS totalcategory1 from  category where  categoryname=:categoryname  and not catid=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':categoryname' => $categoryname,':id' => $id));
				return $query->fetch()->totalcategory1;
				
		}
//  add new =======================
		
	
	
		
		public function Updatecategory($categoryname,$id)
		{
				
				
				$sql = "update `category` set  `categoryname`=:categoryname where catid=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':categoryname' => $categoryname,':id' => $id));
				
				
		}
		

		
		public function Addcategory($categoryname)
		{
				
				
				$sql = "INSERT INTO `category`(`categoryname`) VALUES (:categoryname) ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':categoryname' => $categoryname));
				
				
		}
		public function loadcategory()
		{
				
				
				$sql = "Select  catid,categoryname FROM `category` order by catid asc";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
				// return $query->fetch()->catid;
				
		}
		
	

		
		
	
		
}
?>