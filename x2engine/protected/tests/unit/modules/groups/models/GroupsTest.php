<?php
/*****************************************************************************************
 * X2Engine Open Source Edition is a customer relationship management program developed by
 * X2Engine, Inc. Copyright (C) 2011-2014 X2Engine Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY X2ENGINE, X2ENGINE DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact X2Engine, Inc. P.O. Box 66752, Scotts Valley,
 * California 95067, USA. or at email address contact@x2engine.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * X2Engine" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by X2Engine".
 *****************************************************************************************/


Yii::import('application.models.*');
Yii::import('application.modules.groups.models.*');
Yii::import('application.modules.users.models.*');
Yii::import('application.components.*');
Yii::import('application.components.permissions.*');
Yii::import('application.components.util.*');

/**
 *
 * @package application.tests.unit.components
 */
class GroupTest extends CDbTestCase {

    const VERBOSE = 0;

    public $fixtures = array (
        'users' => 'User',
        'groups' => array ('Groups', '_1'),
        'groupToUser' => array ('GroupToUser', '_2'),
        'session' => array('Session','_2'),
    );

    /**
     * Ensures that all users accessed via the users relation belong to the group 
     */
    public function testUsersRelation () {
        foreach ($this->groups as $key => $val) {
            $groupModel = Groups::model ()->findByAttributes ($val);
            $userIds = array_map (function ($a) { return $a['id']; }, $groupModel->users);

            if(self::VERBOSE) {
                print ($groupModel->id."\n");
                print_r ($userIds);
            }
            
            /*
            For each user, ensure that there is a corresponding groupToUser entry
            */
            foreach ($userIds as $uid) {
                $found = false;
                foreach ($this->groupToUser as $key => $val) {
                     if ($val['groupId'] == $groupModel->id && $val['userId'] == $uid) {
                        $found = true;
                     }
                }
                $this->assertTrue ($found);
            }
        }
    }

    public function testHasOnlineUsers () {
        // Group 3 should have no online users.
        $this->assertFalse($this->groups('group3')->hasOnlineUsers ());

        // Group 1 should have online users.
        $this->assertTrue ($this->groups('group1')->hasOnlineUsers ());

    }

}

?>
