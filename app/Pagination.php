<?php namespace App;

use Landish\Pagination\Simple\Pagination as BasePagination;

class Pagination extends BasePagination {

    /**
     * Pagination wrapper HTML.
     *
     * @var string
     */
    protected $paginationWrapper = '<div layout="row" layout-align="space-between end">%s %s %s</div>';

    /**
     * Available page wrapper HTML.
     *
     * @var string
     */
    protected $availablePageWrapper = '<a href="%s">%s</a>';

    /**
     * Get active page wrapper HTML.
     *
     * @var string
     */
    protected $activePageWrapper = '<span id="active">%s</span>';//'<li class="active"><span>%s</span></li>';

    /**
     * Get disabled page wrapper HTML.
     *
     * @var string
     */
    protected $disabledPageWrapper = '<span id="disabled">%s</span>';

    /**
     * Previous button text.
     *
     * @var string
     */
    protected $previousButtonText = '<md-button class="md-accent md-hue-1 md-fab" ng-click="">
                                    &laquo;
                                </md-button>';

    /**
     * Next button text.
     *
     * @var string
     */
    protected $nextButtonText = '<md-button class="md-accent md-hue-1 md-fab" ng-click="">
                                    &raquo;
                                </md-button>';

}
