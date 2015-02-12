<?php
/**
 * Com
 *
 * @author      Jasper van Rijbroek <jasper@moyoweb.nl>
 * @category    Nooku
 * @package     CTA Components
 * @subpackage  Com_Tenders
 */

defined('KOOWA') or die('Protected Resource'); ?>

<?= @helper('behavior.mootools'); ?>
<?= @helper('behavior.modal'); ?>

<?= @helper('behavior.keepalive'); ?>
<?= @helper('behavior.validator'); ?>

<script src="media://lib_koowa/js/koowa.js" />

<form action="" class="form-horizontal -koowa-form" method="post">
    <div class="row-fluid">
        <div class="span8">
            <fieldset>
                <legend><?= @text('CONTENT'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('TITLE'); ?></label>
                    <div class="controls">
                        <input class="span12 required" type="text" name="title" value="<?= @escape($tender->title); ?>" placeholder="<?= @text('TITLE'); ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('SUBTITLE'); ?></label>
                    <div class="controls">
                        <input class="span12" type="text" name="subtitle" value="<?= @escape($tender->subtitle); ?>" placeholder="<?= @text('SUBTITLE'); ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('SLUG'); ?></label>
                    <div class="controls">
                        <input class="span12" type="text" name="slug" value="<?= $tender->slug; ?>" placeholder="<?= @text('SLUG'); ?>" />
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend><?= @text('FIELDSET'); ?></legend>
                <?= @service('com://admin/cck.controller.element')->cck_fieldset_id($tender->cck_fieldset_id)->row($tender->id)->table('tenders_tenders')->getView()->assign('row', $tender)->layout('list')->display(); ?>
            </fieldset>
        </div>
        <div class="span4">
            <fieldset>
                <legend><?= @text('DETAILS'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('START_PUBLISHING'); ?></label>
                    <div class="controls">
                        <?= @helper('behavior.calendar', array('date' => $tender->publish_up === '0000-00-00' ? date('Y-m-d') : $tender->publish_up, 'name' => 'publish_up', 'format'  => '%Y-%m-%d')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('END_PUBLISHING'); ?></label>
                    <div class="controls">
                        <?= @helper('behavior.calendar', array('date' => $tender->publish_down, 'name' => 'publish_down', 'format'  => '%Y-%m-%d')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('Translated'); ?></label>
                    <div class="controls">
                        <?= @helper('select.booleanlist', array('name' => 'translated', 'selected' => $tender->translated)); ?>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend><?= @text('META'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('DESCRIPTION'); ?></label>
                    <div class="controls">
                        <textarea name="meta_description"><?= $tender->meta_description; ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('KEYWORDS'); ?></label>
                    <div class="controls">
                        <textarea name="meta_keywords"><?= $tender->meta_keywords; ?></textarea>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend><?= @text('RELATIONS'); ?></legend>
                <div class="control-group">
                    <label class="control-label"><?= @text('CATEGORIES'); ?></label>

                    <pre>
                        <? print_r($tender->categories); ?>
                    </pre>

                    <div class="controls">
                        <?= @helper('com://admin/makundi.template.helper.listbox.categories', array(
                            'deselect' => true,
                            'check_access' => true,
                            'name' => 'categories[]',
                            'attribs' => array('id' => 'parent_id', 'multiple' => true),
                            'selected' => null,
                            'filter' => array('type' => 'category')
                        )); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= @text('REGIONS'); ?></label>
                    <div class="controls">
                        <?= @helper('com://admin/taxonomy.template.helper.listbox.taxonomies', array(
                            'identifier' => 'com://admin/regions.model.regions',
                            'name' => 'regions[]',
                            'attribs' => array('multiple' => true, 'size' => 10),
                            'type' => 'region',
                            'relation' => 'ancestors'
                        )); ?>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</form>