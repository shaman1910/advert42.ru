<?php

use yii\db\Migration;

class m170819_174441_create_advert extends Migration
{
    public function safeUp()
    {
            $this->createTable('advert', [
                'id' => $this->primaryKey(),
                'title'=>$this->string(),
                'description'=>$this->text(),
                'content'=>$this->text(),
                'date'=>$this->date(),
                'image'=>$this->string(),
                'viewed'=>$this->integer(),
                'user_id'=>$this->integer(),
                'status'=>$this->integer(),
                'category_id'=>$this->integer(),
            ]);
    }

    public function safeDown()
    {
        echo "m170819_174441_create_advert cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170819_174441_create_advert cannot be reverted.\n";

        return false;
    }
    */
}
