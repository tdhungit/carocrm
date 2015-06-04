<?php
/**
 * Created by YouAddOn Team.
 * User: hungtd
 * Date: 3/19/14
 * Time: 3:24 PM
 */

/**
 * @param array $parentFieldArray
 * @param string $label_name
 * @param string $value
 * @param string $displayType
 * @return array
 */
function get_product_categories($parentFieldArray = array(), $label_name = '', $value = '', $displayType = '')
{
    /* @var $db DBManager */
    global $db;
    $query = "SELECT id, name FROM ua_productcategories WHERE deleted = 0";

    if (in_array($displayType, array('DetailView', 'ListView')))
    {
        $query .= " AND id = '$value'";
        $row = $db->fetchByAssoc($db->query($query));
        if ($row)
        {
            return $row['name'];
        }
        return '';
    }

    $categories = array();
    $result = $db->query($query);
    while ($row = $db->fetchByAssoc($result))
    {
        $categories[$row['id']] = $row['name'];
    }
    return $categories;
}

function get_manufactures($parentFieldArray = array(), $label_name = '', $value = '', $displayType = '')
{
    /* @var $db DBManager */
    global $db;
    $query = "SELECT id, name FROM ua_manufacturers WHERE deleted = 0";

    if (in_array($displayType, array('DetailView', 'ListView')))
    {
        $query .= " AND id = '$value'";
        $row = $db->fetchByAssoc($db->query($query));
        if ($row)
        {
            return $row['name'];
        }
        return '';
    }

    $manufacturers = array();
    $result = $db->query($query);
    while ($row = $db->fetchByAssoc($result))
    {
        $manufacturers[$row['id']] = $row['name'];
    }
    return $manufacturers;
}

function get_product_categories_array()
{
    /* @var $db DBManager */
    global $db;
    $query = "SELECT id, name FROM ua_productcategories WHERE deleted = 0";
    $categories = array();
    $result = $db->query($query);
    while ($row = $db->fetchByAssoc($result))
    {
        $categories[$row['id']] = $row['name'];
    }
    return $categories;
}

function get_manufactures_array()
{
    /* @var $db DBManager */
    global $db;
    $query = "SELECT id, name FROM ua_manufacturers WHERE deleted = 0";
    $manufacturers = array();
    $result = $db->query($query);
    while ($row = $db->fetchByAssoc($result))
    {
        $manufacturers[$row['id']] = $row['name'];
    }
    return $manufacturers;
}