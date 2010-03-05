<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Pdf
 * @subpackage Destination
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * Destination array: [page /Fit]
 *
 * Display the page designated by page, with its contents magnified just enough
 * to fit the entire page within the window both horizontally and vertically. If
 * the required horizontal and vertical magnification factors are different, use
 * the smaller of the two, centering the page within the window in the other
 * dimension.
 *
 * @uses       Zend_Pdf_Destination
 * @uses       Zend_Pdf_Element
 * @uses       Zend_Pdf_Element_String
 * @uses       Zend_Pdf_Exception
 * @package    Zend_Pdf
 * @subpackage Destination
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Pdf_Destination_Named extends Zend_Pdf_Destination
{
    /**
     * Destination name
     *
     * @var Zend_Pdf_Element_Name|Zend_Pdf_Element_String
     */
    protected $_nameElement;

    /**
     * Named destination object constructor
     *
     * @param $resource
     * @throws Zend_Pdf_Exception
     */
    public function __construct(Zend_Pdf_Element $resource)
    {
        if ($resource->getType() != Zend_Pdf_Element::TYPE_NAME  &&  $resource->getType() != Zend_Pdf_Element::TYPE_STRING) {
            throw new Zend_Pdf_Exception('Named destination resource must be a PDF name or a PDF string.');
        }

        $this->_nameElement = $resource;
    }

    /**
     * Create named destination object
     *
     * @param string $name
     * @return Zend_Pdf_Destination_Named
     */
    public static function create($name)
    {
        return new self(new Zend_Pdf_Element_String($name));
    }

    /**
     * Get name
     *
     * @return Zend_Pdf_Element
     */
    public function getName()
    {
        return $this->_nameElement->value;
    }

    /**
     * Get resource
     *
     * @internal
     * @return Zend_Pdf_Element
     */
    public function getResource()
    {
        return $this->_nameElement;
    }
}
