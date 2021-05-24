<?php
namespace App\Model;

use App\Database\Db;

class User extends Db {

	public function getAllUsers($filters=[]) {

		$sql = "
			SELECT
				*
			FROM 
				user
		";

		$stmt = $this->pdo->query($sql); // คิวรี่ใส่ตัวแปร stmt เป็น array
		$data = $stmt->fetchAll(); //ดึงข้อมูลออกมาทั้งหมด
		return $data;
	}

}
?>