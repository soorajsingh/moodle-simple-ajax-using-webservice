<?php

require_once("$CFG->libdir/externallib.php");

class mod_testtest_external extends external_api {

    public static function loadsettings_parameters() {
        return new external_function_parameters(
            array(
                'itemid' => new external_value(PARAM_INT, 'The item id to operate on'),
            )    
        );
    }

    public static function loadsettings_returns() {
        return new external_multiple_structure(
            new external_single_structure(
                array(
                    'content' => new external_value(PARAM_RAW, 'settings content text'),
                )
            )
        );
    }
        
    public static function loadsettings($itemid) {
        global $DB;
        //$params = self::validate_parameters(self::getExample_parameters(), array());
        $params = self::validate_parameters(self::loadsettings_parameters(), 
                array('itemid'=>$itemid));

        $sql = 'SELECT content FROM {testtest} WHERE id = ?';
        $paramsDB = $params; //array($itemid);
        $db_result = $DB->get_records_sql($sql,$paramsDB);
        
        return $db_result;
    }
    
    public static function updatesettings_parameters() {
        return new external_function_parameters(
                
            array(
                'itemid' => new external_value(PARAM_INT, 'The item id to operate on'),
                'data2update' => new external_value(PARAM_TEXT, 'Update data'))
        );
    }

    public static function updatesettings_returns() {
        return new external_multiple_structure(
            new external_single_structure(
                array(
                    'content' => new external_value(PARAM_RAW, 'settings content text'),
                )
            )
        );
    }
        
    public static function updatesettings($itemid, $data2update) {
        global $DB;
        //$params = self::validate_parameters(self::getExample_parameters(), array());
        $params = self::validate_parameters(self::updatesettings_parameters(), 
                array('itemid'=>$itemid, 'data2update'=>$data2update));
        
        $newdata = new stdClass();
        $newdata->id = $itemid;    
        $newdata->content = $data2update;
        if ($DB->record_exists('testtest', array('id' => $itemid))) {
            $DB->update_record('testtest', $newdata); 
        }     
        
        
        $sql = 'SELECT content FROM {testtest} WHERE id = ?';
        $paramsDB = array($itemid);
        $db_result = $DB->get_records_sql($sql,$paramsDB);
 
        return $db_result;
    }    
    
}


