<?php

class Paginator extends Database{
	
	private $prevPage = '';
	private $nextPage = '';
	private $currentPage;
	private $limit;
	private $offset;
	private $table;
	public $content;
	private $total;

	public function __construct($table, $limit) {

		parent::__construct();
		$this->table = $table;
		$this->limit = $limit;
		$this->offset = 0;

		$this->getContent();
		$this->getTotal();

	}

	private function getContent() {

		if (isset($_GET['page'])) {

			$this->currentPage = $_GET['page'];

			$this->offset = ($this->currentPage - 1) * $this->limit;
			
		} else {

			$this->currentPage = 1;

			$this->offset = 0;
		}
		
		$sql = "SELECT * FROM $this->table LIMIT $this->limit OFFSET $this->offset";

		$this->content = $this->all($sql);

		return $this;
	}

	public function links() {

		if (isset($_GET['page']) && $_GET['page'] > 1) {

			$this->prevPage = '<a href="?page='.($this->currentPage - 1).'">prev</a>';

		} else {
			$this->prevPage = '<a href="" disabled>prev</a>';
		}

		if (isset($_GET['page'])) {
			
			if (($_GET['page'] + 1) * $this->limit < $this->total[0] + $this->limit ) {
			
				$this->nextPage = '<a href="?page='.($this->currentPage + 1).'">next</a>';
			
			} else {

				$this->nextPage = '<a href="" disabled>next</a>';
			}

		} else {

			$this->nextPage = '<a href="?page=2">next</a>';
		}

		return $this->prevPage.'<a href="" disabled>'.$this->currentPage.'</a>'.$this->nextPage; 

	}

	private function getTotal() {

		$sql = "SELECT COUNT(*) FROM $this->table";

		$this->total = $this->run($sql);

		return $this;
	}

	

}