<?php

class StockModel
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






	public function insertphoto($id, $logo)
	{

		$sql = "
		          INSERT INTO `stockphoto`( `sid`, `photo`)	VALUES(:sid , :logo);
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":sid" => $id, ":logo" => $logo));
	}


	public function updatephoto($id, $logo)
	{

		$sql = "
		    	update stockphoto set `photo` =:logo  WHERE  `sid` =:sid
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":sid" => $id, ":logo" => $logo));
	}

	public function getunlink($id)
	{

		$sql = "
		    	SELECT `photo` FROM `stockphoto` WHERE  `sid` =:sid
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":sid" => $id));
		return $query->fetchAll();
	}





	public function CheckBarcode($barcode)
	{

		$sql = "
				SELECT Count(*) as total FROM `product` WHERE
				barcode =:barcode
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":barcode" => $barcode));
		return $query->fetch()->total;
	}
	// =============== add new ==================
	public function getUserinfo($userId)
	{


		$sql = "
					SELECT userid, username, password, fullname, contact, email, b.depid, b.cid, position ,
					(select cname from company as a where a.cid=b.cid ) as company,
					(select department from department as a where a.did=b.depid ) as department
					FROM users as b  where  userid=:userId

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(':userId' => $userId));
		return $query->fetchAll();
	}
	// =============== add new ==================
	public function LoadStock()
	{

		$sql = "SELECT b.`id`, b.`barcode`, b.`pname`, b.`uom`,b.`qty`, b.`unitprice`, b.`critical`, b.`category`,
		(SELECT aa.addqty from stocks as aa where aa.productid=b.`id` order by aa.id desc limit 1) as addqty,
		(SELECT  `categoryname` FROM `category`  as a WHERE a.catid=b.category limit 1) as catname,
		(SELECT  Count(a.productid) FROM `stationary`  as a WHERE a.productid=b.id limit 1) as countReq,
		(SELECT sum(addqty) from stocks as aa where aa.productid=b.`id` limit 1) as totalqty,
		(SELECT sum(aa.totalcost) from stocks as aa where aa.productid=b.`id` limit 1) as totalcosting,
		(SELECT max(datein) from stocks as aa where aa.productid=b.`id`order by id desc limit 1) as datein,
		(SELECT max(unitprice) from stocks as aa where aa.productid=b.`id` order by id desc limit 1) as upPrice,
		(SELECT max(photo) from stockphoto as aa where aa.sid=b.`id` limit 1 ) as photo
		FROM `product`	as b
		inner join stocks as s on b.id = s.productid
		group by b.id
		order by b.id desc";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function getunitprice($id)
	{

		$sql = "
				SELECT  `unitprice`

				FROM `stocks`	as b where productid=:id order by id desc
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
		));
		return $query->fetch()->unitprice;
	}
	public function LoadStockHistory($id)
	{

		$sql = "
				SELECT `id`, `productid` as barcode, `datein`, `addqty`, `unitprice`, `totalcost`

				FROM `stocks`	as b where productid=:id order by id desc
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
		));

		return $query->fetchAll();
	}
	public function LoadCategory()
	{

		$sql = "
				SELECT `catid`, `categoryname` FROM `category`	order by catid desc
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}

	// == add new =============
	// public function compare_qty_stock_product($id)
	// {

	// 	$sql = "SELECT  p.qty,s.addqty from product as p join stocks as s on p.id=s.productid where p.id=:id
	// 	";
	// 	$query = $this->db->prepare($sql);
	// 	$query->execute(array(':id' => $id ));
	// 	return $query->fetchAll();



	// }


	// public function Qty_stock($id)
	// {

	// 	$sql = "SELECT  addqty AS qty_stock from stock where  id = :id
	// 	";
	// 	$query = $this->db->prepare($sql);
	// 	$query->execute(array(':id' => $id ));
	// 	return $query->fetch()->qty_stock;



	// }

	// == add new =============
	public function addStockQty($id, $newqty)
	{
		$sql = "
				update `product` set  `qty` = (qty + :newqty)
				where id=:id
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":newqty" => $newqty,
			":id" => $id,

		));
	}

	// ===== add new ===========================

	// ===== add new ===========================

	public function AddStock($barcode, $qty, $unitprice, $totalcost, $datein, $userId)
	{

		$sql = "
				INSERT INTO `stocks`(`productid`, `datein`, `addqty`, `unitprice`, `totalcost`,`user_add`)
				VALUES (:barcode ,:datein ,:qty, :unitprice,:totalcost,:userId)
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":barcode" => $barcode,
			":totalcost" => $totalcost,
			":qty" => $qty,
			":unitprice" => $unitprice,
			":datein" => $datein,
			":userId" => $userId
			// return $this->db->stocks();

		));
	}
	public function getid($barcode)
	{

		$sql = "
				SELECT  `id`

				FROM `product`	as b where barcode=:barcode
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":barcode" => $barcode,
		));
		return $query->fetch()->id;
	}

	public function AddProduct($barcode, $pname, $uom, $rep, $qty, $unitprice, $cat)
	{

		$sql = "
				INSERT INTO `product`(`barcode`, `pname`, `uom`, `qty`, `unitprice`, `critical`, `category`)
				VALUES(
				 :barcode, :pname, :uom, :qty, :unitprice, :rep	, :cat	)

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");

		$query = $this->db->prepare($sql);
		$query->execute(array(
			":barcode" => $barcode,
			":pname" => $pname,
			":uom" => $uom,
			":rep" => $rep,
			":qty" => $qty,
			":unitprice" => $unitprice,
			":cat" => $cat,
		));
	}

	public function UpdateStock($id, $name, $uom, $qty, $rep, $cat)
	{

		$sql = "
				UPDATE `product` SET `pname`=:name,
				`uom`=:uom,`critical`=:rep	, category= :cat,qty=:qty

				where id=:id";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":name" => $name,
			":uom" => $uom,


			":rep" => $rep,
			":id" => $id,
			":cat" => $cat,
			":qty" => $qty
		));
	}

	public function deleteStock($id)
	{

		// product
		$sql = "delete from product where id=:id";
		$query = $this->db->prepare($sql);
		$query->execute(array(":id" => $id));

		// delete stock
		$sql = "DELETE FROM `stocks` WHERE `productid`=:id";
		$query = $this->db->prepare($sql);
		$query->execute(array(":id" => $id));
	}
}
