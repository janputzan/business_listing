<?php

class Crop {

	public $newImage;
	public $originalImage;
	public $newWidth;
	public $newHeight;
	public $originalWidth;
	public $originalHeight;
	public $fileName;
	public $originalAspectRatio;
	public $newAspectRatio;
	public $imageType;


	public function __construct($imagePath, array $dimensions) {

		$this->imageType = exif_imagetype($imagePath);

		switch($this->imageType) {

			case '2':
				$this->originalImage = imagecreatefromjpeg($imagePath);
				break;

			case '3':
				$this->originalImage = imagecreatefrompng($imagePath);
				break;

			default:
				return false;
				break;

		}

		$this->newAspectRatio = $dimensions['width'] / $dimensions['height'];

		$this->getImageData($this->originalImage)->getDimensions($dimensions)->getFileName()->crop($dimensions);
	}

	private function getImageData() {

		$this->originalWidth = imagesx($this->originalImage);
		$this->originalHeight = imagesy($this->originalImage);

		$this->originalAspectRatio = $this->originalWidth/$this->originalHeight;

		return $this;
	}

	private function getDimensions(array $dimensions) {

		if ($this->originalAspectRatio >= $this->newAspectRatio) {

			$this->newHeight = $dimensions['height'];

			$this->newWidth = $this->originalWidth / ($this->originalHeight / $dimensions['height']);
		
		} else {

			$this->newWidth = $dimensions['width'];

			$this->newHeight = $this->originalHeight / ($this->originalWidth / $dimensions['width']);
		}

		return $this;
	}

	private function crop(array $dimensions) {

		$thumb = imagecreatetruecolor($this->newWidth, $this->newHeight);

		imagecopyresampled($thumb, $this->originalImage, 0 - ($this->newWidth - $dimensions['width']) / 2 ,
							0 - ($this->newWidth - $dimensions['width']) / 2 ,
							0, 0, $this->newWidth, $this->newHeight, $this->originalWidth, $this->originalHeight);

		switch($this->imageType) {

			case '2':
				imagejpeg($thumb, $this->fileName, 80);
				break;

			case '3':
				imagepng($thumb, $this->fileName, 9);
				break;

			default:
				return false;
				break;

		}

		$this->newImage = $thumb; 

		return $this;
	}

	private function getFileName() {

		$target_dir = '../uploads/';

		switch($this->imageType) {

			case '2':
				$this->fileName = $target_dir . date('Y-m-d_H-i-s') . 'logo.jpeg';
				break;

			case '3':
				$this->fileName = $target_dir . date('Y-m-d_H-i-s') . 'logo.png';
				break;

			default:
				return false;
				break;

		}

		return $this;
	}


}