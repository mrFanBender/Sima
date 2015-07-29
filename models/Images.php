<?php
	namespace app\models;

	use yii\db\ActiveRecord;

	class Images extends ActiveRecord
	{
	    const STATUS_ACTIVE = 'active';
	    const STATUS_DELETED = 'deleted';

	    public $likes;
	    public $ilike;
	    
	    /**
	     * @return string the name of the table associated with this ActiveRecord class.
	     */
	    public static function tableName()
	    {
	        return 'images';
	    }

	    public static function getLikes($image_id=0)
	    {
	    	if($image_id)
	    	{
	    		$query = (new \yii\db\Query())
	    				->select(['imageslikes.user_id AS user_id', 'imageslikes.image_id AS image_id', 'user.username AS username'])
	    				->from('imageslikes')
	    				->innerJoin('user', 'user.id = imageslikes.user_id')
	    				->where(['image_id'=>$image_id]);
	    		$result = $query->all();
	    		return $result;
	    	}
	    	else
	    	{
	    		return false;
	    	}
	    }
	}
?>