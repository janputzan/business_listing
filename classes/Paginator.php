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
	private $columns;
	private $filters = array();
	private $sql;

	public function __construct($table, $limit, $columns = null) {

		parent::__construct();
		$this->table = $table;
		$this->limit = $limit;
		$this->offset = 0;

		$this->columns = $columns ?: null;

		$this->setFilters();
		$this->getTotal();
		$this->setPages();
		$this->setSql();

		$this->getContent();

	}

	private function setFilters() {

		if ($this->columns) {

			foreach ($this->columns as $column) {
				
				if (isset($_GET[$column])) {

					array_push($this->filters, array($column, $_GET[$column]));
				}
			}
		}

		return $this;
	}

	private function setPages() {

		if (isset($_GET['page']) && is_numeric($_GET['page'])) {

			if ($_GET['page'] > 0) {

				if (($_GET['page'] * $this->limit) > ($this->total[0] + $this->limit)) {

					$this->currentPage = round($this->total[0] / $this->limit) > 0 ?: 1;

				} else {

					$this->currentPage = $_GET['page'];
				}

				$this->offset = ($this->currentPage - 1) * $this->limit;

			} else {

				$this->currentPage = 1;
			}
			
		} else {

			$this->currentPage = 1;
		}


		return $this;
	}

	private function setSql() {
		
		if (count($this->filters)) {

			$sql = "SELECT * FROM $this->table WHERE ";

			for ($i = 0, $_len = count($this->filters); $i < $_len; $i++) {

				if ($i == ($_len - 1)) {

					$sql .= " ".$this->filters[$i][0]." = '".$this->filters[$i][1]."' ";
				
				} else {

					$sql .= " ".$this->filters[$i][0]." = '".$this->filters[$i][1]."' AND ";
				}
			}

			$this->sql = $sql . "LIMIT $this->limit OFFSET $this->offset";

		} else {

			$this->sql = "SELECT * FROM $this->table LIMIT $this->limit OFFSET $this->offset";
		}
		return $this;
	}

	private function getContent() {

		$this->content = $this->all($this->sql);

		return $this;
	}

	public function links() {

		if (isset($_GET['page']) && $_GET['page'] > 1) {

			$this->prevPage = '?page='.($this->currentPage - 1);

		} else {

			$this->prevPage = '#!';
		}

		if (isset($_GET['page'])) {
			
			if (($_GET['page'] + 1) * $this->limit < $this->total[0] + $this->limit ) {
			
				$this->nextPage = '?page='.($this->currentPage + 1);
			
			} else {

				$this->nextPage = '#!';
			}

		} else {

			$this->nextPage = '?page=2';
		}

		$filters = '';

		if (count($this->filters)) {

			for ($i = 0, $_len = count($this->filters); $i < $_len; $i++) {

				$filters .= '&'.$this->filters[$i][0].'='.$this->filters[$i][1];
			}

		}

		$links = '<ul class="pagination">
    				<li class="waves-effect"><a href="'.$this->prevPage.$filters.'"><i class="mdi-navigation-chevron-left"></i></a></li>
    				<li class="active"><a href="?page='.$this->currentPage.$filters.'">'.$this->currentPage.' out of '.round($this->total[0]/$this->limit).'</a></li>
    				<li class="waves-effect"><a href="'.$this->nextPage.$filters.'"><i class="mdi-navigation-chevron-right"></i></a></li></ul>';

		return $links; 

	}

	private function getTotal() {

		$sql = "SELECT COUNT(*) FROM $this->table";

		if ($this->filters) {

			$sql = "SELECT COUNT(*) FROM $this->table WHERE ";

			for ($i = 0, $_len = count($this->filters); $i < $_len; $i++) {

				if ($i == ($_len - 1)) {

					$sql .= " ".$this->filters[$i][0]." = '".$this->filters[$i][1]."' ";
				
				} else {

					$sql .= " ".$this->filters[$i][0]." = '".$this->filters[$i][1]."' AND ";
				}
			}

		} else {

			$sql = "SELECT COUNT(*) FROM $this->table";
		}

		$this->total = $this->getNumber($sql);


		return $this;
	}

	

}