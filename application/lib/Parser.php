<?php
/**
 * The class parses dates from sites
 */
namespace application\lib;

class Parser
{
    private $content;
    
    function __construct($url)
    {
        $this->content = file_get_contents($url);
    }

    public function getArrayData($pattern)
    {
        $data = [];
        preg_match_all($pattern, $this->content, $matches);
        foreach ($matches[0] as $value) {
            array_push($data, trim(strip_tags($value)));
        }
        return $data;
    }

    public function getArrayHtml($pattern)
    {
        $data = [];
        preg_match_all($pattern, $this->content, $matches);
        foreach ($matches[0] as $value) {
            array_push($data, trim($value, '\n|\s'));
        }
        return $data;
    }

    public function getAttribute($pattern, $attribute)
    {
        preg_match($pattern, $this->content, $matches);
        $string = htmlspecialchars($matches[0]);
        $arr = preg_split('/=/', $string);
        $result = trim($arr[count($arr) -1], "&gt;");
        $result = trim($result, "&quot;");
        
        
        return $result;
    }
}
