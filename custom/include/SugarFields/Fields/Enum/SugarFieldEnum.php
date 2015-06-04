<?php

require_once('include/SugarFields/Fields/Base/SugarFieldBase.php');

class SugarFieldEnum extends SugarFieldBase
{

    public function getDetailViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex)
    {
        if (!empty($vardef['function']['returns']) && $vardef['function']['returns'] == 'html')
        {
            $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
            return "<span id='{$vardef['name']}'>" . $this->fetch($this->findTemplate('DetailViewFunction')) . "</span>";
        }
        else
        {
            return parent::getDetailViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex);
        }
    }

    public function getEditViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex)
    {

        if (empty($displayParams['size']))
        {
            $displayParams['size'] = 6;
        }

        if (isset($vardef['function']) && !empty($vardef['function']['returns']) && $vardef['function']['returns'] == 'html')
        {
            $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
            return $this->fetch($this->findTemplate('EditViewFunction'));
        }
        else
        {
            return parent::getEditViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex);
        }
    }

    public function getSearchViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex)
    {

        if (empty($displayParams['size']))
        {
            $displayParams['size'] = 6;
        }

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
        if ((isset($vardef['function']['returns']) && $vardef['function']['returns'] == 'html')
            || (in_array($displayType, array('DetailView', 'ListView')) && isset($vardef['function']['onListView']) && $vardef['function']['onListView'] == true)
        )
        {
            return parent::displayFromFunc($displayType, $parentFieldArray, $vardef, $displayParams, $tabindex);
        }

        $displayTypeFunc = 'get' . $displayType . 'Smarty';
        return $this->$displayTypeFunc($parentFieldArray, $vardef, $displayParams, $tabindex);
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
        global $app_list_strings;

        // Bug 27467 - Trim the value given
        $value = trim($value);

        if (isset($app_list_strings[$vardef['options']])
            && !isset($app_list_strings[$vardef['options']][$value])
        )
        {
            // Bug 23485/23198 - Check to see if the value passed matches the display value
            if (in_array($value, $app_list_strings[$vardef['options']]))
            {
                $value = array_search($value, $app_list_strings[$vardef['options']]);
            }
            // Bug 33328 - Check for a matching key in a different case
            elseif (in_array(strtolower($value), array_keys(array_change_key_case($app_list_strings[$vardef['options']]))))
            {
                foreach ($app_list_strings[$vardef['options']] as $optionkey => $optionvalue)
                {
                    if (strtolower($value) == strtolower($optionkey))
                    {
                        $value = $optionkey;
                    }
                }
            }
            // Bug 33328 - Check for a matching value in a different case
            elseif (in_array(strtolower($value), array_map('strtolower', $app_list_strings[$vardef['options']])))
            {
                foreach ($app_list_strings[$vardef['options']] as $optionkey => $optionvalue)
                {
                    if (strtolower($value) == strtolower($optionvalue))
                    {
                        $value = $optionkey;
                    }
                }
            }
            else
            {
                return false;
            }
        }

        return $value;
    }

    public function formatField($rawField, $vardef)
    {
        global $app_list_strings;

        if (!empty($vardef['options']))
        {
            $option_array_name = $vardef['options'];

            if (!empty($app_list_strings[$option_array_name][$rawField]))
            {
                return $app_list_strings[$option_array_name][$rawField];
            }
            else
            {
                return $rawField;
            }
        }
        else
        {
            return $rawField;
        }
    }
}