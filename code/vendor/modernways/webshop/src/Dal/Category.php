<?php
/* modernways.be
 * created by an orm apart
 * Entreprise de modes et de manières modernes
 * Dal for Category app
 * Created on Saturday 23rd of January 2016 04:54:35 PM
 * FileName: modernways/webshop/src/Dal/Category.php
*/
namespace ModernWays\Webshop\Dal;
class Category extends \ModernWays\AnOrmApart\Dal
{
    public function __construct(\ModernWays\Webshop\Model\Category $model,
                                \ModernWays\AnOrmApart\Provider $provider)
    {
        $this->model = $model;
        parent::__construct($provider);
    }
}
