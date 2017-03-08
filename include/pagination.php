<?php 


class Pagination {

    private $current_page;
    private $per_page;
    private $total_count;
    
    function __construct($current_page=0, $per_page=15, $total_count){
        $this->current_page = $current_page;
        $this->per_page = $per_page;
        $this->total_count = $total_count;
    }
    
    public function total_pages(){
        return ceil($this->total_count / $this->per_page);
    }
    
    private function offset(){
        return ($this->current_page - 1) * $this->per_page;
    }
    
    public function next_page(){
        return $this->current_page + 1;
    }
    
    public function prev_page(){
        return $this->current_page - 1;
    }
    
    public function has_prev_page(){
        return ($this->prev_page() > 0) ? true : false;
    }
    
    public function has_next_page(){
        return ($this->next_page() <= $this->total_pages()) ? true : false;
    }
    
}






?>