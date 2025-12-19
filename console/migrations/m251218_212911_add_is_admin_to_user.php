<?php

use yii\db\Migration;

class m251218_212911_add_is_admin_to_user extends Migration
{


    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'is_admin', $this->smallInteger()->defaultValue(0)->after('status'));

        // Optional: Make the first user (id=1) admin
        $this->update('user', ['is_admin' => 1], ['id' => 1]);
    }

    public function safeDown()
    {
        $this->dropColumn('user', 'is_admin');
    }
}
