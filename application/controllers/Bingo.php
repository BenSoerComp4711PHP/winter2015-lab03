<?php

/**
 * Our homepage. Show a table of all the author pictures. Clicking on one should show their quote.
 * Our quotes model has been autoloaded, because we use it everywhere.
 *
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Bingo extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    /**
     * Image 5 links to this controller - see router
     */
    function index() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        // build the list of authors, to pass on to our view
        $source = $this->quotes->get(5);

        $authors = array('who' => $source['who'], 'what' => $source['what'], 'mug' => $source['mug']);

        $this->data = array_merge($this->data, $authors);

        $this->render();
    }

    /**
     * Image 6 links to this controller - see router
     */
    function wisdom(){
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        // build the list of authors, to pass on to our view
        $source = $this->quotes->get(6);

        $authors = array('who' => $source['who'], 'what' => $source['what'], 'mug' => $source['mug']);

        $this->data = array_merge($this->data, $authors);

        $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */