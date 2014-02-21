<?php
/**
 * Com
 *
 * @author      Jasper van Rijbroek <jasper@moyoweb.nl>
 * @category    Nooku
 * @package     
 * @subpackage  
 */
 
defined('KOOWA') or die('Protected Resource');

class ComTendersModelTenders extends ComDefaultModelDefault
{
    protected function _buildQueryJoins(KDatabaseQuery $query)
    {
        $state = $this->_state;

        parent::_buildQueryJoins($query);

        if ($state->sort) {
            $query->join('INNER', '#__cck_values AS cck', 'cck.cck_fieldset_id = tbl.cck_fieldset_id AND cck.row = tbl.tenders_tender_id AND cck.table = LOWER(\'' . strtoupper($this->getTable()->getName()) . '\')');
        }

    }

    protected function _buildQueryOrder(KDatabaseQuery $query)
    {
        $state = $this->_state;
        $direction  = strtoupper($this->_state->direction);
        $element = $this->getService('com://admin/cck.model.elements')->slug(str_replace('_', '-', $state->sort))->getItem();

        if($state->sort)
        {
            $query->order('cck.cck_element_id = '. $element->id, null);
            $query->order('cck.value', $direction);
        }
    }

//    public function _buildQueryLimit(KDatabaseQuery $query)
//    {
//        $state = $this->_state;
//
//        parent::_buildQueryLimit($query);
//
//        if($state->sort)
//        {
//            $query->limit(0, 0);
//        }
//    }
}