<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;

/**
 * Page Entity
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $body
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Page extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _setUrl($url)
    {
        $url = Text::slug($url);
        if (empty($url)) {
            $url = Text::slug($this->_properties['title']);
        }
        return $url;
    }

    protected function _getTitle($title)
    {
        $title = strtolower($title);
        return ucwords($title);
    }

    protected function _getTitleUrl()
    {
        return $this->_properties['title'] . ' - ' . $this->_properties['url'];
    }
}
