<?php
if(!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}
class QA_List_Table extends WP_List_Table {

    /**
     * Constructor, we override the parent to pass our own arguments
     * We usually focus on three parameters: singular and plural labels, as well as whether the class supports AJAX.
     */
    function __construct() {
        parent::__construct( array(
            'singular'=> 'qa', //Singular label
            'plural' => 'qa_list', //plural label, also this well be one of the table css class
            'ajax'   => false //We won't support Ajax for this table
        ) );
    }

    /**
     * Add extra markup in the toolbars before or after the list
     * @param string $which, helps you decide if you add the markup after (bottom) or before (top) the list
     */
    function extra_tablenav( $which ) {
        if ( $which == "top" ){
            //The code that goes before the table is here
            echo "Hello, I'm before the table";
        }
        if ( $which == "bottom" ){
            //The code that goes after the table is there
            echo "Hi, I'm after the table";
        }
    }

    /**
     * Define the columns that are going to be used in the table
     * @return array $columns, the array of columns to use with the table
     */
    function get_columns() {
        return array(
            'col_qa_id'=>__('ID'),
            'col_qa_question'=>__('Question'),
            'col_qa_answer'=>__('Answer'),
            'col_qa_actions'=>__('Actions'),
        );
    }

    /**
     * Decide which columns to activate the sorting functionality on
     * @return array $sortable, the array of columns that can be sorted by the user
     */
    public function get_sortable_columns() {
        return $sortable = array(
            'col_qa_id'=>'ID',
            'col_qa_question'=>'post_title',
            'col_qa_answer'=>'post_content',
        );
    }

    public function get_hidden_columns(){
        return array();
    }

    public function column_default( $item, $column_name )
    {
        switch( $column_name ) {
            case 'col_qa_id':
                return $item->ID;
            case 'col_qa_question':
                return "<div>" . $item->post_title . "</div><input type='hidden' class='qa_question_value' value='" . $item->post_title . "'>";
            case 'col_qa_answer':
                return "<div>" . $item->post_content . "</div><input type='hidden' class='qa_answer_value' value='" . $item->post_content . "'>";
            case 'col_qa_actions':
                return '<a class="qa-edit" href="#">' . __('Edit','responsive') .'</a><a class="qa-delete" href="#">' . __('Delete','responsive') .'</a><a class="qa-update" href="#" style="display:none">' . __('Update','responsive') .'</a><a class="qa-cancel" href="#" style="display:none">' . __('Cancel','responsive') .'</a>';
            default:
                return $item->{$column_name};
        }
    }
    /**
     * Prepare the table with different parameters, pagination, columns and table elements
     */
    function prepare_items() {
        global $wpdb;
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();

        $perPage = 20;
        $currentPage = $this->get_pagenum();
        if(empty($currentPage) || !is_numeric($currentPage) || $currentPage<=0 ){ $currentPage=1; }
        $totalItems = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type= 'qa'");
        $offset=($currentPage-1)*$perPage;
        $totalPages = ceil($totalItems/$perPage);

        $this->set_pagination_args( array(
            "total_items" => $totalItems,
            "total_pages" => $totalPages,
            "per_page" => $perPage,
        ) );

        $this->_column_headers = array($columns, $hidden, $sortable);

        $order = !empty($_GET["order"]) ? mysql_real_escape_string($_GET["order"]) : 'ASC';
        $orderby = !empty($_GET["orderby"]) ? mysql_real_escape_string($_GET["orderby"]) : '';
        $this->items = get_posts(array(
            'numberposts' => $perPage,
            'offset' => $offset,
            'orderby' => !empty($orderby)?$orderby:'date',
            'order' => !empty($order)?$order:'DESC',
            'post_type' => 'qa',
        ));
        return;
        global $wpdb, $_wp_column_headers;
        $screen = get_current_screen();
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);

        $order = !empty($_GET["order"]) ? mysql_real_escape_string($_GET["order"]) : 'ASC';
        $orderby = !empty($_GET["orderby"]) ? mysql_real_escape_string($_GET["orderby"]) : '';

        /* -- Pagination parameters -- */
        //Number of elements in your table?
        $totalitems = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type= 'qa'");
        //How many to display per page?
        $perpage = 10;
        //Which page is this?
        $paged = !empty($_GET["paged"]) ? mysql_real_escape_string($_GET["paged"]) : '';
        //Page Number
        if(empty($paged) || !is_numeric($paged) || $paged<=0 ){ $paged=1; }
        //How many pages do we have in total?
        $totalpages = ceil($totalitems/$perpage);
        //adjust the query to take pagination into account
        if(!empty($paged) && !empty($perpage)){
            $offset=($paged-1)*$perpage;
            //$query.=' LIMIT '.(int)$offset.','.(int)$perpage;
        }else{
            $offset = 0;
        }

        /* -- Register the pagination -- */
        $this->set_pagination_args( array(
            "total_items" => $totalitems,
            "total_pages" => $totalpages,
            "per_page" => $perpage,
        ) );
        //The pagination links are automatically built according to those parameters

        /* -- Register the Columns -- */
        $columns = $this->get_columns();
        $_wp_column_headers[$screen->id]=$columns;

        /* -- Fetch the items -- */
        $this->items = get_posts(array(
            'numberposts' => $perpage,
            'offset' => $offset,
            'orderby' => !empty($orderby)?$orderby:'date',
            'order' => !empty($order)?$order:'DESC',
            'post_type' => 'qa',
        ));
    }


}