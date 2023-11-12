<?php

class BookroomModel
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



		
		
		
	
		public function getUser()
		{
				
				$sql = "
					Select a.userid,
					(Select department from department where did= a.depid ) as department,
					(Select cname from company as c where c.cid= a.cid ) as company,
					a.fullname
					from users as a order by a.fullname		
				";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
		public function getroom()
		{
				
				$sql = "
					SELECT `roomid`, `roomname` FROM `room` order by roomname asc	
				";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
			
		public function getroomName($id)
		{
				
				$sql = "
					SELECT  `roomname` as roomName FROM `room` as a ,  reqbook as b  where  a.roomid=b.rid and b.rbid =:id	
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
					$query->execute(array(':id' => $id));
				return $query->fetch()->roomName;
			
				
		}
		
		
		public function getReserveRoom()
		{
				
				$sql = "
				SELECT `rbid`, `rid`, `purposed`, `participant`, `startdate`, `enddate`, `remarks`, `createuser`,a.`userid` ,
				(select `roomname` FROM `room`  as b WHERE b.roomid=a.rid) as roomName,
				(select `fullname` FROM `users`  as b WHERE b.userid=a.userid) as requestor,
				(select `fullname` FROM `users`  as b WHERE b.userid=a.createuser) as creator, a.status
				FROM `reqbook` as a 
				order by rbid desc
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			
				
		}
		public function CheckDateRange($start, $end,$rid)
		{
				
				
				$sql = "
				
				
				SELECT COUNT(DISTINCT x.rid) as av
							   FROM reqbook x 
							   LEFT 
							   JOIN reqbook y 
								 ON y.rid = x.rid 
								AND y.startdate < :end
								AND y.enddate > :start 
							  WHERE y.rid=:rid and not  y.status in ('Cancelled' , 'Completed')
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':start' => $start,
				':end' => $end,
				':rid' => $rid));
				$query->execute();
				return $query->fetch()->av;
				
		}

		public function  getCancell($today)
		{
				
				
				$sql = "update `reqbook` set status='Cancelled'  WHERE startdate <= :today and status='Booked'";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
				$query->execute(array(':today' => $today));				
				
				
				
		}
	
		public function  selectCancell($today)
		{
				
				
				$sql = "select  startdate from  `reqbook`   WHERE startdate < :today and status='Booked'";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
				$query->execute(array(':today' => $today));				
				return $query->fetchAll();
				
				
		}
	
		public function insertData($start, $end, $rid, $purpose, $participant, $remarks, $createuser, $userid )
		{
				
				
				$sql = "
				
				INSERT INTO `reqbook`
				(`rid`, `purposed`, `participant`, `startdate`, `enddate`, `remarks`, `createuser`,userid,status)
				VALUES (
				:rid, :purpose,:participant,:start,:end,:remarks,:createuser,:userid, 'Booked'
				)
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
				$query->execute(array(':start' => $start,
				':end' => $end,
				':rid' => $rid,
				':purpose' => $purpose,
				':participant' => $participant,
				':remarks' => $remarks,
				':createuser' => $createuser,
				':userid' => $userid,
				
				));
				
				
		}
		public function deleteRoom($id)
		{
				
				
				$sql = "
				update reqbook set status ='Cancelled' where rbid=:id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
		}
		public function UpdateComplete($endate)
		{
				
				
				$sql = "
				update reqbook set status ='Completed' where  enddate <= :endate and status ='Checked-In'
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':endate' => $endate));
				
				
		}
		
}
?>