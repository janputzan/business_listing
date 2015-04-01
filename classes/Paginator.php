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

		$this->getTotal();
		$this->getContent();

	}

	private function getContent() {

		if (isset($_GET['page']) && is_numeric($_GET['page'])) {

			if ($_GET['page'] > 0) {

				if (($_GET['page'] * $this->limit) > ($this->total[0] + $this->limit)) {

					$this->currentPage = round($this->total[0] / $this->limit);

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
		
		$sql = "SELECT * FROM $this->table LIMIT $this->limit OFFSET $this->offset";

		$this->content = $this->all($sql);

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

		$links = '<ul class="pagination">
    				<li class="waves-effect"><a href="'.$this->prevPage.'"><i class="mdi-navigation-chevron-left"></i></a></li>
    				<li class="active"><a href="?page='.$this->currentPage.'">'.$this->currentPage.' out of '.round($this->total[0]/$this->limit).'</a></li>
    				<li class="waves-effect"><a href="'.$this->nextPage.'"><i class="mdi-navigation-chevron-right"></i></a></li></ul>';

		return $links; 

	}

	private function getTotal() {

		$sql = "SELECT COUNT(*) FROM $this->table";

		$this->total = $this->getNumber($sql);

		return $this;
	}

	

}