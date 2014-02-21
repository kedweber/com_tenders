<?php
/**
 * ComTenders
 *
 * @author      Jasper van Rijbroek <jasper@moyoweb.nl>
 * @category    Nooku
 * @package     CTA Components
 * @subpackage  Com_Tenders
 */
 
defined('KOOWA') or die('Protected Resource');

echo KService::get('com://admin/tenders.dispatcher')->dispatch();