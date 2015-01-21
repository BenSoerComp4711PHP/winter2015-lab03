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

    function index() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        // build the list of authors, to pass on to our view
        $source = $this->quotes->first();

        $authors = array('who' => $source['who'], 'what' => $source['what'], 'mug' => $source['mug']);

        $this->data = array_merge($this->data, $authors);

        $this->render();
    }

    function zzz(){
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        // build the list of authors, to pass on to our view
        $source = $this->quotes->get(1);

        $authors = array('who' => $source['who'], 'what' => $source['what'], 'mug' => $source['mug']);

        $this->data = array_merge($this->data, $authors);

        $this->render();
    }

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