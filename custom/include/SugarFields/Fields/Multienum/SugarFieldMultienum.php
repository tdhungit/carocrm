<?php

require_once('custom/include/SugarFields/Fields/Enum/SugarFieldEnum.php');

class SugarFieldMultienum extends SugarFieldEnum
{
    public function setup($parentFieldArray, $vardef, $displayParams, $tabindex, $twopass = true)
    {
        if (!isset($vardef['options_list']) && isset($vardef['options']) && !is_array($vardef['options']))
        {
            $vardef['options_list'] = $GLOBALS['app_list_strings'][$vardef['options']];
        }
        return parent::setup($parentFieldArray, $vardef, $displayParams, $tabindex, $twopass);
    }

    public function getSearchViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex)
    {
        if (!empty($vardef['function']['returns']) && $vardef['function']['returns'] == 'html')
        {
            $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
            return $this->fetch($this->findTemplate('EditViewFunction'));
        }
        else
        {
            $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
            return $this->fetch($this->findTemplate('SearchView'));
        }
    }

    public function displayFromFunc($displayType, $parentFieldArray, $vardef, $displayParams, $tabindex)
    {
        if (isset($vardef['function']['returns']) && $vardef['function']['returns'] == 'html')
        {
            return parent::displayFromFunc($displayType, $parentFieldArray, $vardef, $displayParams, $tabindex);
        }

        $displayTypeFunc = 'get' . $displayType . 'Smarty';
        return $this->$displayTypeFunc($parentFieldArray, $vardef, $displayParams, $tabindex);
    }

    public function save(&$bean, $params, $field, $properties, $prefix = '')
    {
        if (isset($params[$prefix . $field]))
        {
            if ($params[$prefix . $field][0] === '' && !empty($params[$prefix . $field][1]))
            {
                unset($params[$prefix . $field][0]);
            }

            $bean->$field = encodeMultienumValue($params[$prefix . $field]);
        }
        else if (isset($params[$prefix . $field . '_multiselect']) && $params[$prefix . $field . '_multiselect'] == true)
        {
            // if the value in db is not empty and
            // if the data is not set in params (means the user has deselected everything) and
            // if the corresponding multiselect flag is true
            // then set field to ''
            if (!empty($bean->$field))
            {
                $bean->$field = '';
            }
        }
    }

    /**
     * @see SugarFieldBase::importSanitize()
     */
    public function importSanitize(
        $value,
        $vardef,
        $focus,
        ImportFieldSanitize $settings
    )
    {
        if (!empty($value) && is_array($value))
        {
            $enum_list = $value;
        }
        else
        {
            // If someone was using the old style multienum import technique
            $value = str_replace("^", "", $value);

            // We will need to break it apart to put test it.
            $enum_list = explode(",", $value);
        }
        // parse to see if all the values given are valid
        foreach ($enum_list as $key => $enum_value)
        {
            $enum_list[$key] = $enum_value = trim($enum_value);
            $sanitizedValue = parent::importSanitize($enum_value, $vardef, $focus, $settings);
            if ($sanitizedValue === false)
            {
                return false;
            }
            else
            {
                $enum_list[$key] = $sanitizedValue;
            }
        }
        $value = encodeMultienumValue($enum_list);

        return $value;
    }
}
