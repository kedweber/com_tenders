<?php
/**
 * Com
 *
 * @author      Jasper van Rijbroek <jasper@moyoweb.nl>
 * @category    Nooku
 * @package     CTA Components
 * @subpackage  Com_Tenders
 */
 
defined('KOOWA') or die('Protected Resource');

class ComTendersDatabaseTableTenders extends KDatabaseTableDefault
{
    public function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
                'lockable',
                'creatable',
                'modifiable',
                'sluggable',
                'com://admin/cck.database.behavior.elementable',
                'com://admin/taxonomy.database.behavior.relationable',
                'com://admin/translations.database.behavior.translatable',
            )
        ));

        parent::_initialize($config);
    }
}