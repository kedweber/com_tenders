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
        $relationable = $this->getBehavior('com://admin/taxonomy.database.behavior.relationable',
            array(
                'ancestors' => array(
                    'categories' => array(
                        'identifier' => 'com://admin/makundi.model.categories',
                        'identity_column' => 'makundi_category_id',
                        'table' => '#__makundi_categories',
                        'sort' => 'title',
                    ),
                ),
                'descendants' => array(
                    'articles' => array(
                        'identifier' => 'com://admin/articles.model.articles',
                    )
                )
            )
        );

        $config->append(array(
            'behaviors' => array(
                'lockable',
                'creatable',
                'modifiable',
                'sluggable',
                'com://admin/cck.database.behavior.elementable',
                $relationable,
                'com://admin/translations.database.behavior.translatable',
            )
        ));

        parent::_initialize($config);
    }
}