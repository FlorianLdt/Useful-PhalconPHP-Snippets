<?
namespace Library\V1\Data;

class Test
{
	public $db;

	function __construct($dbcon) 
	{
		$this->db = $dbcon;
    }

    public function deleteTest($idx)
    {
		$idx = mysql_real_escape_string($idx);
		
		$sql = "delete from test_table where idx='".$idx."'";
		return $this->db->query($sql);
    }

    public function updateTest($title, $idx)
    {
		$title = mysql_real_escape_string($title);
		$idx = mysql_real_escape_string($idx);
		
		$sql = "update test_table set title='".$title."' where idx='".$idx."'";
		return $this->db->query($sql);
    }

    public function insertTest($title)
	{
		$title = mysql_real_escape_string($title);
		
		$sql = "insert into test_table(title)
				values('".$title."')
		";
		$this->db->query($sql);
		
		$lastId = $this->db->lastInsertId();

		return $lastId;

    }
    
	public function getTestList()
	{
		$sql = "select * from test_table order by idx desc";
		$datas = $this->db->query($sql)->fetchAll();

		return $datas;
	}


}