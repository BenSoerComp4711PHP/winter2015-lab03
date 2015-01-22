<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 *
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class First extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    /**
     * The "First" label routes to this controller - see router
     */
    function index() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        // build the list of authors, to pass on to our view
        $source = $this->quotes->first();

        $authors = array('who' => $source['who'], 'what' => $source['what'], 'mug' => $source['mug']);

        $this->data = array_merge($this->data, $authors);

        $this->render();
    }

    /**
     * Image 1 routes to this controller - see router
     */
    function zzz(){
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        // build the list of authors, to pass on to our view
        $source = $this->quotes->get(1);

        $authors = array('who' => $source['who'], 'what' => $source['what'], 'mug' => $source['mug']);

        $this->data = array_merge($this->data, $authors);

        $this->render();
    }

    /**
     * Image 3 routes to this controller. Though passing another images ID to this controller will also load that page
     * . See router for URL needed to trigger this controller
     * @param $id the id of the image belonging to the page to load
     */
    function gimmie($id){
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        // build the list of authors, to pass on to our view
        $source = $this->quotes->get($id);

        $authors = array('who' => $source['who'], 'what' => $source['what'], 'mug' => $source['mug']);

        $this->data = array_merge($this->data, $authors);

        $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */