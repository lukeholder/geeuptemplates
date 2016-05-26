<?php
namespace Craft;

/**
 * Product record.
 *
 * @author    Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @copyright Copyright (c) 2016, Pixel & Tonic, Inc.
 */
class DigitalProducts_LicenseRecord extends BaseRecord
{

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc BaseRecord::getTableName()
     *
     * @return string
     */
    public function getTableName()
    {
        return 'digitalproducts_licenses';
    }

    /**
     * @inheritdoc BaseRecord::defineIndexes()
     *
     * @return array
     */
    public function defineIndexes()
    {
        return [
            ['columns' => ['licenseKey'], 'unique' => true],
        ];
    }

    /**
     * @inheritdoc BaseRecord::defineRelations()
     *
     * @return array
     */
    public function defineRelations()
    {
        return [
            'element' => [
                static::BELONGS_TO,
                'ElementRecord',
                'id',
                'required' => true,
                'onDelete' => static::CASCADE
            ],
            'product' => [
                static::BELONGS_TO,
                'DigitalProducts_ProductRecord',
                'required' => true,
                'onDelete' => static::CASCADE
            ]
        ];
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc BaseRecord::defineAttributes()
     *
     * @return array
     */
    protected function defineAttributes()
    {
        return [
            'licenseKey' => [AttributeType::String, 'required' => true],
            'ownerName' => AttributeType::String,
            'ownerEmail' => [AttributeType::String],
            'enabled' => AttributeType::Bool,
            'userId' => AttributeType::Number,
            'orderId' => AttributeType::Number,
        ];
    }
}
