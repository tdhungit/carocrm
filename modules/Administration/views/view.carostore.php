<?php
/**
 * Created by Carobiz.
 * User: jacky
 * Date: 6/17/2015
 * Time: 3:23 PM
 */

class ViewCaroStore extends SugarView
{
    public function display()
    {
        $this->ss->display('modules/Administration/templates/CaroStore.tpl');
    }
}