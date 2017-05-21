<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TocController extends Controller
{
        var $project;
        var $sql;
        var $nodes;
        var $loopTrap;
        var $jSON;

        public function setProject($project) {
                $this->project = $project;
                $this->SQL = "";
                $this->loopTrap = 0;
                $this->nodes = $this->addChildNodes($project);
                $this->nodes = substr($this->nodes,0,-1);
                //never did understand why this next bit was necessary nor how it works...!
                //if ( strpos($this->nodes, $project) === 0 || strlen($this->nodes) > 3 ) { 
                //} else {
                        $this->nodes = $project . "," . $this->nodes;
                //}
                $this->nodes = rtrim($this->nodes, ",");
                $this->setSQL("SELECT ID, Parent_ID, Level_ID, ifnull(Indexing,'N/A') as Indexing, Header, Content, SortOrder, Finalised FROM tContent WHERE ID in ({$this->nodes})");
        }

        public function getJSON() {
                //this->setSQL($this->sql);
                $this->query();
                //$out = '{ "id" : "' . $this->project . '", "parent" : "#", "text" : "PROJECT"}, ';
                $out = '{ "id" : "1", "parent" : "#", "text" : "PROJECTS"}, ';
                foreach ($this->data as $row){
                        $out .= '{ "id" : "' . $row[0] . '", "parent" : "' . $row[1] . '", "text" : "' . $row[3] . ' ' . $row[4] . '"}, ';
                }
                $this->jSON = '[ ' . $out . ']';
        }

        public function ordered_query() {
                $this->numRows = 0;
                $myNodes = explode (",",$this->nodes);
                foreach ($myNodes as $n) {
                        //execute the SQL query and return records
                        //$this->result = mssql_query($this->SQL);
                        $sql = "SELECT ID, Parent_ID, ifnull(Level_ID,10) as Level_ID, ifnull(Indexing,'') as Indexing, Header, Content, SortOrder FROM tContent WHERE ID = " . $n;
                        $this->setSQL($sql);
                        $this->result = mysql_query($sql)
                        or die("<pre>Query failed:\n".$this->SQL."\n\n".mysql_error()."</pre>");

                        $this->numRows++;
                        $this->numFields = mysql_num_fields($this->result);

                        $row = mysql_fetch_row($this->result);
                        $this->data[] = $this->utf8_encode_all($row);
     }

       
}
 private function addChildNodes($startNodes) {
                $this->loopTrap++;
                if ($this->loopTrap > 10000) {
                        echo 'crashed while building tree list after 50000 itterations with ' . $startNodes;
                }
                $childNodes = '';
                $dt = new DataProvider();
                $sql = "SELECT ID FROM tContent WHERE Parent_ID in ({$startNodes}) ORDER BY SortOrder";
                $dt->setSQL($sql);
                $dt->query();
                if ($dt->numRows > 0) {
                        foreach($dt->data as $row){
                                $childNodes .= $row[0] . ',';
                                $childNodes .= $this->addChildNodes($row[0]);
                        }
                }
                return($childNodes);
        }
}
