<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 21/01/15
 * Time: 5:42 PM
 */

/**
 * Class FontFixer is a Hook class that does alterations to do with fonts
 */
class FontFixer extends CI_Controller{

    function __construct() {
        parent::__construct();
    }

    /**
     * boldinator searches the page for <p> tags which are part of the class "lead" and then bolds any words starting
     * with a capital letter within the paragraph tags
     */
    public function boldinator(){

        //get the html
        $CI =& get_instance();
        $webpage = $CI->output->get_output();

        $searchReg = '(<p class="lead">.*<\/p>)';

        //search with the regular expression for the tag we are looking for
        preg_match($searchReg, $webpage, $matches);


        //if we do find matching tags, send them to have their text assessed for capitals in need of bolding
        if(!empty($matches)){
            $webpage = $this->boldWordsWithCapitals($matches, $webpage, $searchReg);
        }

        //return the html to the display
        $CI->output->set_output($webpage);
        $CI->output->_display();

    }

    /**
     * boldWordsWithCapitals is a helper function for boldinator. It takes the matches found with the regular expression
     * and changes all of the words with capitals to be bolded using the <strong> tag
     *
     * @param $matches - an array of all the regex matches
     * @param $webpage - the webpage the regex search was applied to
     * @param $searchReg - the regEx used to find all of the matches in the matches array
     * @return mixed - returns the website with the altered tag found by the RegEx
     */
    private function boldWordsWithCapitals($matches, $webpage, $searchReg){

        //first part is just the <p> tag so remove it. Don't have to bother with the end tag since it doesn't have a capital
        $sentence = substr($matches[0], 16);
        $arraySentence = explode(" ", $sentence);

        //search through for words starting with capitals and encase them with <strong> tags
        for($i = 0 ; $i < count($arraySentence); $i++){
            if(ctype_upper($arraySentence[$i][0])){
                $arraySentence[$i] = "<strong>" . $arraySentence[$i] . "</strong>";
            }
        }

        $fixedSentence = implode(" ", $arraySentence);
        //add back the removed lead tag
        $taggedSentence = '<p class="lead">' . $fixedSentence;
        //replace the old <p> values on the webpage with the new ones
        $new_webpage = preg_replace($searchReg , $taggedSentence ,$webpage);

        return $new_webpage;
    }
}