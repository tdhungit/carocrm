<?php
/**
 * Created YouAddOn Team.
 * Website www.youaddon.com
 * User: jacky@youaddon.com
 * Mail: support@youaddon.com
 * Yahoo/Skype: youaddon
 * Date: 11/20/13
 * Time: 4:47 PM
 * File SugarFieldUa_photo.php.
 */

require_once('include/SugarFields/Fields/Base/SugarFieldBase.php');

class SugarFieldPhoto extends SugarFieldBase
{
    public function fetch($path)
    {
        $additional = '';
        if(!$this->hasButton && !empty($this->button))
        {
            $additional .= '<input type="button" class="button" ' . $this->button . '>';
        }

        if(!empty($this->buttons))
        {
            foreach($this->buttons as $v)
            {
                $additional .= ' <input type="button" class="button" ' . $v . '>';
            }

        }

        if(!empty($this->image))
        {
            $additional .= ' <img ' . $this->image . '>';
        }

        global $sugar_config;
        $site_url = $sugar_config['site_url'];
        $link_photo = $site_url . '/cache/images/';// . $sugar_config['upload_dir'];

        $this->ss->assign('SITE_URL', $site_url);
        $this->ss->assign('PHOTO_URL', $link_photo);

        return $this->ss->fetch($path) . $additional;
    }
}