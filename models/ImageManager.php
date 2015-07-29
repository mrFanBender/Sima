<?php
	namespace app\models;

	use yii\base\Model;

	class ImageManager extends Model
	{
		private $images = [];

		public function getImages()
		{
			if(!$this->images)
			{
				$this->refreshImages();
			}
			return $this->images;
		}

		public function refreshImages()
		{

			$this->images = Images::find()->all();
			$this->getLikes();
			return $this->images;
		}

		public static function saveImage($src)
		{
		  $image = new Images();
                $image->src = $src;
	         if($image->save()){
	         	return true;
	         }
	         return false;
		}

		public static function setLike($image_id){
			$imagelike = new ImagesLikes();
			$imagelike->user_id = \Yii::$app->user->getId();
			$imagelike->image_id = $image_id;
			$imagelike->save();
		}

		private function getLikes()
		{
			foreach($this->images as &$image){
				$image['likes'] = Images::getLikes($image['id']);
				$image['ilike'] = false;
				foreach ($image['likes'] as $like) {
					if($like['user_id']==\Yii::$app->user->getId()){
						$image['ilike'] = true;
						break;
					}
				}
			}
		}

	}
?>