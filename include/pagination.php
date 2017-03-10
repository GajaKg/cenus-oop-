<?php 


class Pagination {

    private $current_page;
    private $per_page;
    private $total_count;
    
    function __construct($current_page=0, $per_page=15, $total_count){
        $this->current_page = (int)$current_page;
        $this->per_page = (int)$per_page;
        $this->total_count = (int)$total_count;
    }
    
    public function total_pages(){
        return ceil($this->total_count / $this->per_page);
    }
    
    public function offset(){
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
    
    // get page for highlighting current number in pagination
    public function display_pagination($get_page){
        $output = "";
        
        if ($this->total_pages() > 1){
            
            $output = "<ul class=pagination pagination-lg'>";

            if ($this->has_prev_page()){
                $output .= "<li><a href='index.php?page=".$this->prev_page()."'>&laquo;</a></li>";
            }

            for ($i=1; $i<=$this->total_pages(); $i++){
                 
                 if ($get_page == $i){
                     $output .= "<li class='active'><a href='index.php?page=".$i."'>".$i."</a></li>";
                 } else {
                     $output .= "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
                 }
            }

            if ($this->has_next_page()){
                $output .= "<li><a href='index.php?page=".$this->next_page()."'>&raquo;</a></li>";
            }
        
            $output .= "</ul>";
        }
     
        return $output;
    }
    
}






?>