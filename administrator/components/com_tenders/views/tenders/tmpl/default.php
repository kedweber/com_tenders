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

<div class="row-fluid">
    <form action="" method="get" class="-koowa-grid" data-toolbar=".toolbar-list">
        <div class="btn-toolbar" id="filter-bar">
            <div class="filter-search btn-group pull-left">
                <input type="text" value="<?= $state->search; ?>" placeholder="Search" id="filter_search" name="search">
            </div>
            <div class="btn-group pull-left hidden-phone">
                <button title="" class="btn hasTooltip" type="submit" data-original-title="Search"><i class="icon-search"></i></button>
                <button onclick="document.id('filter_search').value='';this.form.submit();" title="" class="btn hasTooltip" type="button" data-original-title="Clear"><i class="icon-remove"></i></button>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align: center;" width="1">
                        <?= @helper('grid.checkall'); ?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'title')); ?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'reference')); ?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'status')); ?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'tender_type')); ?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'geographical_zone')); ?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'programme')); ?>
                    </th>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'publishing_date')); ?>
                    </th>
                    <? if($tenders->isTranslatable()) : ?>
                        <th>
                            <?= @text('Translations') ?>
                        </th>
                    <? endif; ?>
                    <th>
                        <?= @helper('grid.sort', array('column' => 'updated_on')); ?>
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="10"><?= @helper('paginator.pagination', array('total' => $total)); ?></td>
                </tr>
            </tfoot>
            <tbody>
                <? foreach($tenders as $tender) : ?>
                    <? if($tender->isElementable()) : ?>
                        <tr>
                            <td><?= @helper('grid.checkbox', array('row' => $tender)); ?></td>
                            <td><a href="<?= @route('view=tender&id='. $tender->id); ?>"><?= $tender->title; ?></a></td>
                            <td><?= $tender->reference; ?></td>
                            <td><?= $tender->status; ?></td>
                            <td><?= $tender->tender_type; ?></td>
                            <td><?= $tender->geographical_zone; ?></td>
                            <td><?= $tender->programme; ?></td>
                            <td><?= $tender->publishing_date; ?></td>
                            <? if($tender->isTranslatable()) : ?>
                                <td>
                                    <?= @helper('com://admin/translations.template.helper.language.translations', array(
                                        'row' => $tender->id,
                                        'table' => $tender->getTable()->getName()
                                    )); ?>
                                </td>
                            <? endif; ?>
                            <td><?= $tender->modified_on; ?></td>
                        </tr>
                    <? endif; ?>
                <? endforeach; ?>

                <? if(count($tender) <= 0) : ?>
                    <tr>
                        <td colspan="10"><?= @text('No tenders found'); ?>.</td>
                    </tr>
                <? endif; ?>
            </tbody>
        </table>
    </form>
</div>