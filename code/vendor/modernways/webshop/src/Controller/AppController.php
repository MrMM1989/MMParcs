<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 10/02/2016
 * Time: 12:48
 */
namespace ModernWays\Webshop\Controller;

class AppController extends \ModernWays\Mvc\Controller
{
    public function isAuthenticated()
    {
        $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
        $model = new \ModernWays\Identity\Model\User($this->noticeBoard);
        $dal = new \ModernWays\Identity\Dal\User($model, $provider);
        $authentication = new \ModernWays\Identity\Authentication($this->noticeBoard,
            new \ModernWays\Identity\Session($this->noticeBoard), $dal);
        return $authentication->isLoggedIn();
    }

    public function isAuthorized($id = 0, $roleNames = null)
    {
        $isAuthorized = false;
        $this->isAuthorized = true;
        if ($id && isset($roleNames)) {
            // get all roles
            $provider = new \ModernWays\AnOrmApart\Provider('IdentityOVH', $this->noticeBoard);
            $model = new \ModernWays\Identity\Model\Role($this->noticeBoard);
            $dal = new \ModernWays\Identity\Dal\Role($model, $provider);
            $userRoleList = $dal->reading('UserRole', 'UserRoleRoleNameSelectById', "UserId = $id", true);
            $authorizedRoles = explode(',', str_replace(' ', '', $roleNames));
            foreach ($userRoleList as $value) {
                if (in_array($value['RoleName'], $authorizedRoles)) {
                    $isAuthorized = true;
                    break;
                }
            }
        }
        if ($isAuthorized)
        {
            $this->noticeBoard->startTimeInKey('Authorization');
            $this->noticeBoard->setText('is authorized');
            $this->noticeBoard->log();
        } else {
            $this->noticeBoard->startTimeInKey('Authorization');
            $this->noticeBoard->setText('is not authorized');
            $this->noticeBoard->log();

        }
        return $isAuthorized;
    }

}