<?php

class StationaryModel
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



	public function getRequestEmail($id)
	{

		// $sql = "
		//     SELECT `id`, `reqCode`, `requestor`, (select Email from users as a where userid=requestor) as Email 
		// 	FROM `stationary` where id=:id

		// ";
		$sql = "
		SELECT
		st.`id`,
		st.`reqCode`,
		st.`requestor`,
		st.reqqty AS qty_request,
		st.daterequest AS daterequest,
		st.remarks AS remarks,
        st.status,
        c.categoryname,
        u.fullname as requester_name,
		u.Email AS Email,
		p.pname AS pname
	FROM
		`stationary` AS st
	LEFT JOIN users AS u
	ON
		u.userid = st.requestor
	LEFT JOIN product AS p
	ON
		st.productid = p.id
    LEFT JOIN category as c
    ON  c.catid=p.category
	WHERE
		st.id =:id
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
		));
		return $query->fetchAll();
	}


	public function LoadRequest()
	{

		$sql = "SELECT a.`id`, a.`reqCode`,a.`requestor`, a.`productid`, a.`reqqty`, a.`dateneeded`, a.`daterequest`, a.`remarks`, 
		a.`lineManagerid`, a.`adminid`, a.`given`, a.`status`, a.`linemanagerdate`, a.`admindate`, a.`givendate`,
		(Select fullname from users where userid=given) as givenby,		
		(Select fullname from users where userid=requestor limit 1) as requestorname,		
		(Select fullname from users where userid=lineManagerid limit 1) as linemane,		
		(Select fullname from users where userid=adminid limit 1) as adminname,
		(Select cname from users as bb , company as cc  where userid=requestor and cc.cid =bb.cid limit 1) as company	,
		(Select department from users as bb , department as cc  where userid=requestor and cc.did =bb.depid limit 1) as department	,
		
		(Select profile from users where userid=given limit 1) as givenprofile,		
		(Select profile from users where userid=requestor limit 1) as requestorprofile,		
		(Select profile from users where userid=lineManagerid limit 1) as lineprofile,		
		(Select profile from users where userid=adminid limit 1) as adminprofile	,
		
		
		(Select barcode from product as b where b.id=productid limit 1) as barcode	,
		(Select pname from product as b where b.id=productid limit 1) as pname,
		(Select uom from product as b where b.id=productid limit 1) as uom,
		(Select unitprice from product as b where b.id=productid limit 1) as unitprice,
		(Select categoryname from product as b , category as c where b.id=productid and c.catid=b.category limit 1 ) as category,
		a.totalcost,a.linemanagerdate,a.admindate, a.givendate,a.canceldate

		FROM `stationary` as a order by  a.id desc
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}



	public function AddData($id, $userid, $barcode, $qty, $dateneed, $date, $remark, $totalcost)
	{

		$sql = "
				INSERT INTO `stationary`(				
				`reqCode`, `requestor`, `productid`, `reqqty`, `dateneeded`,
				`daterequest`, `remarks`,`status`,totalcost)
				VALUES (:id,
				:userid,
				:barcode,
				:qty,
				:dateneed,
				:date,
				:remark,
				'Pending',:totalcost
				);
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":userid" => $userid,
			":barcode" => $barcode,
			":qty" => $qty,
			":dateneed" => $dateneed,
			":date" => $date,
			":remark" => $remark,
			":totalcost" => $totalcost,
		));
	}
	public function ApproveLine($id, $date, $userid)
	{

		$sql = "
				update stationary set lineManagerid= :userid,
				linemanagerdate= :date
				where id=:id
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":date" => $date,
			":userid" => $userid,
		));
	}
	public function ApproveAdmin($id,$userid, $date)
	{

		$sql = "
				update stationary set 
				admindate= :date,adminid=:userid
				where id=:id
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":userid" => $userid,
			":date" => $date,
		));
	}


	public function getRequest($id)
	{

		$sql = "
				SELECT lineManagerid,adminid ,given,reqqty, productid
				FROM `stationary` as a where id=:id
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
		));
		return $query->fetchAll();
	}




	public function cancelline($id, $date)
	{

		$sql = "
				update stationary set canceldate= :date
				where id=:id
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":date" => $date
		));
	}

	public function gavebyStat($id, $date, $userid)
	{

		$sql = "
				update stationary set given= :userid,
				givendate= :date
				where id=:id
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":date" => $date,
			":userid" => $userid,
		));
	}
	// ===== origin =================
	// public function updateStatus($id, $status)
	// {

	// 	$sql = "
	// 			update stationary set status= :status
	// 			where id=:id
				
	// 			";
	// 	$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
	// 	$query = $this->db->prepare($sql);
	// 	$query->execute(array(
	// 		":id" => $id,
	// 		":status" => $status,
	// 	));
	// }
	public function updateStatus($id,$status)
	{

		$sql = "
				update stationary set status= :status
				where id=:id
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":status" => $status,
		));
	}

	// ==== get adminid ================
	public function get_adminid($id,$status)
	{

		$sql = "
				select adminid stationary where status= :status
				and id=:id
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":status" => $status,
		));
	}

	// ==== get adminid 

	public function Updateproduct($id, $qty)
	{

		$sql = "
				update product set qty = (qty - :qty) where id=:id
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":qty" => $qty,
		));
	}
	public function UpdateproductReturn($id, $qty)
	{

		$sql = "
				update product set qty = (qty + :qty) where id=:id
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":qty" => $qty,
		));
	}


	public function CheckDuplicate($id)
	{

		$sql = "
				SELECT Count(*) as total FROM `stationary` WHERE 	reqCode =:id
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":id" => $id));
		return $query->fetch()->total;
	}


	public function getUnitBarcode($barcode)
	{

		$sql = "
				SELECT max(unitprice) as unitprice FROM `product` WHERE 	id =:barcode
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":barcode" => $barcode));
		return $query->fetch()->unitprice;
	}

	public function CheckBarcode($barcode)
	{

		$sql = "
				SELECT Sum(qty) as totalqty FROM `product` WHERE 	id =:barcode
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":barcode" => $barcode));
		return $query->fetch()->totalqty;
	}

	public function LoadData($cid)
	{

		$sql = "
				SELECT `userid`, `username`, `password`, `fullname`, `contact`, `Email`, 
				`depid`, 
				`cid`, 
				`position`,
				`profile` ,
				(select cname from company as b where b.cid=a.cid)as company,
				(select department from department as b where b.did=a.depid)as department
				FROM `users` as a
				WHERE a.cid=:cid
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(':cid' => $cid));
		return $query->fetchAll();
	}
	public function Loadproduct()
	{

		$sql = "
				SELECT `id`, `barcode`, `pname`, `uom`, `qty`, `unitprice`, `critical` FROM `product` 
				WHERE qty !=0
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function loadStock($catid)
	{

		$sql = "
				SELECT `id`, `barcode`, `pname`, `uom`, `qty`, `unitprice`, `critical`, `category` FROM `product` 
				WHERE qty !=0 and category = :catid
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(':catid' => $catid));
		return $query->fetchAll();
	}
	public function Loadcategory()
	{

		$sql = "
				SELECT `catid`, `categoryname` FROM `category` order by categoryname asc
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
}
