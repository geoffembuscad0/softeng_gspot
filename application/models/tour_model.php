<?php
class Tour_model extends CI_Model {
	public function get_tourist_spots($keyword = null, $type = 'ALL'){
		$sql = "SELECT ts.*,d.*,r.*, 
		(SELECT AVG(tourist_spot_review.`rank`) FROM tourist_spot_review) AS avg_score 
		FROM tourist_spot ts 
		JOIN destinations d ON ts.destination_no = d.`destination_no` 
		JOIN regions r ON d.region_no = r.`region_no`";
		
		if($type == 'REGION'){
			$sql .= " WHERE r.region_no = '".$keyword."'";
		} else if($type == 'NAVIGATE'){
			if($keyword == 'top_one'){ // top reviewed and visited
				$sql .= " WHERE ts.visits = (SELECT MAX(ts.visits) FROM tourist_spot ts)";
				$sql .= " HAVING avg_score = (SELECT AVG(rank) FROM tourist_spot_review) ";
			} else if($keyword == 'most_visited'){ // most visited
				$sql .= " WHERE ts.visits = (SELECT MAX(ts.visits) FROM tourist_spot ts)";
			} else if($keyword == 'most_nearby'){ // nearby
				$sql .= "";
			}
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_tourist_information($place){
		$sql = "SELECT ts.*,d.*,r.* FROM tourist_spot ts 
		JOIN destinations d ON d.`destination_no` = ts.`destination_no` 
		JOIN regions r ON r.`region_no` = d.`region_no` WHERE ts.place_no = '".$place."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_tourist_spot_reviews($place){
		$sql = "SELECT * FROM tourist_spot_review WHERe place_no = '".$place."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_avg_rate($place){
		$sql = "SELECT avg(rank) as avg_rank FROM tourist_spot_review WHERE place_no = '".$place."'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result[0]['avg_rank'];
	}
	public function get_reviews($place_no){
		$sql = "SELECT * FROM destination_review WHERE destination_no = '".$place_no."' ORDER BY date_posted DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}

