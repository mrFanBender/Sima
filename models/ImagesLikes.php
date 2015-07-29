<?php
	namespace app\models;

	use yii\db\ActiveRecord;

	class Imageslikes extends ActiveRecord
	{
	    const STATUS_ACTIVE = 'active';
	    const STATUS_DELETED = 'deleted';
	    
	    /**
	     * @return string the name of the table associated with this ActiveRecord class.
	     */
	    public static function tableName()
	    {
	        return 'imageslikes';
	    }
	}
?>